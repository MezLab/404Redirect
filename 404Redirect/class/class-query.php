<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

/**
 * Classe Query
 */

class Query extends Database
{

    private $insert; // Inserisci record
    private $select; // Seleziona record
    private $update; // Modifica record
    private $remove; // Rimuovi record

    private $sql; // Query di riferimento
    private $ctrl; // Variabile di controllo

    function __costructor(){}

    function insert($nick, $domain, $ftp, $port, $user, $password){

        $this->bool($ftp, $user, $password);
        $this->sql = "INSERT INTO ftp_access (nickname, domain, ftp, port, user, password, server) VALUES ('$nick', '$domain', '$ftp', $port, '$user', '$password', 'Apache')";
        $this->insert = $this->DB->query($this->sql);
        $this->error(0);

        $this->DB->close();
    }

    function update(){
       
    }

    function remove(){

    }

    // Inserimento Tabella
    function insertTable(){
    
        $this->sql = "SELECT ID, domain, nickname FROM ftp_access";
        $this->select = $this->DB->query($this->sql);
        $this->error(1);

        while($option = $this->select->fetch_assoc()){
            echo "<option id=" . $option["ID"] . " value=" . $option["domain"] . ">" . $option['nickname'] . "</option>";
        }
    
        $this->DB->close();
    }

    // Controllo sulla query
    function bool($ftp, $user, $password){
        $this->sql = "SELECT ftp, user, password FROM ftp_access";
        $this->ctrl = $this->DB->query($this->sql);
        
            while($key = $this->ctrl->fetch_assoc()){
                if ($key["ftp"] == $ftp && $key["user"] == $user && $key["password"] == $password) {
                    return;
                }
            }
    }

    // Controllo dei campi input non sia vuoto
    function empty($_nickname, $_domain, $_ftp, $_port, $_user, $_psw){
        if(empty($_nickname) && empty($_domain) && empty($_ftp) && empty($_port) && empty($_user) && empty($_psw))
            $a = 0;
        else
            $a = 1;

        switch ($a) {
            case 1:
                // Inserisco la Query
                $this->insert($_nickname, $_domain, $_ftp, $_port, $_user, $_psw);
                break;
            default:
                break;
        }
    }

    function error($a){

        switch($a)
        {
            case 0:
                if(!$this->insert)
                    echo "<div class='error'><p>Dominio inserito non correttamente</p></div>";
                else
                    echo "<div class='alright'><p>Dominio inserito correttamente</p></div>";
            break;
            case 1:
                if(!$this->select)
                    echo "Errore: " . $this->sql . "<br>" . $this->DB->error;
            break;
            case 2:
                if(!$this->file_server)
                    echo "<div class='alright'><p>Scrittura non avvenuta</p></div>";
                else
                    echo "<div class='alright'><p>Scrittura avvenuta</p></div>";
                break;
            case 3:
                if(!$this->put_file)
                    echo "<div class='alright'><p>Link non caricato</p></div>";
                else
                    echo "<div class='alright'><p>Link caricato</p></div>";
                break;
            default:
            break;
        }
    }
}

?>

