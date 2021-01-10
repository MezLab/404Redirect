<?php

/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */


include('../include/set.php');

$_nickname = $_POST['nickname'];
$_domain = $_POST['domain'];
$_ftp = $_POST['ftp'];
$_port = $_POST['port'];
$_user = $_POST['userName'];
$_psw = $_POST['psw'];

$My_Query->empty($_nickname, $_domain, $_ftp, $_port, $_user, $_psw);

header('Location: ../index.php');

?>