<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"aca");
	$query = "update teachers set teacher_name='$_POST[teacher_name]',class_teacher='$_POST[class_teacher]',teacher_subject='$_POST[teacher_subject]',mobile_no='$_POST[mobile_no]',email='$_POST[email]',password='$_POST[password]',gender='$_POST[gender]' where teacher_name ='$_POST[teacher_name]'";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text/javascript">
	alert("Details edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>