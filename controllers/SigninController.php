<?php

class SigninController extends Controller {

    public function index() {

        $signin = isset($_SESSION["signin"]) ? $_SESSION["signin"] : "";

        if($signin) {

            $this->redirect("index.php");
        }

        $message = array();

        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $message = array(
                'success'   => false,
                'message'   => 'Maaf Username/Password Salah.'
            );

            $username = isset($_POST["username"]) ? $_POST["username"] : "";
            $password = isset($_POST["password"]) ? $_POST["password"] : "";

            $this->model('Users');

            $users = $this->Users->getWhere(array(
                'username' => $username,
                'password' => md5($password),
                'level'    => 'admin',
            ));

            if(count($users) > 0) {

                $message    = array(
                    'success'   => true,
                    'message'   => 'Selamat anda berhasil signin.'
                );

                $_SESSION["signin"] = $users[0];

                echo '<meta http-equiv="refresh" content="1;url=index.php">';

            }

        }

        $view = $this->view('signin')->bind('message', $message);
    }

    public function logout() {

        unset($_SESSION["signin"]);

        $this->redirect('index.php');
    }

}
?>