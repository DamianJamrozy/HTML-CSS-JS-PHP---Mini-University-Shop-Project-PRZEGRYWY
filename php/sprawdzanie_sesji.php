<?php
	
	// Ukrywanie błędu (brak zmiennej login)
	error_reporting(0);
	ini_set('display_errors', 0);
	

	//Sprawdzanie czy użytkownik jest zalogowany, jeżeli tak to zmiana przycisku na wyloguj
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		echo('<script> 
			let x = document.getElementById("Login");
			let y = document.getElementById("Logout");
			let q = document.getElementById("client_panel");
			
			x.style.display = "none";
			y.style.display = "block";
			q.style.display = "block";
			</script>');
		if($_SESSION['typ_konta']=='user'){
			echo('<script>let bubble = document.getElementById("messenger_bubble");
				bubble.style.display = "block";</script>');
		}else if($_SESSION['typ_konta']=='moderator'){
			echo('<script>let moderator_panel = document.getElementById("moderator_panel");
				moderator_panel.style.display = "block";</script>');
		}
		//echo('<script>alert("Sesja działa");</script>');
	}
	else{
		echo('<script> 
			let x = document.getElementById("Login");
			let y = document.getElementById("Logout");
			let q = document.getElementById("client_panel");
			let bubble = document.getElementById("messenger_bubble");
			x.style.display = "block";
			y.style.display = "none";
			q.style.display = "none";
			bubble.style.display = "none";
			</script>');
		//echo('<script>alert("Sesja wyłączona");</script>');
	}
	
	//Zabezpieczenie admin panelu
	if ($_SESSION['admin'] == 1){
		echo('<script> 
			let z = document.getElementById("admin_panel");
			z.style.display = "block";
			</script>');
	}
	else{
		echo('<script> 
			let z = document.getElementById("admin_panel");
			z.style.display = "none";
			</script>');
	}
	
	
	
?>