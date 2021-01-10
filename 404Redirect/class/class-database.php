<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

/**
 * Classe Database
 */

class Database
{

    private $nameDB = "xxxx"; // Nome Database
    private $userDB = "xxxx"; // Nome Utente
    private $pswDB = "xxxx"; // Password Utente
    private $host = "localhost"; // Host

    public $DB; // Parametro di Accesso al Database

    function __costructor(){
        // Richiamo funzione di Accesso al Database
        $this->DB_access();
    }

    function getDB(){
        return $this->DB;
    }

    function DB_access(){
        // Accesso al Database
        $this->DB = new mysqli($this->host, $this->userDB, $this->pswDB, $this->nameDB);
        // Richiamo funzione di Errore di Connessione
        $this->DB_error();
    }

    function DB_error(){
        // Controllo di avvenuta connessione
        if ($this->DB->connect_error) {
            die("Connessione Fallita:" . $this->DB->connect_error);
        }else{
            echo "<div class='alright'><p>Connessione riuscita correttamente</p></div>";
        }
    }
}


?>
