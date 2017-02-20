<?php

    use \controllers\MainController;
    class StasiunController extends MainController {
        public function index() {
            $data = $_SESSION["signin"];     //menampung session dengan nama signin
            
            $this->model('Identitas');       //memanggil tabel identitas pada IdentitasModel.php        
            $this->model('Client');          //memanggil tabel client pada ClientModel.php
            $this->model('Terminal');        //memanggil tabel terminal pada TerminalModel.php      
            
            $stasiun = $this->Terminal->get();              
            
            $this->template(
                'stasiun', array('userData'   => $data,
                              'stasiunData' => $stasiun,
                              'total' => array(
                                               'client'    => $this->Client->rows(),
                                               'terminal'  => $this->Terminal->rows(),
                                               'connected' => $this->Client->rows(),
                                                                                           
                              )
                )
            );
        }

        public function add() {
            $message = array();

            if($_SERVER["REQUEST_METHOD"] == "POST") {

                $message = array(
                    'success'   => false,
                    'message'   => 'Maaf Data Input Tidak Valid.'
                );

                $name_st = isset($_POST["name_st"]) ? $_POST["name_st"] : "";
                $telp_st = isset($_POST["telp_st"]) ? $_POST["telp_st"] : "";
                $add_st = isset($_POST["add_st"]) ? $_POST["add_st"] : "";

                $this->model('Terminal');

                $add_terminal = $this->Terminal->insert(array(
                    'nama_terminal' => $name_st,
                    'alamat_terminal' => $add_st,
                    'telp_terminal' => $telp_st,
                    'jml_client' => '0',
                ));

                if($add_terminal == true) {

                    $message    = array(
                        'success'   => true,
                        'message'   => 'Data Terminal Berhasil Di tambahkan'
                    );

                }

            }
            $data = $_SESSION["signin"];     //menampung session dengan nama signin
            
            $this->template(
                'stasiun.add', array('userData' => $data, 'message' => $message)
            );
        }

        public function update(){
            $message = array();

            if($_SERVER["REQUEST_METHOD"] == "POST") {

                $message = array(
                    'success'   => false,
                    'message'   => 'Maaf Data Input Tidak Valid.'
                );

                $id_st = isset($_POST["id_st"]) ? $_POST["id_st"] : "";
                $name_st = isset($_POST["name_st"]) ? $_POST["name_st"] : "";
                $telp_st = isset($_POST["telp_st"]) ? $_POST["telp_st"] : "";
                $add_st = isset($_POST["add_st"]) ? $_POST["add_st"] : "";

                $this->model('Terminal');

                $add_terminal = $this->Terminal->update(array(
                    'nama_terminal' => $name_st,
                    'alamat_terminal' => $add_st,
                    'telp_terminal'    => $telp_st,
                ), array('id_terminal' => $id_st));

                if($add_terminal == true) {

                    $message    = array(
                        'success'   => true,
                        'message'   => 'Data Terminal Berhasil Di ubah'
                    );
                    echo '<meta http-equiv="refresh" content="1;url=index.php?hal=Monitoring&&id=='.$id_st.'">';
                }

            }
            echo '<meta http-equiv="refresh" content="1;url=index.php?hal=Monitoring&&id=='.$id_st.'">';
        }

        public function delete(){
            $message = array();

            if(isset($_GET['id'])) {

                $message = array(
                    'success'   => false,
                    'message'   => 'Maaf Data Tidak Valid.'
                );

                $id_st = isset($_GET["id"]) ? $_GET["id"] : "";

                $this->model('Terminal');
                $this->model('Client');

                $add_terminal = $this->Terminal->delete(array('id_terminal' => $id_st));
                $delete_client = $this->Client->delete(array('id_terminal' => $id_st));

                if($add_terminal == true) {

                    $message    = array(
                        'success'   => true,
                        'message'   => 'Data Terminal Berhasil Di hapus'
                    );

                }

                echo '<meta http-equiv="refresh" content="1;url=index.php?hal=Stasiun">';

            }
        }

        public function default(){
            $message = array();

            if(isset($_GET['id'])) {

                $message = array(
                    'success'   => false,
                    'message'   => 'Maaf Data Tidak Valid.'
                );

                $id_st = isset($_GET["id"]) ? $_GET["id"] : "";

                $this->model('Terminal');

                $remove_default = $this->Terminal->update(array('beranda_client' => '0'), array('beranda_client' => '1'));
                if ($remove_default == true) {
                    $add_default = $this->Terminal->update(array('beranda_client' => '1'), array('id_terminal' => $id_st));
                    if($add_default == true) {
                        $message    = array(
                            'success'   => true,
                            'message'   => 'Data Default Stasiun Berhasil Di ubah'
                        );
                        echo '<meta http-equiv="refresh" content="1;url=index.php">';
                    }
                }

            }
        }
    }
?>