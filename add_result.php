<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"aca");
	$query = "insert into results values('$_POST[name]','$_POST[roll_no]','$_POST[English]','$_POST[Biology]','$_POST[Chemistry]','$_POST[Physics]','$_POST[Mathematics]','$_POST[ComputerSciences]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Student added successfully.");
	window.location.href = "admin_dashboard.php";
</script>