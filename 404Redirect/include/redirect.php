<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

/**
 * File Include Class
 */
$value = $_POST['website'];
$old = $_POST['old'];
$new = $_POST['new'];

require 'include.php';

// Accesso al Database
$My_Query->DB_access();

// Lettura e Scrittura file .htaccess

$sql = "SELECT ftp, port, user, password FROM ftp_access WHERE domain = '$value'";
if(!$My_Query->DB->query($sql))
    echo "Errore: " . $sql . "<br>" . $My_Query->DB->error;

// Richiesta al Server
$op = $My_Query->DB->query($sql);    
$option = $op->fetch_assoc();

// Connection Server via FTP
$My_FTP->in($option["ftp"], $option["port"]);

// Connection Login via FTP
$My_FTP->log($My_FTP->getIN(), $option["user"], $option["password"]);


// File di riferimento server e locale
$file = $My_file->serverFile("public_html/.htaccess");
$local = $My_file->localFile("htaccess.txt");

ftp_chmod($My_FTP->getIN(), 0777, $file);

// Copia il file del server sul file txt in locale
$My_file->open($My_file->getFLocal(), "w");

    if($My_file->Error_file(0)){
        echo "Spiacente";
    }else{
        $My_file->copy($My_FTP->getIN());
    }
$My_file->close();


// Trascrive la riga di comando 301
$opens = $My_file->open($My_file->getFLocal(), "a");

$website = $value;
$redType = "redirect 301";
$newLine = $redType . " /" . $old . " " . $website . "/" . $new . PHP_EOL;

$My_file->write($opens, $newLine);
$My_file->close();

// Carica sul server il file corretto con il reindirizzamento
$My_file->open($My_file->getFLocal(), "r");
    if($My_file->Error_file(0)){
        return;
    }else{
        $My_file->put($My_FTP->getIN());
    }
$My_file->close();

$My_FTP->close();

header("Location: ../index.php");
?>