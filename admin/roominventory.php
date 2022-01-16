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
						<a href="dashboard.php">
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
						<a class="active" href="roominventory.php">
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
								<th  style="border-left: 1px solid #C1DAD7"> Oda ID'si </th>
								<th> Tipi </th>
								<th> Adı </th>
								<th> Açıklama </th>
								<th> Çift Kişilik Yatak Sayısı </th>
								<th> Tek Kişilik Yatak Sayısı </th>
								<th> Fiyat </th>
								<th> Resim 1 </th>
								<th> Resim 2 </th>
								<th> Resim 3 </th>
							</tr>
						</thead>
						<tbody>
						<?php 
							$query = mysqli_query($connection, "SELECT * FROM rooms");
							while($row = mysqli_fetch_assoc($query))
							{
								
								echo "
								<tr>
									<td>".$row['id']."</td>
									<td>".$row['type']."</td>
									<td>".$row['name']."</td>
									<td>".$row['description']."</td>
									<td>".$row['doubleBedNum']."</td>
									<td>".$row['singleBedNum']."</td>
									<td>".$row['price']."</td>
									<td><img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image1'])."' style='height: 10px; width: 15px;'/></td>
									<td><img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image2'])."' style='height: 10px; width: 15px;'/></td>
									<td><img src='data:image/jpg;charset=utf8;base64,".base64_encode($row['image3'])."' style='height: 10px; width: 15px;'/></td>
									<td><div align='center'><a href='deleteroom.php?id=".$row['id']."' class='delbutton'>SİL</a></div></td>
								</tr>
								
								";
							}
						?>
						</tbody>
					</table>
				</div>
				<div id="footer" class="radius-bottom">
					
					<a class="afooter-link" href=""></a>
					
					<a class="afooter-link" href=""></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</body>
</html>