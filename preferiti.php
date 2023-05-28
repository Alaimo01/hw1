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
    $query = "SELECT * FROM preferiti";
    $res = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($res)){
        $eventi[] = $row;
    }
    echo json_encode($eventi);
    exit;
}
?>

<?php
if(isset($_GET['id']) ){
    $eventi=array();
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
    $id = mysqli_real_escape_string($conn,$_GET['id']);
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

<!DOCTYPE html>
<html>

<head>
    <title>PREFERITI</title>
    <link rel="stylesheet" href="preferiti.css?ts=<?=time()?>&quot"/>
    <script src="preferiti.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <header>
    <nav>
        <div id="logo"><a id="logo" href ="hmw.php">Solo Anime</a></div>
        <div class="spiegazione"><h2>SEZIONE PREFERITI</h2></div>
      </nav>

        <div class="corpo">
            <div class="corpo2"></div>
            </form> 
        </div>

    </header>
</body>
</html>