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
		#header{
			height: 8%;
			width: 100%;
			top: 2%;
			background-color: black;
			position: fixed;
			color: white;
		}
		#left_side{
			height: 75%;
			width: 15%;
			top: 10%;
			position: fixed;
		}
		#right_side{
			height: 75%;
			width: 80%;
			background-color: whitesmoke;
			position: fixed;
			left: 17%;
			top: 21%;
			color: red;
			border: solid 1px black;
		}
		#top_span{
			top: 15%;
			width: 80%;
			left: 17%;
			position: fixed;
		}
		#td{
			border: 1px solid black;
			padding-left: 2px;
			text-align: left;
			width: 200px;
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
    <span id="top_span"><marquee >this is a website</marquee></span>
   	<div id="left_side"><br><br><br><br><br><br><br><br><br>
       <form action=""method="post">
		<center>
            <table>
                <tr>
                    <td>
                        <input type="submit" name="search_student" value="SEARCH STUDENT">
                    </td>
                </tr>
				<tr>
                    <td><br>
                        <input type="submit" name="search_teacher" value="SEARCH TEACHER">
                    </td>
                </tr>
				<tr>
                    <td><br>
                        <input type="submit" name="search_result" value="SEARCH RESULT">
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
										<input type="text" value="<?php echo $row['roll_no']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Name: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Father's Name: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['father_name']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Class: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['class']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Mobile: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['mobile']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Email: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="text" value="<?php echo $row['email']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Password: &nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<input type="password" value="<?php echo $row['password']?>" disabled>
									</td>
								</tr>
								<tr>
									<td>
										<b>Remark:&nbsp; &nbsp;&nbsp;</b>
									</td> 
									<td>
										<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
									</td>
								</tr>
							</table>
						</center>
						<?php
						
					}	
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
                                    <input type="text" value="<?php echo $row['teacher_name']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Class Teacher: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['class_teacher']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Subject: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['teacher_subject']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Mobile: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['mobile_no']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Email: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['email']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Password: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="password" value="<?php echo $row['password']?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>Gender: &nbsp; &nbsp;&nbsp;</b>
                                </td> 
                                <td>
                                    <input type="text" value="<?php echo $row['gender']?>" disabled>
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
									<input type="text" value="<?php echo $row['roll_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Name: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>	English: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['English']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>	Biology: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['Biology']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Chemistry: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['Chemistry']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Physics: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['Physics']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Mathematics: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['Mathematics']?>" disabled>
								</td>
							</tr>	
							<tr>
								<td>
									<b>Computer-Sciences: &nbsp; &nbsp;&nbsp;</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['ComputerSciences']?>" disabled>
								</td>
							</tr>						
						</table>
					</center>
					<?php
				}	
			}
		?>
         </div>       
    </div>
</body>
</html>