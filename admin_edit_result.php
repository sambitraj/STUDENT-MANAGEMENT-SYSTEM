<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"aca");
	$query = "update results set English='$_POST[English]',Biology='$_POST[Biology]',Chemistry='$_POST[Chemistry]',Physics='$_POST[Physics]',Mathematics='$_POST[Mathematics]',ComputerSciences='$_POST[ComputerSciences]' where roll_no=$_POST[roll_no]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>