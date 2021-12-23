<?php
	$connection = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($connection,"sms");
	$query = "insert into players values('',$_POST[id_no],'$_POST[name]','$_POST[country_name]',$_POST[detail],'$_POST[number]','$_POST[email]','$_POST[password]','$_POST[remark]')";
	$query_run = mysqli_query($connection,$query);
?>
<script type="text">
	alert("So Player Has been added successfully.");
	window.location.href = "admin_dashboard.php";
</script>
