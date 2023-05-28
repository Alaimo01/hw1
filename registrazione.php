<?php
require_once ('controllo.php');


/* verifichiamo l'esistenza dei dati post*/
if(!empty($_POST["username"]) && !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["conferma_password"])){
    $error = array(); 
    $conn = mysqli_connect($dbconfig['host'], $dbconfig['user'], $dbconfig['password'], $dbconfig['name']) or die(mysqli_error($conn));
 
    if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username'])) {
     $error[] = "Username non valido";
 } else {
     $username = mysqli_real_escape_string($conn, $_POST['username']);
     $query = "SELECT username FROM utente WHERE username = '$username'";
     $res = mysqli_query($conn, $query);
     if (mysqli_num_rows($res) > 0) {
         $error[] = "Username già utilizzato";
     }
 }
 
 # PASSWORD
 if (strlen($_POST["password"]) < 8) {
     $error[] = "Caratteri password insufficienti";
 } 
 
 # CONFERMA PASSWORD
 if (strcmp($_POST["password"], $_POST["conferma_password"]) != 0) {
     $error[] = "Le password non coincidono";
 }
 
 # EMAIL
 if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
     $error[] = "Email non valida";
 } else {
     $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
     $res = mysqli_query($conn, "SELECT email FROM utente WHERE email = '$email'");
     if (mysqli_num_rows($res) > 0) {
         $error[] = "Email già utilizzata";
     }
 }
 
 # REGISTRAZIONE NEL DATABASE
 if (count($error) == 0) {
     $username = mysqli_real_escape_string($conn, $_POST['username']);
 
     $password = mysqli_real_escape_string($conn, $_POST['password']);
     $password = password_hash($password, PASSWORD_BCRYPT);
 
     $query = "INSERT INTO utente(username,email,password) VALUES('$username', '$email', '$password')";
             
     if (mysqli_query($conn, $query)) {
         $_SESSION["username"] = $_POST["username"];
         $_SESSION["id"] = mysqli_insert_id($conn);
         mysqli_close($conn);
         header("Location: login.php");
         exit;
     } else {
         $error[] = "Errore di connessione al Database";
     }
     }
 
     mysqli_close($conn);
     }
     else if (isset($_POST["username"])) {
         $error = array("Riempi tutti i campi");
     }
 ?>
 



 <!DOCTYPE html>
 <html>
     <head>
         <link rel="stylesheet" href="reg.css">
         <script src='registrazione.js' defer="true"></script>
         <form action="registrazione.php" method="post">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Pagina Di Registrazione</title>
     </head>
    
     <body>
     <main>
        <div class="container">
         <form name ='registrazione' method='post' autocomplete='off'>
         <h1>Registrazione</h1>

        <div class="username">
             <label for="username">Username:</label>
             <input type="text" name="username" id="username" <?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?> ><br><br>
             <div><span>Nome utente non valido</span></div>
        </div>

        <div class="email">
             <label for="email">Email:</label>
             <input type="text" name="email" id="email"<?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>><br><br>
             <div><span>L'email inserita non è valida</span></div>
        </div>
 
        <div class="password">
             <label for="password">Password:</label>
             <input type="password" name="password" id="password"<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>><br><br>
             <div><span>Inserisci almeno 8 caratteri</span></div>
        </div> 

        <div class="conferma_password">
             <label for="conferma_password">Conferma Password:</label>
             <input type="password" name="conferma_password" id="conferma_password"<?php if(isset($_POST["conferma_password"])){echo "value=".$_POST["conferma_password"];} ?>><br><br>
             <div><span>Le due password non coincidono</span></div>
        </div>

             <?php if(isset($error)) {
                     foreach($error as $err) {
                         echo "<div class='errori'><span>".$err."</span></div>";
                     }
                 } ?>
                 
        <div class="submit">
             <input type="submit" value="Registrati" id="submit">
        </div>

         </form>
         <div class="login">Hai un account? <a href="login.php">Accedi</a>
     </div>
     </main>
     </body>
 </html>