<?php
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);

	session_start();
	$user = 'root';
	$pass = '';
	$db = 'baza_przegrywy';

	$database = new mysqli('localhost', $user, $pass, $db) or die("Nie można połączyć z bazą danych. Upewnij się że używasz php w wersji 7.0 lub nowszej.");
	
	//Sprawdzanie czy użytkownik jest zalogowany, jeżeli tak to zmiana przycisku na wyloguj
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{	
		if (isset($_POST['add_to_bucket'])){
			
			// Pobieramy dane z zamówienia
			$platforma = $_POST['Select_platform'];
			$edycja = $_POST['Select_edition'];
			$wersja = $_POST['Select_version'];
			$ilosc_kopii = $_POST['Select_count'];
			$cena = $_POST['cena_ogolna'];
			
			if($platforma=='Wybierz platformę'){
				echo('<script> 
					alert("Aby przejść dalej zaznacz wyszystkie wymagane opcje. - Brak platformy");
					javascript:history.go(-1);
					</script>');
				
			}
			else if($edycja=='Wybierz edycję'){
				echo('<script> 
					alert("Aby przejść dalej zaznacz wyszystkie wymagane opcje. - Brak edycji gry");
					javascript:history.go(-1);
					</script>');
			}
			else if($wersja=='Wybierz wersję'){
				echo('<script> 
					alert("Aby przejść dalej zaznacz wyszystkie wymagane opcje. - Brak wersji gry");
					javascript:history.go(-1);
					</script>');
			}
			else{
				$length_ses = count($_SESSION['Platforma']);
				$_SESSION['count_store'] = $length_ses;
					if($_SESSION['Platforma'][0]=='NULL'){
						$_SESSION['grafika'][0]=$_SESSION['graph'];
						$_SESSION['id_gry'][0]=$_SESSION['id_gry2'];
						$_SESSION['game'][0] = $_SESSION['gam'];
						$_SESSION['Platforma'][0]=$platforma;
						$_SESSION['Edycja'][0]=$edycja;
						$_SESSION['Wersja'][0]=$wersja;
						$_SESSION['Ilosc_kopii'][0]=$ilosc_kopii;
						$_SESSION['Cena_ogolna'][0]=$cena;
						$_SESSION['del'] [0]= "<input type='submit' name='0' value='x'><br>";
					}else{
						$_SESSION['grafika'][$length_ses]=$_SESSION['graph'];
						$_SESSION['id_gry'][$length_ses]=$_SESSION['id_gry2'];
						$_SESSION['game'][$length_ses] = $_SESSION['gam'];
						$_SESSION['Platforma'][$length_ses]=$platforma;
						$_SESSION['Edycja'][$length_ses]=$edycja;
						$_SESSION['Wersja'][$length_ses]=$wersja;
						$_SESSION['Ilosc_kopii'][$length_ses]=$ilosc_kopii;
						$_SESSION['Cena_ogolna'][$length_ses]=$cena;
						$_SESSION['del'] [$length_ses]= "<input type='submit' name='".$length_ses."' value='x'><br>";
					}
				$length_ses = count($_SESSION['Platforma']);
				$_SESSION['count_store'] = $length_ses;
	
					echo('<script> 
						if (confirm("Gra została dodana do koszyka. Czy chcesz przejść do koszyka?")) {
								window.location = "../sites/bucket.php";
						   } else {
								window.location = "../sites/brand.php";
							}
						</script>');
			}
		}	
	}
	else{
		echo('<script> 
			alert("Aby dodać zamówienie do koszyka, zaloguj się na swoje konto.");
			window.location = "../sites/login.php";
			</script>');
	}
	
   
?>