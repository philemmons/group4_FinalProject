<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //alert("user is not logged in");
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
        //alert("logged out");
    }
    
    if(isset($_POST['login'])){
        echo "goMain <br>";
        goMain();
    }
    
?>

<!DOCTYPE html>
<html>
  <meta charset='utf-8'/>
  <head>
    <title>Register</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>
   
        <header id="title">~ Movie Insight ~
            <form method ="POST" id="logoutBtn" >
              <input type="submit" value="Logout" class="btnAD btn" name="logout"/>
            </form>
        </header>
        
        <?php
          include 'inc/nav.php';
        ?>
        <div class= "wrapper">
        <h4 id="welcome">Welcome </h4>
        <div id="id02" class="">
          <form method="POST" class="" name="loginForm">
    
            <div class="containerAD">
              <label><b>Username</b></label>
              <input type="text" placeholder="Enter Username" name="username" required id="ittAD">
        
              <label><b>Password</b></label>
              <input type="password" placeholder="Enter Password" name="password" required id="itpAD">
                
              <input type="submit" name ="login" value="Login" class="btnAD btn" />
              <div class="btnAD btn"><a href='register.php'>Register</a></div>
            </div>
        
          </form>
          
        </div>    
        </div>
    <?php
        include 'inc/footer.php';
    ?>
     <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
  </body>
</html>