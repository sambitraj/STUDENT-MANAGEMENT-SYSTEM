<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN LOGIN</title>
    <style type="text/css">
        #login {
            height: 300px;
            width: 250px;
            border: 2px solid black;
            border-radius: 5px;
            margin: 220px auto 0px auto;
            background-color: #b2bec3;
            
            
        }
        #login:hover{
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        }
        #heading{
            padding-top: 50px;
        }
        body{
            background-color: #dfe6e9;
            
        }
        #btn{
            background-color: #dfe6e9;
            border-radius: 5px;
			width:150px			
		}

		#btn:hover{
			-webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
		}
    </style>
</head>
<body>
    <center>
        </div>
        <div id="login">
            <h3 id ="heading">ADMIN - LOGIN</h3><br><br><br>
            <form action=""method="post">
                <input type="text" name="email" placeholder="E-mail" id="btn" required></p>
                <input type="password" name="password" placeholder="Password" id="btn" required></p><br>
                <input type="submit" name="submit" >
            </form><br>
            <?php
                session_start();
                $name="";
                if(isset($_POST['submit'])){
                    $connection = mysqli_connect("localhost","root","");
                    $db = mysqli_select_db($connection,"aca");
                    $query = "select * from admin where email = '$_POST[email]'";
                    $query_run = mysqli_query($connection,$query);
                    while($row = mysqli_fetch_assoc($query_run)){
                        if($row['email'] == $_POST['email']){
                            if($row['password'] == $_POST['password']){
                                $_SESSION['name'] =  $row['name'];
                                $_SESSION['email'] =  $row['email'];
                                header("Location: admin_dashboard.php");
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