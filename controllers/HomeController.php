<?php

    use \controllers\MainController;
    class HomeController extends MainController {
        public function index() {
            $data = $_SESSION["signin"];     //menampung session dengan nama signin
            
            $this->model('Identitas');       //memanggil tabel identitas pada IdentitasModel.php        
            $this->model('Client');          //memanggil tabel client pada ClientModel.php
            $this->model('Terminal');        //memanggil tabel terminal pada TerminalModel.php

            $test_client = $this->Client->get();
            foreach ($test_client as $value) {
                $ip=  $value->ip_client;
                // Query untuk update status client
                //exec("ping -n 1 $ip", $output[$ip],$status); //untuk os windows
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
            }
            
            $monitoring = $this->Terminal->getWhere(array('beranda_client' => '1'));
            $client = $this->Client->getWhere(array('id_terminal' => $monitoring[0]->id_terminal)); 
            $stasiun = $this->Terminal->get();     
            
            $this->template(
                'home', array('userData'   => $data,
                              'clientData' => $client,
                              'stasiunData' => $stasiun,
                              'monitoringData' => $monitoring,
                              'total' => array(
                                               'client'    => $this->Client->rows(),
                                               'terminal'  => $this->Terminal->rows(),
                                               'connected' => $this->Client->getWhereRows(array('status_client' => 'Connected')),
                                                                                           
                              )
                )
            );
        }

    }
?>