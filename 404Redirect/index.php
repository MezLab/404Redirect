<?php

/**
 * Software di Redirect
 * @author : Mez | Massimo Maestri
 * @Laboratory
 * @version 1.2
 */

?>

<?php

require 'include/include.php';
// Accesso al Database
$My_Query->DB_access();
?>


<!DOCTYPE html5>
    <html>
        <head>
            <title>!404 | Redirect</title>
            <link rel="stylesheet" href="library/css/style.css">
        </head>
        <body>
            <nav>
                <button id="add" class="add" onclick="add();"><span>+</span></button>
            </nav>
            <?php 
                include('template/add-domain.php');
            ?>
            <form class="center" action="include/redirect.php" method="post">
                <h1 style="margin-bottom:30px;">!<span>404</span> | <i>Redirect</i></h1>
                <label>Scegli il website di riferimento</label>
                <select name="website" id="website">

                <?php 
                    // Lista dei Domini registrati
                    $My_Query->insertTable();
                ?>

                </select>
                <label>Link da reindirizzare</label>
                <input type="text" id="" name="old">
                <label>Link Nuovo</label>
                <input type="text" id="" name="new">
                <input type="submit" value="Inserisci">
                <button type="reset">Reset</button>
            </form>
        </body>
    <script src="library/js/script.js"></script>
</html>