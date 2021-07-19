<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT LOGIN</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="default.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
      <style type="text/css">
       #login {
            height: 350px;
            width: 250px;
            border: 2px solid black;
            border-radius: 5px;
            margin: 220px auto 0px auto;
            background-color: #eaeaea;
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            
        }
        #heading{
            padding-top: 50px;
        }
        body{
            background-color: gray;
            
        }

    </style>
</head>
<body>
    <center><br><br>
        <div id="login">
            <div id="heading">
                <h3>STUDENT LOGIN </h3><br><br><br>
            </div>  
            <form action=""method="post">
                <input type="text" name="email" placeholder="E-mail" required><br><br>
                <input type="password" name="password" placeholder="Password" required><br><br>
                <input type="submit" name="submit" >
            </form><br>
            <?php
                session_start();
                $name="";
                if(isset($_POST['submit'])){
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"aca");
                    $query = "select * from students where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] =  $row['name'];
                                $_SESSION['email'] =  $row['email'];
                                header("Location: student_dashboard.php");
                            }
                            else{
                                echo"fail password";
                            }
                        }
                        else{
                            echo"fail email";
                        }
                    }                   
                }
            ?>
        </div>
    </center>
</body>
</html>
//XHCu08lxaX)9+Qer