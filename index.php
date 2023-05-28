<?php

require_once('controllo.php');

if(isset($_GET['stampa2'])){
  $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']);
  $commento = mysqli_real_escape_string($conn,$_GET['stampa2']);
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
  <head>
    <title>Solo Anime</title>
    <link rel="stylesheet" href="index.css?ts=<?=time()?>&quot"/>
    <script src="hmw.js" defer="true"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  
  <body>
    <header>
      <nav>
        <div id="logo1">
          Solo Anime
        </div>
        <div id="clicca_index">
          <a href='login.php'>ACCEDI</a>
        </div>
      </nav>
	  <header id="inizio"></header>
      <section class="griglia">
     <div>
		<img src="img/onepiece.jpg">
		    <h2 class="title_op">One Piece</h2>
	 </div>

	 <div>
		<img src="img/naruto.jpg">
		<h2 class="title_naruto">Naruto</h2>
	 </div>

	 <div>
		<img src="img/dragonball.jpg">
		<h2 class="title">Dragonball</h2>
	 </div>

	 <div>
		<img src="img/demonslayer.jpg">
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