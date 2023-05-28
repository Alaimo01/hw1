<?php

require_once ('controllo.php');

//adesso se username e password sono stati inseriti allora mi collego con il database
if(!empty($_POST["username"]) && !empty($_POST["password"])){
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));

//effettuo l'escape della stringa per evitare inconsistenze
$username = mysqli_real_escape_string($conn, $_POST['username']);
$query = "SELECT * FROM utente WHERE username = '".$username."'";
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) > 0) {
    // a noi basta la singola riga che ritorna poichè abbiamo l'id dell'utente che certifica l'unicità
    //ci facciamo ritornare le righe come array associativi
    $entry = mysqli_fetch_assoc($res);
    //password_verify = confronta gli hash tra la password inserita e quella nel database
    if (password_verify($_POST['password'], $entry['password'])) {

        // Imposto una sessione dell'utente
        $_SESSION["username"] = $entry['username'];
        $_SESSION["id"] = $entry['id'];
        header("Location: hmw.php");
        //è buono liberare lo spazio occupato dai risultati della query effettuata
        mysqli_free_result($res);
        //chiudiamo la connessione
        mysqli_close($conn);
        exit;
    }
}
// Se username o password sono errati o solo uno dei due è impostato
$error = "Username e/o password errati.";
}
else if (isset($_POST["username"]) || isset($_POST["password"])) {
$error = "Inserisci username e password.";

}
?>



<!DOCTYPE html>
<html>

	<link rel="stylesheet" href="lgn.css">
	<head>
        <title>Pagina Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
    <main class="login">
        <h1>Login</h1>
        <form action="login.php" method="post">
            
        <div class="username">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username"><br><br>
        </div>

        <div class="password">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
        </div>

        <div class="bottone_login">
            <input type="submit" value="Login">
        </div>
        </form>
        <div class="register">Non hai un account? <a href="registrazione.php">Registrati</a>
    </main>
    </body>