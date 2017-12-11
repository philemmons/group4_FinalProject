<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
        //<!-- The Modal -->
        echo"<div id='myModal' class='modal in'>";
          //<!-- Modal content -->
          echo"<div class='modal-content'>";
            echo"<p>You haven't logged in. Please do so for this feature.</p>";
            echo"<a href='index.php'>Log in Page</a>";
          echo"</div>";
        echo"</div>";
    }

    if(isset($_POST['logout'])){
        //$_SESSION =[];
        session_destroy();
        header("Location: index.php");
    }
    
    if(isset($_POST['login'])){
        goMain();
    }
?>

<!DOCTYPE html>
<html>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <head>
        <title>myPrediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
    </head>
    <body>
        <?php include 'inc/header.php';
        include 'inc/nav.php';
        ?>
        <div class= "wrapper">
            <h4 id="welcome">Welcome </h4>
            <div id="id02" class="">
                <div class="containerAD">
                </div>
            </div>    
        </div>
        <?php
        include 'inc/footer.php';
        ?>
        <script>document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' </script>
    </body>
</html>