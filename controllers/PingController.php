<?php
    use \controllers\MainController;
    class PingController extends MainController {

        public function index($host,$port=80,$timeout=6) {

            $fsock = fsockopen($host, $port, $errno, $errstr, $timeout);
            if ( ! $fsock )
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }

    }
?>