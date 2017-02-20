<?php
    //ini_set('display_errors', '1');
    //ini_set('error_reporting', E_ALL);
    date_default_timezone_set("Asia/Jakarta");
    session_start();
    
    //define configuration
    define('ROOT', dirname(__FILE__));
    define('LIF', DIRECTORY_SEPARATOR);
    
    //include file library
    //require_once"library/PHPMailer/PHPMailerAutoload.php";
    require_once"library/configuration.php";     //first time using Langit Inspirasi Framework please set this configuration
    require_once"library/database.class.php";    //class databases for your website
    require_once"library/model.class.php";       //class model for your website
    require_once"library/view.class.php";        //class view for your website
    require_once"library/controller.class.php";  //class controller for your website
    require_once"library/seo.class.php";         //class SEO (serach engine optimazing) for your website
    require_once"library/date.class.php";        //class date for your website
    
    function __autoload($className) {

        $fileName = str_replace("\\", LIF, $className) . '.php';

        if(!file_exists($fileName)) {

            return false;
        }

        include $fileName;
    }

    //now let begin for make it MVC
    $hal = (isset($_GET['hal']) && $_GET['hal']) ? $_GET['hal'] : 'Home';
    $controller = ROOT . LIF . 'controllers' . LIF . $hal .'Controller.php';

    if(file_exists($controller)) {

        require_once $controller;
        $action = (isset($_GET['action']) && $_GET['action']) ? $_GET['action'] : 'index';
        $controllerName = ucfirst($hal). 'Controller';

        $obj = new $controllerName();

        if(method_exists($obj, $action)) {

            $args = array();
            if(count($_GET) > 2){
                $parts = array_slice($_GET, 2);

                foreach ($parts as $part) {
                    array_push($args, $part);
                }
            }
            call_user_func_array(array($obj, $action), $args);

        }else die('Action Tidak Tersedia !');

    }
    else die('Controller Tidak Tersedia !');
    
?>