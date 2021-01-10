<?php
/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */
?>

<aside id="addDomain" class="fix">
    <button id="rmv" class="rmv" onclick="add();"><span>x</span></button>
    <form class="center" action="template/insert-domain.php" method="post">
        <h1 style="margin-bottom:30px;"><span>Aggiungi</span> | <i>FTP/Dominio</i></h1>
        <label>Nickname</label>
        <input type="text" id="nickname" name="nickname">
        <label>Dominio</label>
        <input type="text" id="domain" name="domain">
        <label>Server/FTP</label>
        <input type="text" id="ftp" name="ftp">
        <label>Porta</label>
        <input type="text" id="port" name="port">
        <label>User Name</label>
        <input type="text" id="userName" name="userName">
        <label>Password</label>
        <input type="password" id="psw" name="psw">
        <input type="submit" value="Connetti">
        <button type="reset">Reset</button>
    </form>
</aside>
