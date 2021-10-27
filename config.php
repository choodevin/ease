<?php
/* PAGE RESOURCES */
$unixTime = time();
$currentPage = str_replace("/", "", strtoupper(strtok($_SERVER['REQUEST_URI'], "?")));

define("ROOT", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

$resourcesArr = [
    "<link rel='stylesheet' href='" . ROOT . "/.res/foundation/foundation.css'>",
    "<script src='" . ROOT . "/.res/js/jquery.js'></script>",
    "<script src='" . ROOT . "/.res/foundation/foundation.js'></script>",
    "<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>",
    "<link rel='stylesheet' href='" . ROOT . "/.res/css/main.css?$unixTime'>",
    "<script src='https://code.iconify.design/2/2.0.4/iconify.min.js'></script>"
];

$resourcesStr = "";

foreach ($resourcesArr as $s) {
    $resourcesStr .= $s;
}

define("BASE_RESOURCES", $resourcesStr);

/* DB CONNECTION */
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "ease";

$dsn = "mysql:host=$host;dbname=$dbname;charset=UTF8";
try {
    $db = new PDO($dsn, $user, $pass);
} catch (PDOException $e) {
    echo $e->getMessage();
}

/* PAGE NAMING */
define("PAGE_LOGIN", "LOGIN");
define("PAGE_HOME", "HOME");
define("PAGE_REGISTER", "REGISTER");

$currentPage = ($currentPage == "" ? PAGE_LOGIN : $currentPage);
