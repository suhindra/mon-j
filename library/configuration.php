<?php
$hal = (isset($_GET['hal']) && $_GET['hal']) ? $_GET['hal'] : '';

// this configuration path for website
define('PATH', 'http://localhost/mon-j/'); // isi path dari website anda
define('SITE_URL', PATH . 'index.php');
define('POSITION_URL', PATH . '?hal=' . $hal);

// this configuration for database website
define('DB_HOST', 'localhost'); // host yang di gunakan
define('DB_USERNAME', 'root'); // username host
define('DB_PASSWORD', 'password'); // password host
define('DB_NAME', 'mon-j'); // database yang di gunakan
?>
