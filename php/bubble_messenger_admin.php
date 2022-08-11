<html>
<head>
<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
</head>
<body>
<?php
	include('db_connection.php');
		
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);
	session_start();
	
	if (isset($_POST['send'])){
		session_start();
		$login = $_SESSION['login'];
		$wiadomosc = $_POST['tresc'];
		$wiadomosc = nl2br($wiadomosc);
		//echo($wiadomosc);
		$t=time();
		$date = date("Y-m-d",$t);
		$czas=date("H:i:s");
		
		// Pozyskiwanie id_usera
		$sql_login_to_id = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE login='$login'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_user = $row['id_uzytkownika'];
		}
		
		// Pozyskiwanie id moderatora
		$sql_id_mod = mysqli_query($database, "SELECT id_uzytkownika FROM uzytkownicy WHERE typ_konta='moderator'");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$id_moderator[] = $row['id_uzytkownika'];
		}
		$length_moderator = count($id_moderator);
		
		
		// Pozyskiwanie ilości wiadomości danego moderatora
		$i=0;
		while($i<$length_moderator){
			$sql_id_mod = mysqli_query($database, "SELECT COUNT(DISTINCT `id_uzytkownika`) FROM `uzytkownicy_messenger` WHERE `id_moderatora`='$id_moderator[$i]';");
			while($row = mysqli_fetch_array($sql_id_mod)) {
				$count_messages[] = $row['COUNT(DISTINCT `id_uzytkownika`)'];
			}
			$i++;
		}
		
		$i=0;
		while($i<$length_moderator){
			if($count_messages[$i]<5){
				$sql2 = "INSERT INTO `messenger`(`id_wiadomosci`, `tresc`, `data`, `godzina`, `id_statusu_wiadomosci`) VALUES ('NULL','$wiadomosc','$date','$czas','1')";

				if ($database->query($sql2) === TRUE) {
				  //echo("<script>history.back()</script>");
				  echo("");
				} else {
				  echo "Error: " . $sql2 . "<br>" . $database->error;
				}
				
				
				$sql_id_mess = mysqli_query($database, "SELECT id_wiadomosci FROM messenger WHERE tresc='$wiadomosc' ORDER BY id_wiadomosci");

				while($row = mysqli_fetch_array($sql_id_mess)) {
					$id_wiadomosci = $row['id_wiadomosci'];
				}
						
				
				$sql3 = "INSERT INTO `uzytkownicy_messenger`(`id_uzytkownicy_messenger`, `id_uzytkownika`, `id_moderatora`, `id_wiadomosci`) VALUES ('NULL','$id_user','$id_moderator[$i]','$id_wiadomosci')";

				if ($database->query($sql3) === TRUE) {
				  echo("<script>history.back()</script>");
				} else {
				  echo "Error: " . $sql3 . "<br>" . $database->error;
				}
				break;
			}
			$i++;
		}
		
	}
		
		
	$login = $_SESSION['login'];

	$sql_login_to_id = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE login='$login'");

		while($row = mysqli_fetch_array($sql_login_to_id)) {
			$id_user = $row['id_uzytkownika'];
		}
		
	$messenger= mysqli_query($database,"SELECT A.* FROM messenger A WHERE A.id_wiadomosci in (SELECT B.id_wiadomosci FROM uzytkownicy_messenger B WHERE B.id_uzytkownika='$id_user')");
	
	 $cnt = mysqli_num_rows($messenger);
	 if ($cnt != 0){
		while($row = mysqli_fetch_array($messenger)) {
			$tresc[] = $row['tresc'];
			$data[] = $row['data'];
			$godzina[] = $row['godzina'];
			$id_statusu_wiadomosci[] = $row['id_statusu_wiadomosci'];
		}
	
		$length_messenger = count($tresc);
		
	
		$i=0;
		while($i<$length_messenger){
			if($id_statusu_wiadomosci[$i]==1){
				echo("<div class='messenger_me'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			else if($id_statusu_wiadomosci[$i]==2){
				echo("<div class='messenger_you'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			$i++;
		}
	}else{
		echo("<div class='messenger_you'>Potrzebujesz pomocy?<br>Skorzystaj z instant czatu pomijając czas oczekiwania odpowiedzi na maila!</div>");
	}
	
	
	
	
	
	
    
?>
</body>
</html>
