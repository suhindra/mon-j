<?php

namespace controllers;
use \Controller;

class MainController extends Controller {

    protected $signin;

    public function __construct() {

        $this->signin = isset($_SESSION["signin"]) ? $_SESSION["signin"] : '';

        if(!$this->signin) {

            $this->redirect(SITE_URL . "?hal=Signin");
        }
    }

    protected function template($viewName, $data = array()) {

        $view = $this->view('template');
        $view->bind('viewName', $viewName);
        $view->bind('data', array_merge($data, array('signin' => $this->signin)));
    }
}
?>