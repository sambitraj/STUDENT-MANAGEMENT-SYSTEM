<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"aca");
	$query = "insert into teachers values('$_POST[teacher_name]','$_POST[class_teacher]','$_POST[teacher_subject]','$_POST[mobile_no]','$_POST[email]','$_POST[password]','$_POST[gender]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Student added successfully.");
	window.location.href = "admin_dashboard.php";
</script>