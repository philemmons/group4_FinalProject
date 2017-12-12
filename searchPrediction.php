<?php
    session_start();  //start or resume an existing session
    
    include 'inc/dbConnection.php';
    include 'php/source.php';
     
    $dbConn = getDBConnection(); 
     
    if(!isset($_SESSION["user"])) {  //Check whether the admin has logged in
        $_SESSION["name"] = "Guest";
    }
    if(isset($_POST['logout'])){
        session_destroy();
        header("Location: index.php");
    }
    
    if(isset($_POST['login'])){
        goMain();
    }
    
    function fakeTable(){
        echo"
          <tr>
            <td>Fake Movie 1 </td>
            <td>90% </td>
          </tr>
          <tr>
            <td>Fake Movie 2 </td>
            <td>75% </td>
          </tr>
          <tr>
            <td>Fake Movie 3</td>
            <td>69% </td>
          </tr>
          <tr>
            <td>Fake Movie 4 </td>
            <td>21% </td>
          </tr>
          <tr>
            <td>Fake Movie 5</td>
            <td>99% </td>
          </tr>
          <tr>
            <td>Fake Movie 6 </td>
            <td>82% </td>
          </tr>";
    }
?>

<!doctype html>
<html lang="en">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <head>
        <title>Search Prediction</title>
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/styles.css">
        
        <style>
            input[type=text] {
                width: 130px;
                border: 2px solid #808080;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                padding: 10px 15px 10px 25px;
                transition: width 0.4s ease-in-out;
            }
            
            input[type=text]:focus {
                width: 100%;
            }
            
        </style>
    </head>
    <body>
        <?php   include 'inc/header.php';
                include 'inc/nav.php';
        ?>
         <div class= "wrapper">
            <h4 id="welcome">Welcome</h4>
            <div>
                <iframe src="https://hw5-group4-chatapp.herokuapp.com/" class='myframe'></iframe>
            </div>
            
            <div style="float:left; width: 45%;">
                <input type="text" id="myInput" onkeyup="tableSearch()" placeholder="Search..">
                <br><br>
                <table id="myTable" style="width:100%;" class="predictions">
                    <thead><tr>
                            <th>Movie Title</th>
                            <th>Prediction </th>
                            <th>Likes</th>
                    </tr></thead>
                 <tbody>
                    <tr><?php     predictionTable(1);    ?>
                    </tr>     
                 </tbody>
                </table>
            </div>
        </div>
        <?php   include 'inc/footer.php';    ?>
    </body>
    <script>
        document.getElementById('welcome').innerHTML += '<?php echo $_SESSION["name"] ?>' 
    
        function tableSearch() {
            let input = document.getElementById("myInput");
            let filter = input.value;
            let table = document.getElementById("myTable");
            let tr = table.getElementsByTagName("tr");
            let td;
        
            for(let i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];
                if (td) {
                    if (td.innerHTML.indexOf(filter) > -1) {
                        tr[i].style.display = "";
                    } 
                    else {
                        tr[i].style.display = "none";
                    }
                }       
            }
        }        
    </script>
</html>

