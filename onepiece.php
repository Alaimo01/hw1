<?php
//verifico che l'utente sia loggato
require_once('controllo.php');
if (!$id = checkAuth()) {
	header("Location: login.php");
	exit;
}
?>

<?php
if(isset($_GET['stampa'])){
    $eventi=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $query = "SELECT * FROM commento_onepiece";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res)){
        $eventi[] = $row;
    }
    echo json_encode($eventi);
    exit;
}
?>

<?php
if(isset($_GET['cancella1'])){
    $eventi=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $commento = mysqli_real_escape_string($conn,$_GET['cancella1']);
    $query = "DELETE FROM commento_onepiece where commento = '$commento'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}
?>

<?php
if(isset($_GET['togli_id'])){
    $eventi=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $id = mysqli_real_escape_string($conn,$_GET['togli_id']);
    $query = "DELETE FROM preferiti where id_commento = '$id'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}
?>

<?php
if(isset($_GET['preferiti']) && isset($_GET['chat']) && isset($_GET['id'])){
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $commento = mysqli_real_escape_string($conn,$_GET['preferiti']);
    $chat = mysqli_real_escape_string($conn,$_GET['chat']);
    $utente = mysqli_real_escape_string($conn,$_GET['utente']);
    $id = mysqli_real_escape_string($conn,$_GET['id']);
    $query = "INSERT INTO preferiti(utente,commento,data,id_commento,chat) VALUES(\"$utente\",\"$commento\",CURDATE(),\"$id\",\"$chat\")";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
    exit;
}
?>

<?php
if(isset($_GET['id2'])){
    $eventi = array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $id = mysqli_real_escape_string($conn,$_GET['id2']);
    $query = "SELECT * FROM preferiti where id_commento = '$id' ";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res)){
        $eventi[] = $row;
    }
    echo json_encode($eventi);
    exit;
}
?>

<?php
if(isset($_GET['utente'])){
    if($_GET['utente'] == $_SESSION['username']) echo json_encode(array('exists' => true));
    else echo json_encode(array('exists' => false));
    exit;
}
?>

<?php
if(isset($_GET['commento'])){
    $eventi=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $commento = mysqli_real_escape_string($conn,$_GET['commento']);
    $utente = mysqli_real_escape_string($conn,$_SESSION['username']);
    $query = "SELECT * FROM commento_onepiece";
    $insertQuery = "INSERT INTO commento_onepiece (utente,commento,data) VALUES (\"$utente\",\"$commento\",CURDATE())";
    $insertResult = mysqli_query($conn, $insertQuery);
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res)){
            $eventi[] = $row;
        }
    mysqli_free_result($res);
    echo json_encode($eventi);
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>ONE PIECE</title>
    <link rel="stylesheet" href="onepiece.css?ts=<?=time()?>&quot"/>
    <script src="salva_commento_onepiece.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body class="onepiece">
    <header>
    <nav>
        <div id="logo"><a id="logo" href ="hmw.php">Solo Anime</a></div>
        <div class="spiegazione"><h2>SEZIONE COMMENTI</h2></div>
      </nav>

        <div class="corpo">
            <div class="corpo2"></div>
            <h2>INSERISCI QUI IL TUO COMMENTO</h2>
            <form action="javascript:void(0);">
                    <textarea id="area_testo"></textarea>
                    <button class="invia" id="submit"> INVIA</button>
            </form> 
        </div>

    </header>
</body>
</html>