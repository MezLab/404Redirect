<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

define("PATH", $_SERVER["DOCUMENT_ROOT"]);
define("DIR", PATH . "/404Redirect");
define("CLASSE", DIR . "/class");

/**
 * File Include Class
 */

require_once CLASSE . '/class-database.php';
require_once CLASSE . '/class-query.php';
require_once CLASSE . '/class-ftp.php';
require_once CLASSE . '/class-file.php';


// Object @new
$My_DB = new Database();
$My_Query = new Query();
$My_FTP = new FTP();
$My_file = new File();
