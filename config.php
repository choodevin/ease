<?php

$unixTime = time();
$currentPage = str_replace("/", "", strtoupper(strtok($_SERVER['REQUEST_URI'], "?")));

define("ROOT", (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]");

define(
    "BASE_RESOURCES",
    "<link rel='stylesheet' href='" . ROOT . "/.res/foundation/foundation.css'>\n
<script src='" . ROOT . "/.res/js/jquery.js'></script>\n
<script src='" . ROOT . "/.res/foundation/foundation.js'></script>\n
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Poppins'>\n
<link rel='stylesheet' href='" . ROOT . "/.res/css/main.css?$unixTime'>\n
<script src='https://code.iconify.design/2/2.0.4/iconify.min.js'></script>"
);

define("PAGE_LOGIN", "LOGIN");
define("PAGE_HOME", "HOME");
define("PAGE_REGISTER", "REGISTER");

$currentPage = ($currentPage == "" ? PAGE_LOGIN : $currentPage);

define("USER_TYPE_MEMBER", "member");
define("USER_TYPE_VENDOR", "vendor");
