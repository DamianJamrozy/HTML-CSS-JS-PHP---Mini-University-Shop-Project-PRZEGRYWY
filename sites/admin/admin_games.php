<html>
<head>
	
	<link rel="stylesheet" href="../../style/bootstrap.min.css">
	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_admin.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany. \nAby zarządzać zamówieniami, zaloguj się na swoje konto administracyjne"); window.location = "login.php";</script>');
		}
		include('../../php/edit_user.php');
		include('../../php/root.php');
		
		
	?>

<style>
	.table-striped{
	}
	table{
		color:white;
	}
	.table{
		color:white;
		
	}
	.table-striped>tbody>tr:nth-of-type(odd){
		background: linear-gradient(0deg,rgba(0,0,0,0.3),rgba(0,0,0,0.3));
	}
</style>

	

</head>
<body style="overflow:hidden; color:white;">
	
		<center><font size="6px">PANEL ADMINISTRACYJNY</font><br><br></center>
		<br>
		
		<div id="container">
			<center><font size="4px">Gry:</font><br><br></center>
		
		
			<div style="width:80%; margin:0 auto;">



<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:25px;'>ID</th>
<th>Okładka</th>
<th style='width:300px;'>Nazwa gry</th>
<th>Pegi</th>
<th style='width:600px;'>Opis gry</th>
<th style='width:50px;'>Nazwa wydawcy</th>
<th style='width:80px;'>Nazwa studia</th>
<th style='width:80px;'>Rok wydania</th>
<th>Czas przejścia</th>
<th>Ilość sprzedanych kopii</th>
<th>Platforma</th>
<th style='width:90px;'>Koszt</th>
<th style='width:35px;'>Ilość Kopii</th>
</tr>
</thead>
<tbody>
<?php
if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 5;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$result_count = mysqli_query($database,"SELECT COUNT(*) As total_records FROM `gry`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1


		
		
		
		
		// Pobieranie zamowien
	$zap2 = "SELECT * FROM gry LIMIT $offset, $total_records_per_page";
	$sql_zam2 = mysqli_query($database, $zap2); 

	
	while($row = mysqli_fetch_array($sql_zam2)) {
		$i=$_SESSION['i'];
		echo ("<tr>
			   <td>".$row['id_gry']."</td>
			   <td>");
			unset($game_id_table);
			$id_gry=$row['id_gry'];
		
		
		$result = $database->query("SELECT grafika FROM gry WHERE id_gry='$id_gry'"); 
				 
		if($result->num_rows > 0){ 
			while($rowo1 = $result->fetch_assoc()){
				print_r("<img class='game_inside' src='data:image/jpg;charset=utf8;base64," .base64_encode($rowo1['grafika'])."' style='height: 150;'></td><td>"); 
			}
		}

			   
			// Pobieranie gier
			$zap4 = "SELECT nazwa_gry FROM gry A WHERE id_gry='$id_gry';";
			$sql_zam4 = mysqli_query($database, $zap4); 
			while($row2 = mysqli_fetch_array($sql_zam4)) {	
				echo($row2['nazwa_gry']."<br><br>");
			}

	echo("</td>");
	
	// Pobieranie PEGI
	$result = $database->query("SELECT id_pegi FROM gry WHERE id_gry='$id_gry'"); 
				 
		if($result->num_rows > 0){ 
			while($rowo1 = $result->fetch_assoc()){
				$pegi = $rowo1['id_pegi'];
			}
		}
	echo("<script>console.log('".$pegi."')</script>");
	
	$result2 = $database->query("SELECT grafika FROM pegi WHERE id_pegi='$pegi'"); 
				 
		if($result2->num_rows > 0){ 
			while($rowo2 = $result2->fetch_assoc()){
				print_r("<td><br><img class='game_inside' src='data:image/jpg;charset=utf8;base64," .base64_encode($rowo2['grafika'])."' style='height: 100;'></td>"); 
			}
		}
	
	echo("<td>".$row['opis_gry']."</td>");
	
	
	// Pobieranie wydawcy
	echo("<td>");
	$zapx4 = "SELECT A.nazwa_wydawcy FROM wydawca A WHERE A.id_wydawcy in (SELECT B.id_wydawcy FROM gry B WHERE B.id_gry='$id_gry')";
		$sql_zamx4 = mysqli_query($database, $zapx4); 
		while($row3 = mysqli_fetch_array($sql_zamx4)) {
			echo($row3['nazwa_wydawcy']."<br><br>");
		}
	echo("</td>");
	
	
	
	// Pobieranie studia
	echo("<td>");
	 $i=0;
	   $zapxx4 = "SELECT id_studia FROM studia_gry WHERE id_gry='".$id_gry."' ORDER BY id_gry;";
		$sql_zamxx4 = mysqli_query($database, $zapxx4); 
		while($rowx3 = mysqli_fetch_array($sql_zamxx4)) {
			$game_id_studia[]=$rowx3['id_studia'];
			$i++;
			
		}
			   
			   
			   $it = 0;
			   
		while($it<$i){
			// Pobieranie gier
			$zap4 = "SELECT nazwa_studia FROM studia WHERE id_studia=$game_id_studia[$it];";
			$sql_zam4 = mysqli_query($database, $zap4); 
			while($row2 = mysqli_fetch_array($sql_zam4)) {	
				echo($row2['nazwa_studia']."<br><br>");
			}
			$it++;
		}  
	
	
	
	echo("</td>");
	
	
	echo("<td>".$row['rok_wydania']."</td>");
	echo("<td>".$row['czas_przejscia']." h</td>");
	echo("<td>".$row['ilosc_sprzedanych']." sztuk</td>");
	
	
	
	
	
	// Pobieranie platform

		echo("<td>");
		$zapx4 = "SELECT A.typ_platformy FROM platformy A WHERE A.id_platformy in (SELECT B.id_platformy FROM platformy_gry B WHERE B.id_gry='$id_gry') ORDER BY A.id_platformy";
		$sql_zamx4 = mysqli_query($database, $zapx4); 
		while($row3 = mysqli_fetch_array($sql_zamx4)) {
			echo($row3['typ_platformy']."<br><br>");
		}

	echo("</td>");
	
	
	// Pobieranie ilosci kopii
			echo("<td>");	
			$zap4 = "SELECT cena FROM platformy_gry WHERE id_gry='$id_gry' ORDER BY id_platformy";
			$sql_zam4 = mysqli_query($database, $zap4); 
			$i=0;
			while($row4 = mysqli_fetch_array($sql_zam4)) {	
				echo($row4['cena']." PLN<br><br>");
			}
			echo("</td>");
	
	
	 echo("<td>");	
				
		// Pobieranie ilosci kopii

			$zap4 = "SELECT ilosc_sztuk FROM platformy_gry WHERE id_gry='$id_gry' ORDER BY id_platformy";
			$sql_zam4 = mysqli_query($database, $zap4); 
			$i=0;
			while($row4 = mysqli_fetch_array($sql_zam4)) {	
				echo($row4['ilosc_sztuk']."<br><br>");
			}
			echo("</td>");	
	
		
			  
	}
		
	mysqli_close($database);
    ?>
</tbody>
</table>

<div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
<strong>Strona <?php echo $page_no." z ".$total_no_of_pages; ?></strong>
</div>
<center>
<ul class="pagination">
	<?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>
    
	<li <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no > 1){ echo "href='?page_no=$previous_page'"; } ?>>Poprzednia</a>
	</li>
       
    <?php 
	if ($total_no_of_pages <= 10){  	 
		for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
	}
	elseif($total_no_of_pages > 10){
		
	if($page_no <= 4) {			
	 for ($counter = 1; $counter < 8; $counter++){		 
			if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}
        }
		echo "<li><a>...</a></li>";
		echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
		echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
		}

	 elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
		echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";
        for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
           if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                  
       }
       echo "<li><a>...</a></li>";
	   echo "<li><a href='?page_no=$second_last'>$second_last</a></li>";
	   echo "<li><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
            }
		
		else {
        echo "<li><a href='?page_no=1'>1</a></li>";
		echo "<li><a href='?page_no=2'>2</a></li>";
        echo "<li><a>...</a></li>";

        for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
          if ($counter == $page_no) {
		   echo "<li class='active'><a>$counter</a></li>";	
				}else{
           echo "<li><a href='?page_no=$counter'>$counter</a></li>";
				}                   
                }
            }
	}
?>
    
	<li <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
	<a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page'"; } ?>>Następna</a>
	</li>
    <?php if($page_no < $total_no_of_pages){
		echo "<li><a href='?page_no=$total_no_of_pages'>Ostatnia &rsaquo;&rsaquo;</a></li>";
		} ?>
</ul>
		
		
		
		</div>
		
		
		
		
		<br><br><br>
		
		
		<div id="foter" style="margin:0; padding:0;">
		<center>
		<p id="fast">Szybkie linki:</p><br>
		<a href="#">O projekcie</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://damianjamrozy.000webhostapp.com/index.php/rodo/">RODO</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="https://github.com/UR-INF/20-21-ai-projekt-projekt-ai-jamrozy-iwanczyk" target="_blank">Dokumentacja</a>
		<br><br><br><br><br>
		@2020 <a href="https://damianjamrozy.000webhostapp.com/">Damian Jamroży</a> & Rafał Iwańczyk. <a href="LICENSE.pdf">Wszelkie prawa zastrzeżone.</a>
		</center>
</div>
		
		</center>
</div>


	</div>





</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
	include('../../php/root.php');
?>



</html>