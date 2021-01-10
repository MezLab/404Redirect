<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

/**
 * Classe File
 */

class File extends FTP
{

    private $open_file;  // Apertura File
    private $copy_file; // Copiatura del File
    private $write_file; // Scrive sul file
    private $put_file; // File caricato
    private $close_file; // Chiusura File
    private $ftp_close; // Disconnessione FTP


    function __costructor(){}

    // Apre il file
    function open($file, $letter){
        $this->open_file = fopen($file, $letter);
        return $this->open_file;
    }

    function getOpenFile(){
        return $this->open_file;
    }

    // Copia il file del server sul file txt in locale
    function copy($conn){
        $this->copy_file = ftp_get($conn, $this->file_local, $this->file_server, FTP_ASCII, 0);
        $this->Error_file(1);
    }

    // Scrive su file
    function write($old, $new){
        $this->close_file = fwrite($old, $new);
        $this->Error_file(2);
    }

    // Carica su FTP il file
    function put($conn){
        $this->put_file = ftp_put($conn, $this->file_server, $this->file_local, FTP_ASCII, 0);
        $this->Error_file(3);
    }

    function close(){
        $this->close_file = fclose($this->open_file);
        return $this->close_file;
    }

    function serverFile($file){
        $this->file_server = $file;
    }

    function localFile($file){
        $this->file_local = $file;
    }

    function getFServer(){
        return $this->file_server;
    }

    function getFLocal(){
        return $this->file_local;
    }

    // Gestione degli Errori
    function Error_file($a){

        switch($a)
        {
            case 0:
                if(!$this->open_file){
                    echo "<div class='error'><p>File non Trovato</p></div>";
                    return true;
                }
            break;
            case 1:
                if(!$this->copy_file){
                    echo "<div class='error'><p>File non Copiato</p></div>";
                 }
            break;
            case 2:
                if(!$this->file_server){
                    echo "<div class='alright'><p>Scrittura non avvenuta</p></div>";
                 }
                break;
            case 3:
                if(!$this->put_file){
                    echo "<div class='alright'><p>Link non caricato</p></div>";
                 }
                break;
            default:
            break;
        }
    }
}

?>