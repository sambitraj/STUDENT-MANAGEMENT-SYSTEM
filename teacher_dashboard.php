<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>STUDENT DASHBOARD</title>

    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
  	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
  	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style type="text/css">
		body{
			background-color: #dfe6e9;
		}
		#header{			
			height: 8%;
			width: 99%;
			top: 2%;
			background-color: #b2bec3;
			border: solid 2px black;
			border-radius: 10px;
			color: black;
		}
		#header:hover{
			-webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
		}
		#left_side{
			background-color: #b2bec3;
			width: 15%;
			top: 37%;
			position: fixed;
			border: solid 2px black;
			border-radius: 10px;
		}
		#left_side:hover{
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
        }
		#right_side{
			height: 75%;
			width: 80%;
			background-color: #b2bec3;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 2px black;
			border-radius: 10px;
		}
		#right_side:hover{
            -webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75); 
        }

		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#btn{
			border-radius: 5px;
			background-color: #dfe6e9;
			width:150px		
			
		}

		#btn:hover{
			-webkit-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            -moz-box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
            box-shadow: -2px 7px 21px -9px rgba(0,0,0,0.75);
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
		}

		#btn1{
			border-radius: 5px;
			background-color: #dfe6e9;
		} 

		@media screen and (max-width: 550px) {
			#btn{
				width:50px;
				font-size:4px;
				
			}
			#btn1{
				font-size:8px
			}

			#left_side{
				width: 12%;
				
			}
			#right_side{
				font-size:8px
			}

		}
	</style>
    <?php
        session_start();
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"aca");
    ?>
</head>
<body>
    <div id="header">
        <center><br>
            <strong>STUDENT MANAGEMENT AND ACADEMIC SYSYTEM  &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</strong>E-mail:<?php echo $_SESSION['email'];?> &nbsp; &nbsp; &nbsp; Name:<?php echo $_SESSION['name'];?>&nbsp; &nbsp;<a href="logout.php">logout</a>
        </center>
    </div>
    <span id="top_span"><marquee >if there is any problem plz contact to management group</marquee></span>
   	<div id="left_side"><br>
       <form action=""method="post">
		<center>
            <table>
                <tr>
                    <td>
                        <input type="submit" name="search_student" value="SEARCH STUDENT" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_student" value="EDIT STUDENT" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="add_student" value="ADD STUDENT" id="btn"><br><br>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="delete_student" value="DELETE STUDENT" id="btn"><br><br>
                    </td>
                </tr>
				<tr>
                    <td>
                        <input type="submit" name="search_teacher" value="SEARCH TEACHER" id="btn"><br><br>
                    </td>
                </tr>
				<tr>
                    <td>
                        <input type="submit" name="search_result" value="SEARCH RESULT" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="edit_result" value="EDIT RESULT" id="btn"><br><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="add_result" value="ADD RESULT" id="btn"><br><br>
                    </td> 
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="delete_result" value="DELETE RESULT" id="btn"><br><br>
                    </td>
                </tr>
            </table>
		</center>
        </form>
   	</div>
       <div id="right_side"><br><br>
        <div id="demo">
            <?php
				if(isset($_POST['search_student']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
					<input type="submit" name="search_by_roll_no_for_search" value="Search">
					</form><br><br>
					
					</center>
					<?php
				}
				if(isset($_POST['search_by_roll_no_for_search']))
				{
					$query = "select * from students where roll_no = '$_POST[roll_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center><h4><b><u>Student's details</u></b></h4><br><br>
							<table>
								<tr>
									<td>
										<b>Roll No: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['roll_no']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Father's Name: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['father_name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Class: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['class']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Mobile: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['mobile']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text"   id="btn1" value="<?php echo $row['email']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="password"   id="btn1" value="<?php echo $row['password']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Remark:&nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<textarea rows="3" cols="40"   id="btn1" disabled><?php echo $row['remark']?></textarea>
									</td>
								</tr>
							</table>
						</center>
						<?php
						
					}	
				}
			?>
            <?php
                if(isset($_POST['edit_student']))
                {
                    ?>
                    <center>
                    <form action="" method="post">
                    &nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_edit" value="Search">
                    </form><br><br>
                    
                    </center>
                    <?php
                }
                if(isset($_POST['search_by_roll_no_for_edit']))
                {
                    $query = "select * from students where roll_no = $_POST[roll_no]";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {
                        ?>
                        <form action="admin_edit_student.php" method="post">
                        <center>
                            <h4><b><u>Student's details</u></b></h4><br><br>
                            <table>
                            <tr>
                                <td>
                                    <b>Roll No:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="roll_no"   id="btn1" value="<?php echo $row['roll_no']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Name:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="name"   id="btn1" value="<?php echo $row['name']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Father's Name:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="father_name"   id="btn1" value="<?php echo $row['father_name']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Class:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="class"   id="btn1" value="<?php echo $row['class']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Mobile:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="mobile"   id="btn1" value="<?php echo $row['mobile']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Email:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" name="email"   id="btn1" value="<?php echo $row['email']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Password:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="password" name="password"   id="btn1" value="<?php echo $row['password']?>">
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Remark:&nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <textarea rows="3" cols="40"   id="btn1" name="remark"><?php echo $row['remark']?></textarea>
                                </td>
                            </tr><br>
                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="edit" value="Save">
                                </td>
                            </tr>
                        </table>
                        </center>
                        </form>
                        <?php
                    }
                }
            ?>
            <?php
                if(isset($_POST['add_student'])){
                    ?>
                    <center><h4>Fill the given details</h4></center>
                    <form action="add_student.php" method="post">
                        <table>
                        <tr>
                            <td>
                                <b>Roll No:</b>
                            </td> 
                            <td>
                                <input type="text" name="roll_no"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Name:</b>
                            </td> 
                            <td>
                                <input type="text" name="name"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Father's Name:</b>
                            </td> 
                            <td>
                                <input type="text" name="father_name"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Class:</b>
                            </td> 
                            <td>
                                <input type="text" name="class"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mobile:</b>
                            </td> 
                            <td>
                                <input type="text" name="mobile"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Email:</b>
                            </td> 
                            <td>
                                <input type="text" name="email"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Password:</b>
                            </td> 
                            <td>
                                <input type="password" name="password"   id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Remark:</b>
                            </td> 
                            <td>
                                <textarea rows="3" cols="40" placeholder="Optional"   id="btn1" name="remark"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><br><input type="submit" name="add" value="Add Student"></td>
                        </tr>
                    </table>
                    </form>
                    <?php	
                }	
            ?>
            <?php
                if(isset($_POST['delete_student'])){
                    ?>
                    <center>
                    <h5>Enter Roll NO to Delete Student</h5><br>
                    <form action="delete_student.php" method="post">
                    Roll NO:
                        <input type="text" name="roll_no">
                        <input type="submit" name="search_by_roll_no_for_delete" value="Delete Student">
                    </form>
                    </center>
                    <?php
                }
            ?>

			<?php
                if(isset($_POST['search_teacher']))
                {
                    ?>
                    <center>
                    <form action="" method="post">
                    &nbsp;&nbsp;<b>Enter Teacher's name:</b>&nbsp;&nbsp; <input type="text" name="teacher_name">
                    <input type="submit" name="search_by_roll_no_for_search_teacher" value="Search">
                    </form><br><br>
                    
                    </center>
                    <?php
                }
                if(isset($_POST['search_by_roll_no_for_search_teacher']))
                {
                    $query = "select * from teachers where teacher_name = '$_POST[teacher_name]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {
                        ?>
                        
                        <center><h4><b><u>Teacher's details</u></b></h4><br><br>
                            <table>
                            <tr>
                                <td>
                                    <b>Name: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['teacher_name']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Class Teacher: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['class_teacher']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Subject: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['teacher_subject']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Mobile: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['mobile_no']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Email: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"  id="btn1"  value="<?php echo $row['email']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Password: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="password"   id="btn1" value="<?php echo $row['password']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Gender: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text"   id="btn1" value="<?php echo $row['gender']?>" disabled>
                                </td>
                            </tr>
                        </table>
                    </center>
                    <?php		
                    }	
                }
            ?>
			<?php
                if(isset($_POST['search_result']))
                {
                    ?>
                    <center>
                    <form action="" method="post">
                    &nbsp;&nbsp;<b>Enter Roll No:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
                    <input type="submit" name="search_by_roll_no_for_result_search" value="Search">
                    </form><br><br>
                    
                    </center>
                    <?php
                }
                if(isset($_POST['search_by_roll_no_for_result_search']))
                {
                    $query = "select * from results where roll_no = '$_POST[roll_no]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {
                        ?>
                        <center><h4><b><u>Student's result</u></b></h4><br><br>
                            <table>
                                <tr>
                                    <td>
                                        <b>Roll No: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text"   id="btn1" value="<?php echo $row['roll_no']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Name: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['name']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>	English: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['English']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>	Biology: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['Biology']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['Chemistry']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Physics: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['Physics']?>" disabled>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['Mathematics']?>" disabled>
                                    </td>
                                </tr>	
                                <tr>
                                    <td>
                                        <b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" id="btn1" value="<?php echo $row['ComputerSciences']?>" disabled>
                                    </td>
                                </tr>						
                            </table>
                        </center>
                        <?php
                    }	
                }
            ?>
            <?php
                if(isset($_POST['edit_result']))
                {
                    ?>
                    <center>
                    <form action="" method="post">
                    &nbsp;&nbsp;<b>Enter the Roll NO:</b>&nbsp;&nbsp; <input type="text" name="roll_no">
                    <input type="submit" name="search_by_for_edit_result" value="Search">
                    </form><br><br>
                    </center>
                    <?php
                }
                if(isset($_POST['search_by_for_edit_result']))
                {
                    $query = "select * from results where roll_no = '$_POST[roll_no]'";
                    $query_run = mysqli_query($connection,$query);
                    while ($row = mysqli_fetch_assoc($query_run)) 
                    {
                        ?>
                        <form action="admin_edit_result.php" method="post">
                        <center>
                        <h4><b><u>Result</u></b></h4><br><br>
                        <table>
                                <tr>
                                    <td>
                                        <b>Roll No: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="roll_no" id="btn1" value="<?php echo $row['roll_no']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Name: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="name" id="btn1" value="<?php echo $row['name']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>	English: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="English" id="btn1"  value="<?php echo $row['English']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>	Biology: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="Biology" id="btn1" value="<?php echo $row['Biology']?>" >
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="Chemistry" id="btn1" value="<?php echo $row['Chemistry']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Physics: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="Physics" id="btn1" value="<?php echo $row['Physics']?>">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="Mathematics" id="btn1" value="<?php echo $row['Mathematics']?>" >
                                    </td>
                                </tr>	
                                <tr>
                                    <td>
                                        <b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
                                    </td> 
                                    <td>
                                        <input type="text" name="ComputerSciences" id="btn1" value="<?php echo $row['ComputerSciences']?>">
                                    </td>
                                </tr>	
                                <tr>
                                    <td></td>
                                    <td>
                                        <input type="submit" name="edit" id="btn1" value="Save">
                                    </td>
                                </tr>					
                            </table>						
                        </form>
                        </center>
                        <?php
                    }
                }
            ?>
            <?php
                if(isset($_POST['add_result'])){
                    ?>
                    <center>
                    <h4>Fill the given details</h4>
                    <form action="add_result.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <b>Name: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="name" id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Roll No: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="roll_no" id="btn1" required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>	English: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="English"id="btn1"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>	Biology: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="Biology" id="btn1"required >
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="Chemistry" id="btn1"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Physics: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="Physics" id="btn1"required>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="Mathematics" id="btn1"required >
                            </td>
                        </tr>	
                        <tr>
                            <td>
                                <b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
                            </td> 
                            <td>
                                <input type="text" name="ComputerSciences" id="btn1"required>
                            </td>
                        </tr>						
                        <tr>
                            <td></td>
                            <td><br><input type="submit" name="add" value="Add RESULT"></td>
                        </tr>
                    </table>
                    </form>
                    </center>
                    <?php	
                }	
            ?>
            <?php
                if(isset($_POST['delete_result'])){
                    ?>
                    <center>
                    <h5>Enter Name to Delete Teacher</h5><br>
                    <form action="delete_result.php" method="post">
                    Name
                        <input type="text" name="roll_no">
                        <input type="submit" name="search_by_name_for_delete" value="Delete Student">
                    </form>
                    </center>
                    <?php
                }
            ?>
         </div>       
    </div>
</body>
</html>