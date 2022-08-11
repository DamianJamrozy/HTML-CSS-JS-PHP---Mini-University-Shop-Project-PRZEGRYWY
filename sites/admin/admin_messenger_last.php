<html>
<head>
	<title>Prze-gry.wy</title>
	<link rel="Shortcut icon" href="../../img/icons/icon.ico" />

	<meta http-equiv="content-type" content="text/php"; charset="UTF-8"/> 
	<meta name="keywords" content="firma,Damian Jamroży, Rafał Iwańczyk, prze-gry, prze-gry.wy, gry, zakupy internetowe, web designer,">
	<meta name="description" content="Prze-gry.wy to firma założona przez 2 osoby o ogromnej pasji do gier cyfrowych. U nas znajdziesz najlepsze tytuły w najlepszych cenach!">
	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany na konto moderatora. \nAby zarządzać zamówieniami, zaloguj się na swoje konto moderatorskie"); window.location = "../login.php";</script>');
		}
		include('../../php/db_connection.php');
	?>
</head>
<body>
	
	
	<div class="content_messenger_full" style="padding-left:10%;">
	<?php
		
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);
	session_start();
	
	$id_user_mod = $_POST['id_check'];
		
		
		$j=0;
		
		$sql_id_mod = mysqli_query($database, "SELECT * FROM uzytkownicy WHERE id_uzytkownika='$id_user_mod'");

		while($row = mysqli_fetch_array($sql_id_mod)) {
			$imie_user_mod = $row['imie'];
			$nazwisko_user_mod = $row['nazwisko'];
		}
		
		if(isset($imie_user_mod)){
			echo($id_user_mod.". ".$imie_user_mod." ".$nazwisko_user_mod);
		}else{
			echo("Brak nowych wiadomości.");
		}
		

		$messenger= mysqli_query($database,"SELECT * FROM messenger WHERE id_wiadomosci IN (SELECT id_wiadomosci FROM uzytkownicy_messenger WHERE id_uzytkownika = $id_user_mod)");
	
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
			if(($id_statusu_wiadomosci[$i]==1 || $id_statusu_wiadomosci[$i]==2) && ($id_statusu_wiadomosci[$i-1]==3 || $id_statusu_wiadomosci[$i-1]==4)){
				echo("<div class='messenger_end'><center>------------------Temat Zamknięty------------------</center><span style='float:right;font-size:70%;'></span></div>");
			}
			if($id_statusu_wiadomosci[$i]==1){
				echo("<div class='messenger_me'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			else if($id_statusu_wiadomosci[$i]==2){
				echo("<div class='messenger_you'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			else if($id_statusu_wiadomosci[$i]==3){
				echo("<div class='messenger_me'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			else if($id_statusu_wiadomosci[$i]==4){
				echo("<div class='messenger_you'>".$tresc[$i]."<br><br><span style='float:right;font-size:70%;'>".$data[$i]." ".$godzina[$i]."</span></div>");
			}
			$i++;
		}
		
		$i=0;
		$continuation = FALSE;
		while($i<$length_messenger){
			if($id_statusu_wiadomosci[$i]==1 || $id_statusu_wiadomosci[$i]==2){
				$continuation = TRUE;
			}
			$i++;
		}
		if($continuation == FALSE){
			echo("<div class='messenger_end'><center>------------------Temat Zamknięty------------------</center><span style='float:right;font-size:70%;'></span></div>");
		}
		
	}else{
		echo("<div class='messenger_you'>Nie ma wiadomości! To pewnie jakiś błąd, we no to napraw plis bo mi się już nie chce.</div>");
	}
?>
		
		
	</div>
	
	

</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
?>

<script>
	let messenger_bubble_up = document.getElementById("messenger_bubble_up");
	function Show_bubble_text(){
		messenger_bubble_up.style.display = "block";
	}
	function Hide_bubble_text(){
		messenger_bubble_up.style.display = "none";
	}
</script>

</html>