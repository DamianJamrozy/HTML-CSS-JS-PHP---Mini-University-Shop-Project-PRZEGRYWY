<?php
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);

	$id = $_GET['form'];
	$_SESSION['id_gry2'] = '';
	$_SESSION['id_gry2'] = $id;

	// Database info
    $db_host     = "localhost";
    $db_username = "root";
    $db_password = "";

    // Połączenie
    $connection = mysqli_connect($db_host, $db_username, $db_password) or die("Error " . mysqli_error());

    // Wybranie odpowiedniej tabeli w bazie
    $db = mysqli_select_db($connection, "baza_przegrywy") or die("Error " . mysqli_error());
	
	
		// Zapytanie nr. 1 -> Rozwijana lista platform 
		
		
	// Zapytanie o wybranie platformy
	$sql1 = ("SELECT A.typ_platformy FROM platformy A WHERE A.id_platformy in (SELECT B.id_platformy FROM platformy_gry B WHERE B.id_gry=".$id.");");
	//echo($sql1);
	$sql = mysqli_query($connection, $sql1);

	// Dodawanie rekordów z bazy do listy
	
	while($row = mysqli_fetch_array($sql)) {
		$names1[] = $row['typ_platformy'];
	}
	
	// Ilość pobranych elementów
	$length1 = count($names1);
	
	// Iterator
	$i = 0;
	
	
		
		// Zapytanie nr. 2 -> Rozwijana lista edycji 
		
	
	// Zapytanie o wybranie edycji
	$sql3 = ("SELECT A.typ_edycji FROM edycje A WHERE A.id_edycji in (SELECT B.id_edycji FROM edycje_gry B WHERE B.id_gry=".$id.");");
	//echo($sql1);
	$sql = mysqli_query($connection, $sql3);

	// Dodawanie rekordów z bazy do listy
	
	while($row = mysqli_fetch_array($sql)) {
		$names3[] = $row['typ_edycji'];
	}
	
	// Ilość pobranych elementów
	$length3 = count($names3);
	
	// Iterator
	$i = 0;
	
	
		// Zapytanie nr. 3 -> Rozwijana lista platform 
		
	
	// Zapytanie o wybranie wersji
	$sql4 = ("SELECT A.typ_wersji FROM wersje A WHERE A.id_wersji in (SELECT B.id_wersji FROM wersje_gry B WHERE B.id_gry=".$id.");");
	//echo($sql1);
	$sql = mysqli_query($connection, $sql4);

	// Dodawanie rekordów z bazy do listy
	
	while($row = mysqli_fetch_array($sql)) {
		$names4[] = $row['typ_wersji'];
	}
	
	// Ilość pobranych elementów
	$length4 = count($names4);
	
	// Iterator
	$i = 0;
	
	
		
	
	
	
	
		// Zapytanie nr. 4 -> Podstawowe dane o grze
	
	
	// Pobieramy dane z encji gry
	$sqlg3 = mysqli_query($connection, "SELECT * FROM gry WHERE id_gry = '".$id."'");

			while($row = mysqli_fetch_array($sqlg3)) {
				$names1g[] = $row['nazwa_gry'];
				$names2g[] = $row['opis_gry'];
				$names3g[] = $row['rok_wydania'];
				$names4g[] = $row['czas_przejscia'];
				$names7g[] = $row['id_pegi'];
				$names9g[] = $row['id_wydawcy'];
				$names11g[] = $row['id_gatunku'];
				$names16g[] = $row['id_dostepnosci'];
				$names20g[] = $row['grafika'];
			}
	
	$_SESSION['graph'] = $names20g[0];
	$_SESSION['gam'] = $names1g[0];
	
	// Pobieramy dane z tabeli łączącej platformy
	$sqlg4 = mysqli_query($connection, "SELECT * FROM platformy_gry WHERE id_gry = '".$id."'");

			while($row = mysqli_fetch_array($sqlg4)) {
				$names5g[] = $row['cena'];
				$names6g[] = $row['ilosc_sztuk'];
			}
			
	// Ilość pobranych elementów
	$length5 = count($names6g);
	
	
	// Pobieramy dane z encji pegi
	$sqlg5 = mysqli_query($connection, "SELECT url FROM pegi WHERE id_pegi = '".$names7g[0]."'");

			while($row = mysqli_fetch_array($sqlg5)) {
				$names8g[] = $row['url'];
			}
			
	// Pobieramy dane z encji wydawca
	$sqlg6 = mysqli_query($connection, "SELECT nazwa_wydawcy FROM wydawca WHERE id_wydawcy = '".$names9g[0]."'");

			while($row = mysqli_fetch_array($sqlg6)) {
				$names10g[] = $row['nazwa_wydawcy'];
			}
			
	// Pobieramy dane z encji wydawca
	$sqlg7 = mysqli_query($connection, "SELECT nazwa_gatunku FROM gatunki WHERE id_gatunku = '".$names11g[0]."'");

			while($row = mysqli_fetch_array($sqlg7)) {
				$names12g[] = $row['nazwa_gatunku'];
			}
	
	// Pobieramy dane z tabeli dostępność
	$sqlg16 = mysqli_query($connection, "SELECT status_dostepnosci FROM dostepnosc WHERE id_dostepnosci = '".$names16g[0]."'");

			while($row = mysqli_fetch_array($sqlg16)) {
				$names17[] = $row['status_dostepnosci'];
			}
	
	
	// Wyświetlanie listy ilości gier pc
	$sqlg13 = mysqli_query($connection, "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy = 1");

	while($row = mysqli_fetch_array($sqlg13)) {
		$names13g[] = $row['ilosc_sztuk'];
	}
	$g1 = $names13g[0];
	
	// Wyświetlanie listy ilości gier xbox
	$sqlg14 = mysqli_query($connection, "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy = 2");

	while($row = mysqli_fetch_array($sqlg14)) {
		$names14g[] = $row['ilosc_sztuk'];
	}
	$g2 = $names14g[0];
	
	// Wyświetlanie listy ilości gier pc
	$sqlg15 = mysqli_query($connection, "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy = 3");

	while($row = mysqli_fetch_array($sqlg15)) {
		$names15g[] = $row['ilosc_sztuk'];
	}
	$g3 = $names15g[0];
	
	
	// Pobieramy ceny z wybranych konsol
	$sqlc1 = mysqli_query($connection, "SELECT cena FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy=1");

			while($row = mysqli_fetch_array($sqlc1)) {
				$c1[] = $row['cena'];
			}
	// Pobieramy dane z tabeli łączącej platformy
	$sqlc2 = mysqli_query($connection, "SELECT cena FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy=2");

			while($row = mysqli_fetch_array($sqlc2)) {
				$c2[] = $row['cena'];
			}
	// Pobieramy dane z tabeli łączącej platformy
	$sqlc3 = mysqli_query($connection, "SELECT cena FROM platformy_gry WHERE id_gry = '".$id."' AND id_platformy=3");

			while($row = mysqli_fetch_array($sqlc3)) {
				$c3[] = $row['cena'];
			}
	
	
	
	
		// Zapytanie nr. 5 -> Wypisanie studiów odpowiedzialnych za stworzenie gry
		
	
	// Zapytanie o wybranie studia
	$sql5 = ("SELECT A.nazwa_studia FROM studia A WHERE A.id_studia in (SELECT B.id_studia FROM studia_gry B WHERE B.id_gry=".$id.");");
	//echo($sql1);
	$sql = mysqli_query($connection, $sql5);

	// Dodawanie rekordów z bazy do listy
	
	while($row = mysqli_fetch_array($sql)) {
		$names5[] = $row['nazwa_studia'];
	}
	
	// Ilość pobranych elementów
	$length5 = count($names5);
	
	// Iterator
	$i = 0;
	
	
	
			// Zapytanie nr. 6 -> Wypisanie studiów odpowiedzialnych za stworzenie gry
		
	
	// Zapytanie o wybranie studia
	$sql6 = ("SELECT A.tryb_rozgrywki FROM tryb_gry A WHERE A.id_trybu_gry in (SELECT B.id_trybu_gry FROM tryb_gry_gra B WHERE B.id_gry=".$id.");");
	//echo($sql1);
	$sql = mysqli_query($connection, $sql6);

	// Dodawanie rekordów z bazy do listy
	
	while($row = mysqli_fetch_array($sql)) {
		$names6[] = $row['tryb_rozgrywki'];
	}
	
	// Ilość pobranych elementów
	$length6 = count($names6);
	
	// Iterator
	$i = 0;
	

	
	
?>