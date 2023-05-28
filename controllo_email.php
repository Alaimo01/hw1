<?php
/*controllo che l'email sia unica e uno stesso utente non provi a registrarsi più volte con la stessa email */
require_once 'dbconfig.php';

//controlliamo che l'accesso sia stato effettuato correttamente
if(!isset($_GET["q"])){
    echo "non dovresti essere qui";
    exit;
}

// Imposto l'header della risposta
//Content-Type esprimo il tipo di contenuto desiderato
//application/json supporto specifico per le applicazioni
header('Content-Type: application/json');
    
// Connessione al DB
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);

// Leggo la stringa dell'email
$email = mysqli_real_escape_string($conn, $_GET["q"]);

// Costruisco la query
$query = "SELECT email FROM utente WHERE email = '$email'";

// Eseguo la query
$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

// Torna un JSON con chiave exists e valore boolean
//utilizzo json_encode per farmi ritornare una stringa con la rappresentazione json di exists
echo json_encode(array('exists' => mysqli_num_rows($res) > 0 ? true : false));

// Chiudo la connessione
mysqli_close($conn);
?>