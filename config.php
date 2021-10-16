<?php

$root = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

define("RESOURCES", "<link rel='stylesheet' href='$root/res/bootstrap/bootstrap.min.css'>\n
<script src='$root/res/bootstrap/bootstrap.min.js'></script>\n
<script src='$root/res/js/jquery.js'></script>\n");