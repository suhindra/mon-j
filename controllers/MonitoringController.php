<?php

    use \controllers\MainController;
    class MonitoringController extends MainController {
        public function index() {
            $data = $_SESSION["signin"];     //menampung session dengan nama signin
            if(isset($_GET['id'])) {
                $id_st = $_GET['id'];
            }

            $this->model('Identitas');       //memanggil tabel identitas pada IdentitasModel.php    
            $this->model('Client');          //memanggil tabel client pada ClientModel.php
            $this->model('Log');          //memanggil tabel client pada ClientModel.php
            $this->model('Terminal');        //memanggil tabel terminal pada TerminalModel.php   

            $test_client = $this->Client->get();
            $this_day = date("d M Y");
            $hour = date("H");
            foreach ($test_client as $value) {
                $ip=  $value->ip_client;
                // Query untuk update status client
                //exec("ping -n 1 $ip", $output,$status); //untuk os windows
                exec("/bin/ping -c2 -w2 $ip", $output, $status); //untuk os linux 
                if($status==0) {
                    $cut = explode(":", $output['2']); 
                    $hasil = trim($cut['0'], " .");
                    switch ($hasil) {
                        case 'Request timed out':
                            $log = "Request timed out";
                            $update_client_status = $this->Client->update(array('status_client' => $log), array('id_client' => $value->id_client));
                            break;
                        
                        default:
                        $hasil1 = trim($cut['1'], " .");
                            switch ($hasil1) {
                                case 'Destination net unreachable':
                                    $update_client_status = $this->Client->update(array('status_client' => $log), array('id_client' => $value->id_client));
                                    break;
                                case 'Destination host unreachable':
                                    $log = "Destination host unreachable";
                                    $update_client_status = $this->Client->update(array('status_client' => $log), array('id_client' => $value->id_client));
                                    break;
                                
                                default:
                                    $log = "Connected";
                                    $update_client_status = $this->Client->update(array('status_client' => $log), array('id_client' => $value->id_client));
                                    break;
                                }
                            break;
                        }
                    }else{
                        $log = "Disconnected";
                        $update_client_status = $this->Client->update(array('status_client' => $log), array('id_client' => $value->id_client));
                    }

                    //send Email
                    $count_log_email = $this->Log->getWhereRows(array('id_client' => $value->id_client));                    
                    if ($count_log_email > 0) {
                        $log_email = $this->Log->getWhere(array('id_client' => $value->id_client));                    
                        foreach ($log_email as $log_item) {
                            $h = $log_item->jam;
                            if ($hour - $h > 2) {
                                $this->Log->insert(array(
                                    'id_client' => $value->id_client,
                                    'tgl' => $this_day,
                                    'jam' => $hour,
                                    'status' => '0',
                                ));
                                $this->send_mail($value->ip_client, $value->nama_client, $log);
                            }
                        } 
                    } else {
                        $this->Log->insert(array(
                            'id_client' => $value->id_client,
                            'tgl' => $this_day,
                            'jam' => $hour,
                            'status' => '0',
                        )); 
                        $this->send_mail($value->ip_client, $value->nama_client, $log);  
                    }

            } 
            
            $monitoring = $this->Terminal->getWhere(array('id_terminal' => $id_st));
            $client = $this->Client->getWhere(array('id_terminal' => $monitoring[0]->id_terminal));
            $stasiun = $this->Terminal->get();     
            
            $this->template(
                'monitoring', array('userData'   => $data,
                                'clientData' => $client,
                                'stasiunData' => $stasiun,
                                'monitoringData' => $monitoring
                )
            );
        }

        public function send_mail($ip, $host, $status){
            date_default_timezone_set("Asia/Jakarta");
            require_once __DIR__."/../library/PHPMailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;
            $ip = $ip;
            $host = $host;
            $status = $status;
            switch ($status) {
                case 'Disconnected':
                    $color = "#D9534F";
                    break;
                case 'Destination host unreachable':
                    $color = "#5CB85C";
                    break;
                case 'Destination net unreachable':
                    $color = "#5CB85C";
                    break;
                case 'Request timed out':
                    $color = "#5CB85C";
                    break;
                default:
                    $color = "#D9534F";
                    break;
            }
            $message = "<tr><td>IP</td><td>:</td><td><strong>$ip</strong></td></tr>
                        <tr><td>HOST</td><td>:</td><td><strong>$host</strong></td></tr>
                        <tr><td>STATUS</td><td>:</td><td><strong><font color='$color'>$status</font></strong></td></tr>";
            //echo "Laporan Monitoring";
            $title = "Monitoring : $host";
            $log = "<table cellspacing='2' cellpadding='4'>$message</table> <br />";
             
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'suhindrasuhindra@gmail.com'; // Email GMAIL anda disini HARUS allowing access to less secure apps
            $mail->Password = ''; // Katasandi email anda
            $mail->SMTPSecure = 'tls';
             
            $mail->From = 'suhindrasuhindra@gmail.com'; // Email disamakan saja
            $mail->FromName = 'Monitoring Jaringan';
            $mail->addAddress('suhindra@hotmail.co.id'); // Target email atau email tujuan
             
            $mail->WordWrap = 50;
            $mail->isHTML(true);

            $mail->Subject = ''.$title.' - '.date("H.i").' WIB';
            $mail->Body    = "<b>Laporan Monitoring Jaringan</b><br>$log";
            if(!$mail->send()) {
               echo 'Message could not be sent.';
               echo 'Mailer Error: ' . $mail->ErrorInfo;
               exit;
            }
        }
    }
?>