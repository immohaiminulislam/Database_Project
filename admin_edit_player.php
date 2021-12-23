<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sms");
	$query = "update players set name='$_POST[name]',country_name='$_POST[country_name]',detail=$_POST[detail],mobile='$_POST[mobile]',email='$_POST[email]',password='$_POST[password]',remark='$_POST[remark]' where id_no = $_POST[id_no]";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text">
	alert("Details edited successfully.");
	window.location.href = "admin_dashboard.php";
</script>
