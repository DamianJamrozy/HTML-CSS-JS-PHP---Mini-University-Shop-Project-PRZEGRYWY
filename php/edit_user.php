<html>
<head>
<link rel="stylesheet" href="../style/style.css" type="text/css" />
</head>
<?php
	//ob_start();
	//session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
	// Ukrywanie błędu (brak zmiennej login)
		error_reporting(0);
		ini_set('display_errors', 0);

	session_start();
	
	$x = $_SESSION['login'];

	// Nowy user 
    if (isset($_POST['new_user']))
    {
		$ulica = $_POST['ulica'];
		$nr_domu = $_POST['nr_domu'];
		$kod_pocztowy = $_POST['kod_pocztowy'];
		$miejscowość = $_POST['miejscowość'];
		$nr_mieszkania = $_POST['nr_mieszkania'];
		$poczta = $_POST['poczta'];
		$x = $_SESSION['login'];
		
		
		$sql_zap = "UPDATE uzytkownicy SET ulica_uzytkownika='$ulica', miasto_uzytkownika='$miejscowość', nr_domu='$nr_domu',nr_lokalu='$nr_mieszkania', kod_pocztowy='$kod_pocztowy',miejscowosc_poczty='$poczta' WHERE login='$x'";
		//echo($sql_zap);
		$res_wyk = mysqli_query($database, $sql_zap);
		
		$login = $_SESSION['login'];
		
		// Pobieranie imienia
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$av = $_POST['form'];
		$_SESSION['avatar'] = $av;
		$loginn = $log[0];
		
		
		
		$sql_e = "UPDATE uzytkownicy SET id_avatar='$av' WHERE login='$log[0]'";
		$res_e = mysqli_query($database, $sql_e);
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['avatar'] = '';
		$_SESSION['nr_karty'] = '';
			
		session_regenerate_id();
		session_unset();
		
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie imienia
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
		echo("<script>alert('Dane zostały zmienione'); </script>");
		echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
	}
	
	
	//Edycja imienia i nazwiska
	 if (isset($_POST['edit_name_button']))
    {
		$imie = $_POST['firname'];
		$nazwisko = $_POST['surname'];
		//$x = $_SESSION['login'];
		
		
		$sql_zap = "UPDATE uzytkownicy SET imie='$imie', nazwisko='$nazwisko' WHERE login='$x'";
		//echo($sql_zap);
		$res_wyk = mysqli_query($database, $sql_zap);
		
		$login = $_SESSION['login'];
		
		// Pobieranie loginu
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$loginn = $log[0];
		
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['avatar'] = '';
		$_SESSION['nr_karty'] = '';	
		session_regenerate_id();
		session_unset();
		
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie loginu
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
		echo("<script>alert('Dane zostały zmienione'); </script>");
		echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
	}
	
	
	
	//Edycja adresu
	 if (isset($_POST['edit_address_button']))
    {
		$ulica_uzytkownika = $_POST['ulica_uzytkownika'];
		$nr_domu = $_POST['nr_domu'];
		$kod_pocztowy = $_POST['kod_pocztowy'];
		$miasto_uzytkownika = $_POST['miasto_uzytkownika'];
		$nr_lokalu = $_POST['nr_lokalu'];
		$miejscowosc_poczty = $_POST['miejscowosc_poczty'];
		//$x = $_SESSION['login'];
		
		
		$sql_zap = "UPDATE uzytkownicy SET ulica_uzytkownika='$ulica_uzytkownika', miasto_uzytkownika='$miasto_uzytkownika', nr_domu='$nr_domu',nr_lokalu='$nr_lokalu', kod_pocztowy='$kod_pocztowy',miejscowosc_poczty='$miejscowosc_poczty' WHERE login='$x'";
		//echo($sql_zap);
		$res_wyk = mysqli_query($database, $sql_zap);
		
		$login = $_SESSION['login'];
		
		// Pobieranie loginu
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$loginn = $log[0];
		
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['avatar'] = '';
		$_SESSION['nr_karty'] = '';
			
		session_regenerate_id();
		session_unset();
		
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie loginu
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
		echo("<script>alert('Dane zostały zmienione'); </script>");
		echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
	}
	
	//Edycja kontaktu
	 if (isset($_POST['edit_contact_button']))
    {
		$tel = $_POST['tel'];
		$email = $_POST['email'];
		//$x = $_SESSION['login'];
		
		
		$sql_zap = "UPDATE uzytkownicy SET telefon='$tel',email='$email' WHERE login='$x'";
		//echo($sql_zap);
		$res_wyk = mysqli_query($database, $sql_zap);
		
		$login = $_SESSION['login'];
		
		// Pobieranie loginu
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$loginn = $log[0];
		
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['avatar'] = '';
		$_SESSION['nr_karty'] = '';
			
		session_regenerate_id();
		session_unset();
		
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie loginu
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
		echo("<script>alert('Dane zostały zmienione'); </script>");
		echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
	}
	
	
	//Edycja imienia i nazwiska
	 if (isset($_POST['edit_card_button']))
    {
		$card = $_POST['card'];
		//$x = $_SESSION['login'];
		
		
		$sql_zap = "UPDATE uzytkownicy SET nr_karty='$card' WHERE login='$x'";
		//echo($sql_zap);
		$res_wyk = mysqli_query($database, $sql_zap);
		
		$login = $_SESSION['login'];
		
		// Pobieranie loginu
		$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

		while($row = mysqli_fetch_array($sql1)) {
			$log[] = $row['login'];
		}
		 
		$loginn = $log[0];
		
		
		$_SESSION['zalogowany']=false;
		$_SESSION['login'] = '';
		$_SESSION['admin'] = 0;
		$_SESSION['imie'] = '';
		$_SESSION['nazwisko'] = '';
		$_SESSION['ulica_uzytkownika'] = '';
		$_SESSION['miasto_uzytkownika'] = '';
		$_SESSION['nr_domu'] = '';
		$_SESSION['nr_lokalu'] = '';
		$_SESSION['kod_pocztowy'] = '';
		$_SESSION['miejscowosc_poczty'] = '';
		$_SESSION['email'] = '';
		$_SESSION['telefon'] = '';
		$_SESSION['avatar'] = '';
		$_SESSION['nr_karty'] = '';	
		session_regenerate_id();
		session_unset();
		
		
		// Otworzenine sesji na nowo w celu wprowadzenia zmian w profilu - inaczej trzeba by logować się ponownie w celu wprowadzenia zmian
		
		$_SESSION['zalogowany'] = true;
        $_SESSION['login'] = $log[0];
		// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$log[0]' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
		// Pobieranie loginu
			$sql1 = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login = '$login'");

			while($row = mysqli_fetch_array($sql1)) {
				$names1[] = $row['imie'];
				$names2[] = $row['nazwisko'];
				$names3[] = $row['ulica_uzytkownika'];
				$names4[] = $row['miasto_uzytkownika'];
				$names5[] = $row['nr_domu'];
				$names6[] = $row['nr_lokalu'];
				$names7[] = $row['kod_pocztowy'];
				$names8[] = $row['miejscowosc_poczty'];
				$names9[] = $row['email'];
				$names10[] = $row['telefon'];
				$names11[] = $row['id_karty_lojalnosciowej'];
				$names12[] = $row['ilosc_logowan'];
				$names13[] = $row['id_avatar'];
				$names14[] = $row['nr_karty'];
			}
			$_SESSION['imie'] = $names1[0];
			$_SESSION['nazwisko'] = $names2[0];
			$_SESSION['ulica_uzytkownika'] = $names3[0];
			$_SESSION['miasto_uzytkownika'] = $names4[0];
			$_SESSION['nr_domu'] = $names5[0];
			$_SESSION['nr_lokalu'] = $names6[0];
			$_SESSION['kod_pocztowy'] = $names7[0];
			$_SESSION['miejscowosc_poczty'] = $names8[0];
			$_SESSION['email'] = $names9[0];
			$_SESSION['telefon'] = $names10[0];
			$_SESSION['id_karty_lojalnosciowej'] = $names11[0];
			$_SESSION['id_avatar'] = $names13[0];
			$_SESSION['nr_karty'] = $names14[0];
		
		echo("<script>alert('Dane zostały zmienione'); </script>");
		echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
	}
	
	
	
	
	
	//Edycja hasła
	 if (isset($_POST['edit_password_button']))
    {
		$old_password = $_POST['old_passwd'];
		$password1 = $_POST['new_passwd1'];
		$password2 = $_POST['new_passwd2'];
		//$x = $_SESSION['login'];
		

		// Sprawdzamy czy użytkownik podał poprawne stare hasło
		if (mysqli_num_rows(mysqli_query($database,"SELECT login, haslo FROM uzytkownicy WHERE login = '".$x."' AND haslo = '".md5($old_password)."';")) > 0){
			// Sprawdzamy czy hasła są takie same
			if ($password1 == $password2) {
				$sql_zap = "UPDATE uzytkownicy SET haslo='".md5($password1)."' WHERE login='$x'";
				//echo($sql_zap);
				$res_wyk = mysqli_query($database, $sql_zap);
				
				// Niszczenie sesji oraz danych kontaktu
				$_SESSION['zalogowany']=false;
				$_SESSION['login'] = '';
				$_SESSION['admin'] = 0;
				$_SESSION['imie'] = '';
				$_SESSION['nazwisko'] = '';
				$_SESSION['ulica_uzytkownika'] = '';
				$_SESSION['miasto_uzytkownika'] = '';
				$_SESSION['nr_domu'] = '';
				$_SESSION['nr_lokalu'] = '';
				$_SESSION['kod_pocztowy'] = '';
				$_SESSION['miejscowosc_poczty'] = '';
				$_SESSION['email'] = '';
				$_SESSION['telefon'] = '';
				$_SESSION['avatar'] = '';
				$_SESSION['nr_karty'] = '';
				
				echo("<script>alert('Dane zostały zmienione poprawnie. Prosimy o ponowne logowanie w celu weryfikacji.'); </script>");
				echo("<script>setTimeout(function(){ window.location = '../sites/login.php'; }, 0);</script>");
				session_destroy();
				}else{
					echo("<script>alert('Podane hasła są różne! Upewnij się że hasła są poprawne.'); </script>");
					echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
		}
		}else{
			echo("<script>alert('Podane hasło jest niezgodne z obecnym. Upewnij się że wprowadzone hasło jest poprawne!'); </script>");
			echo("<script>setTimeout(function(){ window.location = '../sites/user_account.php'; }, 0);</script>");
		}
	}
	
	// Pobieranie id_usera
	$zap1 = "SELECT id_uzytkownika FROM uzytkownicy WHERE login = '".$_SESSION['login']."'";
	$sql_zam1 = mysqli_query($database, $zap1); 

	while($row = mysqli_fetch_array($sql_zam1)) {
		$id[] = $row['id_uzytkownika'];
	}
	
	// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_uzytkownika = '".$id[0]."'";
	$sql_zam2 = mysqli_query($database, $zap2); 

	while($row = mysqli_fetch_array($sql_zam2)) {
		$id_zam[] = $row['id_zamowienia'];
		$id_stat[] = $row['id_statusu'];
		$data_zam[] = $row['data_zamowienia'];
		$koszt_zam[] = $row['koszt_zamowienia'];
	}	
	
	// Pobieranie zamowien_gry
	$zap3 = "SELECT A.* FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_uzytkownika=".$id[0].")";
	$sql_zam3 = mysqli_query($database, $zap3); 

	while($row = mysqli_fetch_array($sql_zam3)) {
		$id_zam_gry[] = $row['id_gry'];
		//$platforma_zam[] = $row['platforma'];
		$kopie_zam[] = $row['ilosc_kopii'];
	}
	$length_zam = count($id_zam);
	$length_game = count($id_zam_gry);
	
	if($length_zam>=50 && $length_zam<100){
		$sql4_1 = "UPDATE `uzytkownicy` SET id_karty_lojalnosciowej='2' WHERE login='".$login."';";
		$database->query($sql4_1);
	}
	else if($length_zam>=100 && $length_zam<250){
		$sql4_1 = "UPDATE `uzytkownicy` SET id_karty_lojalnosciowej='3' WHERE login='".$login."';";
		$database->query($sql4_1);
	}
	else if($length_zam>=250 && $length_zam<500){
		$sql4_1 = "UPDATE `uzytkownicy` SET id_karty_lojalnosciowej='4'WHERE login='".$login."';";
		$database->query($sql4_1);
	}
	else if($length_zam>=500){
		$sql4_1 = "UPDATE `uzytkownicy` SET id_karty_lojalnosciowej='5' WHERE login='".$login."';";
		$database->query($sql4_1);
	}
	
	
	
	// Pobieranie platform
	$j=0;
	while($j<$length_zam){
		$zap4 = "SELECT A.platforma FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$id_zam[$j]."');";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row = mysqli_fetch_array($sql_zam4)) {
			//${"id_zam_gry$j"}[$i] = $row['id_gry'];
			${"platforma_zam$j"}[$i] = $row['platforma'];
			$i++;	
		}
		$j++;
	}
	
	
	
	// Pobieranie ilosci kopii
	$j=0;
	while($j<$length_zam){
		$zap4 = "SELECT A.ilosc_kopii FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$id_zam[$j]."');";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row = mysqli_fetch_array($sql_zam4)) {
			//${"id_zam_gry$j"}[$i] = $row['id_gry'];
			${"kopie_zam$j"}[$i] = $row['ilosc_kopii'];
			$i++;	
		}
		$j++;
	}
	
	// Pobieranie wersji
	$j=0;
	while($j<$length_zam){
		$zap4 = "SELECT A.wersja_gry FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$id_zam[$j]."');";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row = mysqli_fetch_array($sql_zam4)) {
			${"wersja_gry$j"}[$i] = $row['wersja_gry'];
			$i++;	
		}
		$j++;
	}
	
	// Pobieranie edycji
	$j=0;
	while($j<$length_zam){
		$zap4 = "SELECT A.edycje_gry FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$id_zam[$j]."');";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row = mysqli_fetch_array($sql_zam4)) {
			${"edycja_gry$j"}[$i] = $row['edycje_gry'];
			$i++;	
		}
		$j++;
	}
	
	
	$j=0;
	
	// Pobieranie gier
	while($j<$length_zam){
		$zap4 = "SELECT A.nazwa_gry FROM gry A WHERE A.id_gry in (SELECT B.id_gry FROM zamowienia_gry B WHERE B.id_zamowienia='".$id_zam[$j]."');";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row = mysqli_fetch_array($sql_zam4)) {
			${"nazwa_gry$j"}[$i] = $row['nazwa_gry'];
			$i++;	
		}
		$j++;
	}
	
	$zap5 = "SELECT A.status FROM zamowienia Z INNER JOIN uzytkownicy U ON U.id_uzytkownika = Z.id_uzytkownika INNER JOIN status_zamowienia A ON A.id_statusu = Z.id_statusu WHERE U.id_uzytkownika = '".$id[0]."' ORDER BY Z.id_zamowienia";
	
	// Pobieranie statusu
	$sql_zam5 = mysqli_query($database, $zap5); 

	while($row = mysqli_fetch_array($sql_zam5)) {
		$status_zam[] = $row['status'];
	}
	
	
	// Pobieranie wydanej kwoty
	$zap10 = "SELECT koszt_zamowienia FROM zamowienia WHERE id_uzytkownika = '".$id[0]."'";
	
	$sql_zam10 = mysqli_query($database, $zap10); 

	while($row = mysqli_fetch_array($sql_zam10)) {
		$koszt_zam[] = $row['koszt_zamowienia'];
	}
	
	$length_cost = count($koszt_zam);
	
	$c=0;
	$cost = 0;
	while($c<$length_cost){
		$cost = $cost + $koszt_zam[$c];
		$c++;
	}
	$cost_end = round($cost,2);
	
	
	
?>
</html>