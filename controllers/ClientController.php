<?php

use \controllers\MainController;

class ClientController extends MainController {

    public function index() {
        $this->model('Client');           //memanggil tabel client pada ClientModel.php
        $client = $this->Client->get();   //melakukan get pada tabel client
        
        
        
        $this->template(
             'fasilitas', array('client'    => $client[0],
                                                          
                            )
        );
    }
    public function add(){
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $message = array(
                'success'   => false,
                'message'   => 'Maaf Data Input Tidak Valid.'
            );

            $client = isset($_POST["client"]) ? $_POST["client"] : "";
            $ip = isset($_POST["ip"]) ? $_POST["ip"] : "";
            $stasiun = isset($_POST["stasiun"]) ? $_POST["stasiun"] : "";

            $this->model('Client');

            $add_client = $this->Client->insert(array(
                'ip_client' => $ip,
                'nama_client' => $client,
                'id_terminal'    => $stasiun,
            ));

            if($add_client == true) {
                $jml_client = $this->Client->getWhereRows(array('id_terminal' => $stasiun)); 
                $this->model('Terminal'); 
                $this->Terminal->update(array('jml_client' => $jml_client), array('id_terminal' => $stasiun));
                $message    = array(
                    'success'   => true,
                    'message'   => 'Data Terminal Berhasil Di tambahkan'
                );

            }

        }

        $data = $_SESSION["signin"];     //menampung session dengan nama signin
            
        $this->model('Identitas');       //memanggil tabel identitas pada IdentitasModel.php        
        $this->model('Client');          //memanggil tabel client pada ClientModel.php
        $this->model('Terminal');        //memanggil tabel terminal pada TerminalModel.php      
        
        $stasiun = $this->Terminal->get();             
        
        $this->template(
            'client.add', array('userData' => $data, 'stasiunData' => $stasiun )
        );
    }

    public function update(){
        $message = array();

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $message = array(
                'success'   => false,
                'message'   => 'Maaf Data Input Tidak Valid.'
            );

            $id_client = isset($_POST["id_client"]) ? $_POST["id_client"] : "";
            $ip = isset($_POST["ip"]) ? $_POST["ip"] : "";
            $client = isset($_POST["client"]) ? $_POST["client"] : "";
            $stasiun = isset($_POST["stasiun"]) ? $_POST["stasiun"] : "";

            $this->model('Client');

            $add_terminal = $this->Client->update(array(
                'ip_client' => $ip,
                'nama_client' => $client,
                'id_terminal' => $stasiun,
            ), array('id_client' => $id_client));

            if($add_terminal == true) {

                $message    = array(
                    'success'   => true,
                    'message'   => 'Data Terminal Berhasil Di ubah'
                );
                echo '<meta http-equiv="refresh" content="1;url=index.php">';
            }
            echo '<meta http-equiv="refresh" content="1;url=index.php?hal=Monitoring&&id=='.$stasiun.'">';
        }
    }

    public function delete(){
        $message = array();

        if(isset($_GET['id'])) {

            $message = array(
                'success'   => false,
                'message'   => 'Maaf Data Tidak Valid.'
            );

            $id_client = isset($_GET["id"]) ? $_GET["id"] : "";

            $this->model('Client');
            $this->model('Terminal');

            $stasiun = $this->Client->getWhere(array('id_client' => $id_client));
            $add_terminal = $this->Client->delete(array('id_client' => $id_client));

            if($add_terminal == true) {
                $jml_client = $this->Client->getWhereRows(array('id_terminal' => $stasiun[0]->id_terminal)); 
                $this->model('Terminal'); 
                $this->Terminal->update(array('jml_client' => $jml_client), array('id_terminal' => $stasiun[0]->id_terminal));
                $message    = array(
                    'success'   => true,
                    'message'   => 'Data Client Berhasil Di hapus'
                );

            }
            echo '<meta http-equiv="refresh" content="1;url=index.php?hal=Monitoring&&id=='.$stasiun[0]->id_terminal.'">';
        }
    }
}
?>