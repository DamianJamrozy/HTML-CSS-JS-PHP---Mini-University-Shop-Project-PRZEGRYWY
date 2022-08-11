<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<?php
		session_start();
	?>
	
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			<b><a href="moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
		</div>
		
		<div id="right_head">
			<a href="me.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../Index.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="contact.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="brand.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		
	</div>

	
	<div id="content">
		
		<div id="left">
			
		</div>
		
		<div id="right">
			
		</div>
		
		
		
		<!-- Edycja adresu zamieszkania -->
		<div class="reg_next">
			<center>
			<h2>Dodaj więcej informacji.</h2>
			<h4>Zajmie Ci to tylko chwilkę, a nam pozwoli skonfigurować Twoje konto. </h3>
			<form method="POST" action="../php/edit_user.php">
					<font size="5px">Wpisz Ulicę</font><br><br>
					<input type="text" name="ulica" class="inpu" placeholder="Rejtana">
					<br><br><br>
					
					<font size="5px">Wpisz Numer Domu</font><br><br>
					<input type="text" name="nr_domu" class="inpu" placeholder="10" required>
					<br><br><br>
				
					<font size="5px">Wpisz Kod Pocztowy</font><br><br>
					<input type="text" name="kod_pocztowy" class="inpu" placeholder="10-100" pattern="^[0-9]{2}-[0-9]{3}$"  required>
					<br><br><br>
					
					<font size="5px">Wpisz Miejscowość</font><br><br>
					<input type="text" name="miejscowość" class="inpu" placeholder="Rzeszów" required>
					<br><br><br>
					
					<font size="5px">Wpisz Numer Mieszkania</font><br><br>
					<input type="text" name="nr_mieszkania" class="inpu" placeholder="5" pattern="(?=.*[0-9]).{}" >
					<br><br><br>
					
					<font size="5px">Wpisz Pocztę</font><br><br>
					<input type="text" name="poczta" class="inpu" placeholder="Rzeszów" required>
					<br><br><br>
					
					<font size="5px">Wybierz Avatar</font><br><br>
					<a href="#"> <img src="../img/avatar/default-user.png" width="8%" onclick="avatars()"></a>
					
					<br><br><br>
					<input type="submit" class="btn" value="ZATWIERDŹ" name="new_user">

			</form>
			</center>
		</div>
		

	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="./rodo.php">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<script type="text/javascript">
	//let avatar = getElementById('avatar');
	function avatars(){
		okno = window.open('avatar.php','Avatary','width=800,height=400');
	}
	
</script>

<?php
	include('../php/sprawdzanie_sesji.php');
	include('../php/edit_user.php');
?>

</html>