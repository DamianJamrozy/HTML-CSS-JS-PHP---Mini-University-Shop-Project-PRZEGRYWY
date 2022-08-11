<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_bucket.css" type="text/css" />
	<?php
		session_start();
		include('../php/db_connection.php');
		// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);
	?>
	
	<?php
	//include('../php/bucket_in.php');
	
	
	?>
	
</head>
<body>
	<div id="header">
		<div id="left_head">
			<div id="left_ban"><a href="../Index.php"><img src="../img/Logo-project2.png"  id="log"></a></div>
			<b><a href="admin.php"><div class="side_right" id="admin_panel"> <center><style="padding-top: 14%;"><img class="icon_hed" src="../img/icon/price.png" width="25%"><br><br>ADMIN PANEL</center></div></a>
			<b><a href="user_account.php"><div class="side_right" id="client_panel"> <center><img class="icon_hed" src="../img/icon/client.png" width="25%"><br><br>MOJE KONTO</center></div></a>
			<b><a href="moderator/messenger_moderator.php"><div class="side_right" id="moderator_panel"> <center><img class="icon_hed" src="../img/icon/clients.png" width="25%"><br><br>Wiadomości</center></div></a>
			
		</div>
		
		<div id="right_head">
			<a href="me.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/me.png" width="25%"><br><br>O SKLEPIE</center></div></a>
			<a href="../Index.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/home.png" width="25%"><br><br>HOME</center></div></a>
			<a href="contact.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/phone.png" width="25%"><br><br>KONTAKT</center></div></a>
			<a href="brand.php"><div class="side"> <center><img class="icon_hed" src="../img/icon/game.png" width="25%"><br><br>PRODUKTY</center></div></a>
			<a href="bucket.php"><div class="side active_men"> <center><img class="icon_hed" src="../img/icon/bucket.png" width="25%"><br><br>KOSZYK</center></div></a>
			<div class="side_btn" id="Login"><a href="login.php"><center><button class="btn">ZALOGUJ SIĘ</button> </center></a></div>
			<div class="side_btn" id="Logout"><a href="../php/wylogowanie.php"><center><button class="btn">Wyloguj SIĘ</button> </center></a></div>

		</div>
		
	</div>

	
	<center><div id="content">
		<h2>Podsumowanie zamówienia</h2>
		<?php

			$login = $_SESSION['login'];
			// Pobieranie danych - id_usera
			$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='".$login."'");

			while($row = mysqli_fetch_array($sql_login_to_id)) {
				$id_user[] = $row['id_uzytkownika'];
			}
			$id_usera=$id_user[0];
			
			//echo("<script>console.log('".$id_usera."');</script>");
			
			$sql_key = mysqli_query($database,"SELECT A.kod FROM kod_rabatowy A WHERE A.id_kodu_rabatowego in (SELECT B.id_kodu_rabatowego FROM zamowienia B WHERE B.id_uzytkownika='".$id_usera."')");
			
			while($row = mysqli_fetch_array($sql_key)) {
				$used_key[] = $row['kod'];
			}
			echo("<script>console.log('".$used_key[0]."');</script>");




	
			print_r("<form method='POST' action='../php/pay.php'><table style='color:white; font-weight:700;'>");
			print_r("<tr><th>Okładka gry</th><th>Id Gry</th><th>Nazwa Gry</th><th>Platforma</th><th>Edycja</th><th>Wersja</th><th>Ilość kopii</th><th>Cena</th></tr>");
			$i=0;
			while($i<$_SESSION['count_store']){
				print_r("<tr><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th><th><hr></th> </tr>");
				print_r("<th><img src='data:image/jpg;charset=utf8;base64," .base64_encode($_SESSION['grafika'][$i])."' height='150px'> </th>");
				print_r("<th>".$_SESSION['id_gry'][$i]." </th>");
				print_r("<th>".$_SESSION['game'][$i]." </th>");
				print_r("<th>".$_SESSION['Platforma'][$i]." </th>");
				print_r("<th>".$_SESSION['Edycja'][$i]." </th>");
				print_r("<th>".$_SESSION['Wersja'][$i]." </th>");
				print_r("<th>".$_SESSION['Ilosc_kopii'][$i]." </th>");
				print_r("<th>".$_SESSION['Cena_ogolna'][$i]." </th>");
				$i++;
			}
			print_r("</table>");
			print_r("<table style='color:white; font-weight:700;'>");
			
	
	if (isset($_POST['zamowienie_platnosc'])){
			
			// Pobieramy dane z zamówienia
			$Select_dostawa = $_POST['Select_dostawa'];
			$Select_platnosc = $_POST['Select_platnosc'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$ulica = $_POST['ulica'];
			$nr_domu = $_POST['nr_domu'];
			$kod_pocztowy = $_POST['kod_pocztowy'];
			$miejscowosc = $_POST['miejscowosc'];
			$nr_mieszkania = $_POST['nr_mieszkania'];
			$poczta = $_POST['poczta'];
			$kod_rabatowy = $_POST['kod_rabatowy'];
			
			$_SESSION['ul_zam']=$ulica;
			$_SESSION['nr_dom_zam']=$nr_domu;
			$_SESSION['nr_m_zam']=$nr_mieszkania;
			$_SESSION['k_poczt_zam']=$kod_pocztowy;
			$_SESSION['poczt_zam']=$poczta;
			$_SESSION['email_zam']=$email;
			$_SESSION['mias_zam']=$miejscowosc;
			$_SESSION['tel']=$tel;
			$_SESSION['Select_dostawa']=$Select_dostawa;
			$_SESSION['Select_platnosc']=$Select_platnosc;
			$_SESSION['imie']=$imie;
			$_SESSION['nazwisko']=$nazwisko;
			
			
			// Pobieranie danych - rodzaje dostawy
			$sql_k_rab = mysqli_query($database, "SELECT * FROM kod_rabatowy");

			while($row = mysqli_fetch_array($sql_k_rab)) {
				$kod[] = $row['kod'];
				$rabat_kod[] = $row['rabat'];
			}
			$length_dost = count($kod);
			
			$j=0;
			$kod_akt = FALSE;
			while($j<$length_dost){
				if($kod_rabatowy==$kod[$j]){
					$kod_akt = TRUE;
					$kod_aktywowany = $kod[$j];
					$kod_znizka = $rabat_kod[$j];
				}
				$j++;
			}
			
			
			
			// Jeżeli nie ma dostawy
			if($Select_dostawa=='Rodzaj dostawy'){
				echo('<script> 
					alert("Wybierz metodę dostawy!");
					window.location = "bucket.php";
					</script>');
			}
			
			// Jeżeli nie ma płatności
			if($Select_platnosc=='Typ płatności'){
				echo('<script> 
					alert("Wybierz metodę płatności!");
					window.location = "bucket.php";
					</script>');
			}
			
			if($nr_mieszkania==''){
				$dom_mieszkanie = $nr_domu;
			}
			else{
				$dom_mieszkanie = $nr_domu."/".$nr_mieszkania;
			}
			$q = 0;
			$is_used = FALSE;
			$length_key = count($used_key);
			while($q<$length_key){
				if($kod_akt == TRUE && $kod_aktywowany==$used_key[$q]){
					$kod_akt = FALSE;
					$is_used = TRUE;
				}
				$q++;
			}
			$_SESSION['zaplata'] = $_SESSION['suma'];
			if($kod_akt == TRUE){
				print_r("<tr><td>Do zapłacenia:</td><td><s>".$_SESSION['suma']." PLN</td></tr>");
				$zaplata = $_SESSION['suma'] - $kod_znizka/100 * $_SESSION['suma'];
				print_r("<tr><td>Do zapłacenia:</td><td>".$zaplata." PLN - Po rabacie (".$kod_aktywowany.")</td></tr>");
				$_SESSION['zaplata'] = $zaplata;
			}else{
				print_r("<tr><td>Do zapłacenia:</td><td>".$_SESSION['suma']." PLN</td></tr>");
				$_SESSION['zaplata'] = $_SESSION['suma'];
				if($is_used == TRUE){
					print_r("<tr><td>Kod rabatowy:</td><td>Podany kod rabatowy został już wykorzystany!</td></tr>");
				}
				$_SESSION['zaplata']= $_SESSION['suma'];
			}
			
			print_r("<tr><td>Imię:</td><td>".$imie." </td></tr>");
			print_r("<tr><td>Nazwisko:</td><td>".$nazwisko." </td></tr>");
			print_r("<tr><td>Telefon:</td><td>".$tel." </td></tr>");
			print_r("<tr><td>E-mail:</td><td>".$email." </td></tr>");
			print_r("<tr><td>Typ dostawy:</td><td>".$Select_dostawa." </td></tr>");
			print_r("<tr><td>Adres dostawy:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$miejscowosc." ".$ulica." ".$dom_mieszkanie.", ".$kod_pocztowy." ".$poczta."</td></tr>");
			print_r("<tr><td>Typ płatności:</td><td>".$Select_platnosc." </td></tr>");
			
			
	}
	
	if (isset($_POST['zamowienie_platnosc_sklep'])){
			
			// Pobieramy dane z zamówienia
			$Select_dostawa = $_POST['Select_dostawa'];
			$Select_platnosc = $_POST['Select_platnosc'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$Select_shop = $_POST['Select_shop'];
			$id_sklepu = $_POST['id_sklepu'];
			$kod_rabatowy = $_POST['kod_rabatowy'];
			
			$_SESSION['Select_dostawa'] = $Select_dostawa;
			$_SESSION['Select_platnosc'] = $Select_platnosc;
			$_SESSION['id_sklepu'] = $id_sklepu;
			$_SESSION['kod_rabatowy'] = $kod_rabatowy;
			
			$_SESSION['ul_zam']=NULL;
			$_SESSION['nr_dom_zam']=NULL;
			$_SESSION['nr_m_zam']=NULL;
			$_SESSION['k_poczt_zam']=NULL;
			$_SESSION['poczt_zam']=NULL;
			$_SESSION['email_zam']=$email;
			$_SESSION['mias_zam']=NULL;
			
			// Pobieranie danych - rodzaje dostawy
			$sql_k_rab = mysqli_query($database, "SELECT * FROM kod_rabatowy");

			while($row = mysqli_fetch_array($sql_k_rab)) {
				$kod[] = $row['kod'];
				$rabat_kod[] = $row['rabat'];
			}
			$length_dost = count($kod);
			
			$j=0;
			$kod_akt = FALSE;
			while($j<$length_dost){
				if($kod_rabatowy==$kod[$j]){
					$kod_akt = TRUE;
					$kod_aktywowany = $kod[$j];
					$kod_znizka = $rabat_kod[$j];
				}
				$j++;
			}
			
			$q = 0;
			$is_used = FALSE;
			$length_key = count($used_key);
			while($q<$length_key){
				if($kod_akt == TRUE && $kod_aktywowany==$used_key[$q]){
					$kod_akt = FALSE;
					$is_used = TRUE;
				}
				$q++;
			}

			
			// Jeżeli nie ma dostawy
			if($Select_dostawa=='Rodzaj dostawy'){
				echo('<script> 
					alert("Wybierz metodę dostawy!");
					window.location = "bucket.php";
					</script>');
			}
			
			// Jeżeli nie ma płatności
			if($Select_platnosc=='Typ płatności'){
				echo('<script> 
					alert("Wybierz metodę płatności!");
					window.location = "bucket.php";
					</script>');
			}
			
			// Jeżeli nie ma wybranego sklepu
			if($Select_shop=='Lokalizacja sklepu'){
				echo('<script> 
					alert("Wybierz lokalizację sklepu!");
					window.location = "bucket.php";
					</script>');
			}
			if($kod_akt == TRUE){
				print_r("<tr><td>Do zapłacenia:</td><td><s>".$_SESSION['suma']." PLN</td></tr>");
				$zaplata = $_SESSION['suma'] - $kod_znizka/100 * $_SESSION['suma'];
				print_r("<tr><td>Do zapłacenia:</td><td>".$zaplata." PLN - Po rabacie (".$kod_aktywowany.")</td></tr>");
				$_SESSION['zaplata'] = $zaplata;
			}else{
				print_r("<tr><td>Do zapłacenia:</td><td>".$_SESSION['suma']." PLN</td></tr>");
				if($is_used == TRUE){
					print_r("<tr><td>Kod rabatowy:</td><td>Podany kod rabatowy został już wykorzystany!</td></tr>");
				}
				$_SESSION['zaplata']= $_SESSION['suma'];
			}
			print_r("<tr><td>Imię:</td><td>".$imie." </td></tr>");
			print_r("<tr><td>Nazwisko:</td><td>".$nazwisko." </td></tr>");
			print_r("<tr><td>Telefon:</td><td>".$tel." </td></tr>");
			print_r("<tr><td>E-mail:</td><td>".$email." </td></tr>");
			print_r("<tr><td>Typ dostawy:</td><td>".$Select_dostawa." </td></tr>");
			print_r("<tr><td>Lokalizacja sklepu:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td><td>".$Select_shop." </td></tr>");
			print_r("<tr><td>Typ płatności:</td><td>".$Select_platnosc." </td></tr>");
			
	}
	
	
	
	if (isset($_POST['zamowienie_platnosc_cd'])){
			
			// Pobieramy dane z zamówienia
			$Select_dostawa = $_POST['Select_dostawa'];
			$Select_platnosc = $_POST['Select_platnosc'];
			$imie = $_POST['imie'];
			$nazwisko = $_POST['nazwisko'];
			$tel = $_POST['tel'];
			$email = $_POST['email'];
			$kod_rabatowy = $_POST['kod_rabatowy'];
			
			$_SESSION['Select_dostawa'] = $Select_dostawa;
			$_SESSION['Select_platnosc'] = $Select_platnosc;
			$_SESSION['id_sklepu'] = 1;
			$_SESSION['kod_rabatowy'] = $kod_rabatowy;
			
			$_SESSION['ul_zam']=NULL;
			$_SESSION['nr_dom_zam']=NULL;
			$_SESSION['nr_m_zam']=NULL;
			$_SESSION['k_poczt_zam']=NULL;
			$_SESSION['poczt_zam']=NULL;
			$_SESSION['email_zam']=$email;
			$_SESSION['mias_zam']=NULL;
			
			// Pobieranie danych - rodzaje dostawy
			$sql_k_rab = mysqli_query($database, "SELECT * FROM kod_rabatowy");

			while($row = mysqli_fetch_array($sql_k_rab)) {
				$kod[] = $row['kod'];
				$rabat_kod[] = $row['rabat'];
			}
			$length_dost = count($kod);
			
			$j=0;
			$kod_akt = FALSE;
			while($j<$length_dost){
				if($kod_rabatowy==$kod[$j]){
					$kod_akt = TRUE;
					$kod_aktywowany = $kod[$j];
					$kod_znizka = $rabat_kod[$j];
				}
				$j++;
			}
			
			$q = 0;
			$is_used = FALSE;
			$length_key = count($used_key);
			while($q<$length_key){
				if($kod_akt == TRUE && $kod_aktywowany==$used_key[$q]){
					$kod_akt = FALSE;
					$is_used = TRUE;
				}
				$q++;
			}

			
			// Jeżeli nie ma dostawy
			if($Select_dostawa=='Rodzaj dostawy'){
				echo('<script> 
					alert("Wybierz metodę dostawy!");
					window.location = "bucket.php";
					</script>');
			}
			
			// Jeżeli nie ma płatności
			if($Select_platnosc=='Typ płatności'){
				echo('<script> 
					alert("Wybierz metodę płatności!");
					window.location = "bucket.php";
					</script>');
			}
			
			if($kod_akt == TRUE){
				print_r("<tr><td>Do zapłacenia:</td><td><s>".$_SESSION['suma']." PLN</td></tr>");
				$zaplata = $_SESSION['suma'] - $kod_znizka/100 * $_SESSION['suma'];
				print_r("<tr><td>Do zapłacenia:</td><td>".$zaplata." PLN - Po rabacie (".$kod_aktywowany.")</td></tr>");
				$_SESSION['zaplata'] = $zaplata;
			}else{
				print_r("<tr><td>Do zapłacenia:</td><td>".$_SESSION['suma']." PLN</td></tr>");
				if($is_used == TRUE){
					print_r("<tr><td>Kod rabatowy:</td><td>Podany kod rabatowy został już wykorzystany!</td></tr>");
				}
				$_SESSION['zaplata']= $_SESSION['suma'];
			}
			print_r("<tr><td>Imię:</td><td>".$imie." </td></tr>");
			print_r("<tr><td>Nazwisko:</td><td>".$nazwisko." </td></tr>");
			print_r("<tr><td>Telefon:</td><td>".$tel." </td></tr>");
			print_r("<tr><td>E-mail:</td><td>".$email." </td></tr>");
			print_r("<tr><td>Typ dostawy:</td><td>".$Select_dostawa." </td></tr>");
			print_r("<tr><td>Typ płatności:</td><td>".$Select_platnosc." </td></tr>");
			
	}
	
	
	
	
	
	if($Select_platnosc=='Karta Płatnicza' && $Select_dostawa!='Kurierem za pobraniem +25 PLN'){
		print_r("<tr><th colspan='2'><br><br><br><br><br><br>Dane karty płatniczej:<br><br><br></th></tr>");
		print_r("<tr><td>Imię: <br><br><br></td><td><input class='inpu' type='text' name='imie' placeholder='Imię' pattern='(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}' required><br><br><br></td></tr>");
		print_r("<tr><td>Nazwisko: <br><br><br></td><td><input class='inpu' type='text' name='nazwisko' placeholder='Nazwisko' pattern='(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}' required><br><br><br></td></tr>");
		print_r("<tr><td>Nr. Karty: <br><br><br></td><td><input type='text' name='card' maxlength='16' minlength='16' class='inpu' placeholder='Nr. karty' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br><br><br></td></tr>");
		print_r("<tr><td>Data ważności karty: <br><br><br></td><td><input class='inpu' type='month' name='date' placeholder='Data ważności' pattern='(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}' required><br><br><br></td></tr>");
		print_r("<tr><td>Numer kontrolny: <br><br><br></td><td><input maxlength='3' class='inpu' type='text' name='control' placeholder='Numer kontrolny' pattern='(?=.*[a-z])(?=.*[A-z-9ąęźżśóćńł]).{}' required><br><br><br></td></tr>");
	}
	else if($Select_platnosc=='SMS' && $Select_dostawa!='Kurierem za pobraniem +25 PLN'){
		print_r("<tr><th colspan='2'><br><br><br><br><br><br>Dane Telefonu:<br><br><br></th></tr>");
		print_r("<tr><td>Nr. telefonu: <br><br><br></td><td><input class='inpu' type='text' name='nr_tel' maxlength='9' placeholder='123456789' pattern='[0-9]{3}[0-9]{3}[0-9]{3}' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br><br><br></td></tr>");
	
	}
	else if($Select_platnosc=='Blik' && $Select_dostawa!='Kurierem za pobraniem +25 PLN'){
		print_r("<tr><th colspan='2'><br><br><br><br><br><br>Dane kodu blik:<br><br><br></th></tr>");
		print_r("<tr><td>Kod blik: <br><br><br></td><td><input class='inpu' type='text' name='Kod_blik' maxlength='6' placeholder='123456' pattern='[0-9]{3}[0-9]{3}' onkeypress='return event.charCode >= 48 && event.charCode <= 57' required><br><br><br></td></tr>");
	}
	print_r("<tr><th colspan='2'><br><br><br><input type='submit' class='btn' name='pay' value='akceptuj'></th></tr>");
	print_r("</table></form>");


?>
		
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
<?php
	include('../php/sprawdzanie_sesji.php');
?>



</html>


