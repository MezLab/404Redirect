<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

/**
 * Classe FTP
 * File Transfer Protocol
 */

class FTP
{

    public $ftp_server;  // Connessione FTP
    public $ftp_login; // Login FTP
    private $ftp_close; // Disconnessione FTP
    
    private $file_server; // File del Server
    private $file_local; // File in Locale


    function __costructor(){}

    // Connessione Server FTP
    function in($ftp, $port){
        $this->ftp_server = ftp_connect($ftp, $port);
        $this->error($this->ftp_server);
    }

    // Login FTP
    function log($ftp_server, $user, $psw){
        $this->ftp_login = ftp_login($ftp_server, $user, $psw);
        $this->error($this->ftp_login);
    }

    // Disconnesione FTP
    function close(){
        $this->ftp_close = ftp_close($this->ftp_login);
    }

    function getIN(){
        return $this->ftp_server;
    }
    // Gestione degli errori
    function error($err){
        if($err == $this->ftp_server){
            // Controllo di avvenuta connessione FTP
            if(!$err){
                echo "<div class='error'><p>Server FTP non Trovato</p></div>";
                return;
            }
        }else{
            // Controllo di avvenuto login FTP
            if(!$this->ftp_login){
                echo "<div class='error'><p>FTP non Connesso</p></div>";
                return;
            }else{
                echo "<div class='alright'><p>FTP Connesso</p></div>";
            }
        }
    }

}

?>