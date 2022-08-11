<?php
	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
		
			$login = $_SESSION['login'];

			$status_log = "UPDATE uzytkownicy SET aktywnosc='0' WHERE login='$login'";
			$stat_log = mysqli_query($database, $status_log);
			
			
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
			$platforma = $_POST['Select_platform'] = '';
			$edycja = $_POST['Select_edition'] = '';
			$wersja = $_POST['Select_version'] = '';
			$ilosc_kopii = $_POST['Select_count'] = '';
			$cena = $_POST['cena_ogolna'] = '';
			$_SESSION['count_store'] = '';
			
			
			
			session_destroy();
			
			$logout = "<script>alert('Nastąpiło wylogowanie.'); window.location = '../Index.php';</script>";
			echo ($logout);
			

    
    
?>