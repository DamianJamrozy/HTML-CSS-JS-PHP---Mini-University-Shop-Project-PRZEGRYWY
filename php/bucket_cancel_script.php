<?php
	// Ukrywanie błędu (brak zmiennej login)
	//error_reporting(0);
	//ini_set('display_errors', 0);

	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
	
	//Sprawdzanie czy użytkownik jest zalogowany, jeżeli tak to zmiana przycisku na wyloguj
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true)){	
		$i=0;
		while($i<=$_SESSION['count_store']){
			if (isset($_POST[$i])){
				print_r('wchodzę');
				$_SESSION['id_gry'] = from_array_del($_SESSION['id_gry'], $i);
				$_SESSION['game'] = from_array_del($_SESSION['game'], $i);
				$_SESSION['grafika'] = from_array_del($_SESSION['grafika'], $i);
				$_SESSION['Platforma'] = from_array_del($_SESSION['Platforma'], $i);
				$_SESSION['Edycja'] = from_array_del($_SESSION['Edycja'], $i);
				$_SESSION['Wersja'] = from_array_del($_SESSION['Wersja'], $i);
				$_SESSION['Ilosc_kopii'] = from_array_del($_SESSION['Ilosc_kopii'], $i);
				$_SESSION['Cena_ogolna'] = from_array_del($_SESSION['Cena_ogolna'], $i);
				$_SESSION['del'] = from_array_del($_SESSION['del'], $i);
				$_SESSION['count_store'] = count($_SESSION['id_gry']);
				$j=$i;
				while($j<=$_SESSION['count_store']){
					$_SESSION['del'][$j]="<input type='submit' name='".$j."' value='x'><br>";
					$j++;
				}
				
			}
			$i++;
			
		}echo('<script> window.location = "../sites/bucket.php"; </script>');
	}
	
	function from_array_del($nazwa, $element){
		unset($nazwa[$element]);
		return array_values($nazwa);
	}
   
?>