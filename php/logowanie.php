<?php
	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");

    if (isset($_POST['loguj']))
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        
        // sprawdzamy czy login i hasło są dobre
		$login = $_POST['login'];
		$haslo = $_POST['haslo'];
		$passwdr = "SELECT haslo FROM uzytkownicy WHERE login='$login'";
		$passwd = mysqli_query($database, $passwdr);
		
		
		
        if (mysqli_num_rows(mysqli_query($database,"SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".md5($haslo)."';")) > 0)
        {
			// Pobranie aktualnego czasu oraz zmiana jego formatu na Rok, miesiąc, dzień
			$t=time();
			$date = date("Y-m-d",$t);
			
			// Zapytania aktualizujące ostatnią datę logowania oraz ip urządzenia z którego użytkownik dokonał logowania
			$date_to_db = "UPDATE uzytkownicy SET data_logowania = '$date' WHERE login = '$login';";
			$ip_to_db = "UPDATE uzytkownicy SET ip_logowania = '$ip' WHERE login = '$login';";
			
			// Realizacja aktualizacji bazy danych o nową datę oraz ip
            mysqli_query($database,$date_to_db);
            mysqli_query($database,$ip_to_db);
            
			// Zmiana sesji na zalogowano
            $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $login;
			
			
			
			// Jeżeli jest admin to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$login' AND typ_konta='admin'")) > 0){
				$_SESSION['admin'] = 1;
			}
			else{
				$_SESSION['admin'] = 0;
			}
			
			// Jeżeli jest moderator to przyznaj mu dostęp do admin panelu
			if (mysqli_num_rows(mysqli_query($database,"SELECT login FROM uzytkownicy WHERE login = '$login' AND typ_konta='moderator'")) > 0){
				$_SESSION['moderator'] = 1;
			}
			else{
				$_SESSION['moderator'] = 0;
			}
			
			
				//Konto - pobieranie i przechowywanie danych
			
			
			// Pobieranie danych
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
				$names15[] = $row['typ_konta'];
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
			$_SESSION['typ_konta'] = $names15[0];
			
			
			// Pobieranie danych
			$sqlkl = mysqli_query($database, "SELECT * FROM karty_lojalnosciowe WHERE id_karty_lojalnosciowej = '$_SESSION[id_karty_lojalnosciowej]'");

			while($row = mysqli_fetch_array($sqlkl)) {
				$rabat_lojalnosciowy[] = $row['rabat_lojalnosciowy'];
				$dostawa_znizka[] = $row['dostawa_znizka'];
			}
			$_SESSION['rabat_lojalnosciowy'] = $rabat_lojalnosciowy[0];
			$_SESSION['dostawa_znizka'] = $dostawa_znizka[0];
			
			$status_log = "UPDATE uzytkownicy SET aktywnosc='1' WHERE login='$login'";
			$stat_log = mysqli_query($database, $status_log);
			
            // zalogowany
			 echo ('<script>sessionStorage.setItem("logout", logout);</script>');
			
			if($names12[0]<1){
				$sql_log = "UPDATE uzytkownicy SET ilosc_logowan='1' WHERE login='$login'";
				$res_log = mysqli_query($database, $sql_log);
				echo "<script>alert('Użytkownik pomyślnie został zalogowany.'); window.location = '../sites/reg_next.php';</script>";
			}else{
				echo "<script>alert('Użytkownik pomyślnie został zalogowany.'); window.location = '../Index.php';</script>";
			}
        }
        else echo "<script>alert('Wpisano złe dane.'); window.location = '../sites/login.php';</script>";
    }
	exit();
    
    
?>