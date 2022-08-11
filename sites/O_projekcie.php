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
		<center>
		<h3>O projekcie </h3><br>
		Projekt ten został utworzony przez Damiana Jamrożego oraz Rafała Iwańczyka.<br><br>
		Wykorzystuje on takie technologie jak:<br><table style='color:white;'><tr><td>
		<li>PHP v7.4.7</li>
		<li>HTML</li>
		<li>JavaScript</li>
		<li>JQuery</li>
		<li>CSS</li>
		<li>MySql</li>
		<li>Bootstrap (Wykorzystany jedynie do listowania stron)</li></tr></td></table><br><br><center>
		Wszystkie wykorzystane grafiki są grafikami autorskimi lub pozyskane z legalnych źródeł takich jak:
		<table style='color:white;'><tr><td>
		<li>https://pl.freepik.com/darmowe-ikony</li>
		<li>https://unsplash.com/</li>
		<li>https://pixabay.com/pl/</li></tr></td></table><br><br>
		Grafiki gier komputerowych pozyskane zostały na podstawie praw wykorzystania prac w celach edukacyjnych i nie służą do żadnej innej funkcji.<br>
		Ceny gier bazowane są na średniej cenie rynkowej danych gier na miesiąc marzec 2021 roku.<br>
		
		

	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="#">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://damianjamrozy.000webhostapp.com/index.php/rodo/">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
	</div>

</body>
<script type="text/javascript">
    let title = document.getElementById("collors");
    title.classList.add("colpink");
    setInterval("moja_funkcja()",5000); 
    
    function moja_funkcja(){
        
        if (title.className=='colpink'){
            title.classList.remove("colpink");
            title.classList.add("colblue");
        }
        
        else {
            title.classList.remove("colblue");
            title.classList.add("colpink");
        }
        
    }
</script>

<?php
	include('../php/sprawdzanie_sesji.php');
?>
</html>