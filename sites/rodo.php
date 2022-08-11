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
		RODO<br>
Administratorem Twoich danych osobowych jest Rafał Iwańczyk oraz Damian Jamroży z
siedzibą w Rzeszowie 35-021 przy ul. Prof. Ludwika Chmaja 9. <br>
Poniżej znajdziesz wszelkie niezbędne informacje dotyczące przetwarzania Twoich danych osobowych w
związku z realizacją usługi (wskazujemy podstawę do przetwarzania danych).<br><br></center>
1. Dane kontaktowe inspektora ochrony danych osobowych  rafal120045@gmail.com.<br>
2. Przedstawicielem Administratora jest Damian Jamroży damianjamrozy@gmail.com.<br>
3. Dane osobowe przetwarzane są w celu zrealizowania złożonych zamówień.<br>
4. Dane osobowe będą przechowywane przez okres nieokreślony, do momentu istnienia konta na platformie.<br>
5. Po zakończeniu przetwarzania danych osobowych w pierwotnym celu, dane będą
przechowywane w celu gromadzenia historii zamówień.<br>
6. Podanie danych jest dobrowolne. Nie podanie wymaganych danych osobowych wiąże się z brakiem możliwości utworzenia konta na platformie.<br>
7. Jako administrator Twoich danych, zapewniamy Ci prawo dostępu do Twoich danych,
możesz je również sprostować, żądać ich usunięcia lub ograniczenia ich przetwarzania.
Możesz także skorzystać z uprawnienia do złożenia wobec Administratora sprzeciwu
wobec przetwarzania Twoich danych oraz prawa do przenoszenia danych do innego
administratora danych. W przypadku wyrażenia dobrowolnej zgody, przysługuje Ci
prawo cofnięcia zgody na przetwarzanie danych w dowolnym momencie co nie wpływa
na zgodność z prawem przetwarzania, którego dokonano na podstawie zgody przed jej
cofnięciem. Informujemy także, że przysługuje Ci prawo wniesienia skargi do organu
nadzorującego przestrzeganie przepisów ochrony danych osobowych.
<br>
Więcej informacji na temat rodo znajdziesz tutaj:<a href="https://uodo.gov.pl/pl/404/224" style="color: #ba1d63;">(RODO).</a>
	
	</div>
	
	<div id="foter">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="O_projekcie.php">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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