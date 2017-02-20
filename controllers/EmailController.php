<?php

    use \controllers\MainController;
    class EmailController extends MainController {
        public function index() {
            $data = $_SESSION["signin"];     //menampung session dengan nama signin

            $this->model('Identitas');       //memanggil tabel identitas pada IdentitasModel.php    
            $this->model('Log');          //memanggil tabel client pada ClientModel.php            
            $this->model('Terminal');          //memanggil tabel client pada ClientModel.php            
            
            $stasiun = $this->Terminal->get();     
            $log = $this->Log->getJoin('client', array('client.id_client' =>  'log.id_client'), $join = "JOIN", $where = "");     
            
            $this->template(
                'email', array('userData'   => $data,
                                'stasiunData' => $stasiun,
                                'logData' => $log,
                )
            );
        }

    }
?>