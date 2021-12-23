<!DOCTYPE html>
<html>
<head>
	<title>Admin Dashboard</title>
	<link rel="stylesheet" type="css" href="">
  	
	<style type="text">
		#header{
			height: 10%;
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
			background-color: white;
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
		$name = "";
		$connection = mysqli_connect("localhost","root","");
		$db = mysqli_select_db($connection,"sms");
	?>
</head>
<body>
	<div id="header"><br>
		<center>Go Cart Race Management &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email: <?php echo $_SESSION['email'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Name:<?php echo $_SESSION['name'];?> 
		<a href="logout.php">Logout</a>
		</center>
	</div>
	
	<div id="left_side">
		<br><br><br>
		<form action="" method="post">
			<table>
				<tr>
					<td>
						<input type="submit" name="search_player" value="Search Player">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="edit_player" value="Edit Player">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="add_new_player" value="Add New Player">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="delete_player" value="Delete player">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" name="show_all_player" value="Show All Players">
					</td>
				</tr>
			</table>
		</form>
	</div>
	<div id="right_side"><br><br>
		<div id="demo">
		<!-- #Code for search player---Start-->
			<?php
				if(isset($_POST['search_player']))
				{
					?>
					<center>
					<form action="" method="post">
					&nbsp;&nbsp;<b>Enter ID No:</b>&nbsp;&nbsp; <input type="text" name="ID_no">
					<input type="submit" name="search_by_id_no_for_search" value="Search">
					</form><br><br>
					<h4><b><u>Player's details</u></b></h4><br><br>
					</center>
					<?php
				}
				if(isset($_POST['search_by_id_no_for_search']))
				{
					$query = "select * from players where id_no = '$_POST[id_no]'";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<table>
							<tr>
								<td>
									<b>ID No:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['id_no']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Player's Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Country's Name:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['country_name']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>User Detail:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['detail']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Player Car Number:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['number']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Email:</b>
								</td> 
								<td>
									<input type="text" value="<?php echo $row['email']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Password:</b>
								</td> 
								<td>
									<input type="password" value="<?php echo $row['password']?>" disabled>
								</td>
							</tr>
							<tr>
								<td>
									<b>Remark:</b>
								</td> 
								<td>
									<textarea rows="3" cols="40" disabled><?php echo $row['remark']?></textarea>
								</td>
							</tr>
						</table>
						<?php
					}
				}
			?>
		<!-- #Code for edit player details---Start-->
		<?php
			if(isset($_POST['edit_player']))
			{
				?>
				<center>
				<form action="" method="post">
				&nbsp;&nbsp;<b>Enter ID No:</b>&nbsp;&nbsp; <input type="text" name="id_no">
				<input type="submit" name="search_by_id_no_for_edit" value="Search">
				</form><br><br>
				<h4><b><u>Player's details</u></b></h4><br><br>
				</center>
				<?php
			}
			if(isset($_POST['search_by_id_no_for_edit']))
			{
				$query = "select * from players where id_no = $_POST[id_no]";
				$query_run = mysqli_query($connection,$query);
				while ($row = mysqli_fetch_assoc($query_run)) 
				{
					?>
					<form action="admin_edit_player.php" method="post">
						<table>
						<tr>
							<td>
								<b>ID No:</b>
							</td> 
							<td>
								<input type="text" name="id_no" value="<?php echo $row['id_no']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" value="<?php echo $row['name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Country's Name:</b>
							</td> 
							<td>
								<input type="text" name="country_name" value="<?php echo $row['country_name']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>User Detail:</b>
							</td> 
							<td>
								<input type="text" name="detail" value="<?php echo $row['detail']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Player Car Number:</b>
							</td> 
							<td>
								<input type="text" name="mobile" value="<?php echo $row['number']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" value="<?php echo $row['email']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" value="<?php echo $row['password']?>">
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" name="remark"><?php echo $row['remark']?></textarea>
							</td>
						</tr><br>
						<tr>
							<td></td>
							<td>
								<input type="submit" name="edit" value="Save">
							</td>
						</tr>
					</table>
					</form>
					<?php
				}
			}
		?>
		<!-- #Code for Delete player details---Start-->
		<?php
			if(isset($_POST['delete_player']))
			{
				?>
				<center>
				<form action="delete_player.php" method="post">
				&nbsp;&nbsp;<b>Enter ID No:</b>&nbsp;&nbsp; <input type="text" name="id_no">
				<input type="submit" name="search_by_id_no_for_delete" value="Delete">
				</form><br><br>
				</center>
				<?php
			}
			?>

			<?php 
				if(isset($_POST['add_new_player'])){
					?>
					<center><h4>Fill the given details</h4></center>
					<form action="add_player.php" method="post">
						<table>
						<tr>
							<td>
								<b>ID No:</b>
							</td> 
							<td>
								<input type="text" name="id_no" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Name:</b>
							</td> 
							<td>
								<input type="text" name="name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Country's Name:</b>
							</td> 
							<td>
								<input type="text" name="country_name" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>User Detail:</b>
							</td> 
							<td>
								<input type="text" name="detail" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Player Car Number:</b>
							</td> 
							<td>
								<input type="text" name="number" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Email:</b>
							</td> 
							<td>
								<input type="text" name="email" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Password:</b>
							</td> 
							<td>
								<input type="password" name="password" required>
							</td>
						</tr>
						<tr>
							<td>
								<b>Remark:</b>
							</td> 
							<td>
								<textarea rows="3" cols="40" placeholder="Optional" name="remark"></textarea>
							</td>
						</tr>
						<tr>
							<td></td>
							<td><br><input type="submit" name="add" value="Add Player"></td>
						</tr>
					</table>
					</form>
					<?php
				}
			?>
			<?php
				if(isset($_POST['show_organizer']))
				{
					?>
					<center>
						<h5>Show All player's Details</h5>
						<table>
							<tr>
								<td id="td"><b>ID</b></td>
								<td id="td"><b>Name</b></td>
								<td id="td"><b>Car Number</b></td>
								<td id="td"><b>Email</b></td>
								<td id="td"><b>View Detail</b></td>
							</tr>
						</table>
					</center>
					<?php
					$query = "select * from allplayers";
					$query_run = mysqli_query($connection,$query);
					while ($row = mysqli_fetch_assoc($query_run)) 
					{
						?>
						<center>
						<table style="border-collapse: collapse;border: 1px solid black;">
							<tr>
								<td id="td"><?php echo $row['t_id']?></td>
								<td id="td"><?php echo $row['name']?></td>
								<td id="td"><?php echo $row['number']?></td>
								<td id="td"><?php echo $row['email']?></td>
								<td id="td"><a href="#">View</a></td>
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