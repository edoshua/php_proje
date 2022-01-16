<?php 
	include "../dbconnection.php";
?>

<html>
<head>
<link href="css/style.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="febe/style.css" type="text/css" media="screen" charset="utf-8">	
</head>
<body>
	<div id="container">
		<div id="adminbar-outer" class="radius-bottom">
			<div id="adminbar" class="radius-bottom">
				<a id="logo" href="dashboard.php"></a>
				<div id="details">
					<a class="avatar" href="javascript: void(0)">
					<img width="36" height="36" alt="avatar" src="img/avatar.jpg">
					</a>
					<div class="tcenter">
					Merhaba
					<strong>Admin</strong>
					!
					<br>
					<a class="alightred" href="../index.php">Çıkış Yap</a>
					</div>
				</div>
			</div>
		</div>
		<div id="panel-outer" class="radius" style="opacity: 1;">
			<div id="panel" class="radius">
				<ul class="radius-top clearfix" id="main-menu">
					<li>
						<a class="active" href="dashboard.php">
							<img alt="Dashboard" src="img/m-dashboard.png">
							<span>Rezervasyonlar</span>
						</a>
					</li>
					<li>
						<a href="user.php">
							<img alt="Users" src="img/m-users.png">
							<span>Kullanıcılar</span>
							<span class="submenu-arrow"></span>
						</a>
					</li>
					<li>
						<a href="aboutus.php">
							<img alt="Articles" src="img/m-articles.png">
							<span>Hakkımızda</span>
							<span class="submenu-arrow"></span>
						</a>
					</li>
					<li>
						<a href="message.php">
							<img alt="Newsletter" src="img/m-newsletter.png">
							<span>Mesajlar</span>
						</a>
					</li>
					<li>
						<a href="gallery.php">
							<img alt="Statistics" src="img/m-gallery.png">
							<span>Galeri</span>
						</a>
					</li>
					<li>
						<a href="roominventory.php">
							<img alt="Custom" src="img/m-custom.png">
							<span>Odalar</span>
						</a>
					</li>
					<div class="clearfix"></div>
				</ul>
				<div id="content" class="clearfix">
					<table cellpadding="1" cellspacing="1" id="resultTable">
						<thead>
							<tr>
								<th  style="border-left: 1px solid #C1DAD7"> Rezervasyon No. </th>
								<th> Kullanıcı No. </th>
								<th> Ad Soyad </th>
								<th> Giriş Tarihi </th>
								<th> Çıkış Tarihi </th>
								<th> Oda No. </th>
								<th> Rezervasyon Durumu</th>
								<th> İşlem </th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$query = mysqli_query($connection, "SELECT * FROM reservation");
							while($row = mysqli_fetch_assoc($query))
							{
								$userid = $row['user_id'];
								$userquery = mysqli_query($connection, "SELECT * FROM users WHERE id = $userid");
								$user = mysqli_fetch_assoc($userquery);
								$username = $user['name']." ".$user['surname'];
								
								echo "
								<tr>
									<td>".$row['reservation_id']."</td>
									<td>".$row['user_id']."</td>
									<td>".$username."</td>
									<td>".$row['arrival']."</td>
									<td>".$row['departure']."</td>
									<td>".$row['room_id']."</td>
									<td>".$row['status']."</td>
									<td><div align='center'><a href='deleteres.php?id=".$row['reservation_id']."' class='delbutton'>İPTAL ET</a></div></td>
								</tr>
								
								";
							}
						?>
						</tbody>
					</table>
					<?php 
						if(isset($_GET['Message'])){
							echo $_GET['Message'];
						}
					?>
				</div>
				
				<div id="footer" class="radius-bottom">
					 
					<a class="afooter-link" href=""> </a>
					 
					<a class="afooter-link" href=""> </a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>
</html>