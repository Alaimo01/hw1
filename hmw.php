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
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
  $commento = mysqli_real_escape_string($conn,$_GET['stampa']);
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL , "http://api.giphy.com/v1/gifs/search?api_key=mAvCsm3x3r5UhimJjQvAbWmHVSf8Uomb&q="  .$commento.  "&limit=5");
  curl_setopt($curl, CURLOPT_RETURNTRANSFER , 1);
  $result = curl_exec($curl);
  curl_close($curl);
  
  echo json_encode($result);
  exit;
}
?>


<html>
<?php
//carico le informazioni dell'utente che ha loggato
$conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
$id = mysqli_real_escape_string($conn, $id);
$query = "SELECT * FROM utente WHERE id = $id";
$res_1 = mysqli_query($conn, $query);
$userinfo = mysqli_fetch_assoc($res_1); 
?>

  <head>
    <title>Solo Anime</title>
    <link rel="stylesheet" href="hmw.css?ts=<?=time()?>&quot"/>
    <script src="hmw.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  
  <body>
    <header>
      <nav id="hmw">
        <div id="logo">
          Solo Anime
        </div>
        
        <div class ="gif">
        <form name ='search_gif' class="gif">
        <label>CERCA GIF: <input type='text' name = 'gif_anime' id ='gif_anime'></label>
        <input class="hidden" type='submit'>
        </form>
        </div>
        <div class ="position"><a href="preferiti.php"><img class='preferiti' src='img/cuore_pieno.png'></img></a></div>
        <div id="clicca_hmw">
          <a class="logout" href='logout.php'>LOGOUT</a> 
        </div>

      </nav>
	  <header id="inizio"></header>
      <section class="griglia">

    <div>
		<a id="onepiece" href='onepiece.php'><img src="img/onepiece.jpg"></a>
		   <h2 class="title">One Piece</h2>
	 </div>

	 <div>
   <a id="naruto" href = 'naruto.php'><img src="img/naruto.jpg"></a>
		<h2 class="title">Naruto</h2>
	 </div>

	 <div>
		<a id="dragonball" href = 'dragonball.php'><img src="img/dragonball.jpg"></a>
		<h2 class="title">Dragonball</h2>
	 </div>

	 <div>
   <a id="opm" href = 'opm.php'><img src="img/demonslayer.jpg"></a>
		<h2 class="title">Demon Slayer</h2>
	 </div>
   </section>
    </header>

    <footer>
	    <nav class="footer">
          <div>
            <article id="contenitore_gif"></article>
          </div>
      </nav>
    </footer>
  </body>
  </html>