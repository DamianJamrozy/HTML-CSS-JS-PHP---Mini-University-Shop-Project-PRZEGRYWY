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
			<center><font size="4px">Zamówienia - CD-KEY:</font><br><br></center>
		
		
			<div style="width:75%; margin:0 auto;">



<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:50px;'>ID</th>
<th style='width:300px;'>Produkty</th>
<th style='width:150px;'>Platforma</th>
<th style='width:150px;'>Ilość Kopii</th>
<th style='width:150px;'>Edycja</th>
<th style='width:150px;'>Email</th>
<th style='width:150px;'>Koszt</th>
<th style='width:150px;'>Data Zamówienia</th>
<th style='width:150px;'>Status</th>
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

	$result_count = mysqli_query($database,"SELECT COUNT(*) As total_records FROM `zamowienia` WHERE id_dostawy=1 AND id_statusu=1 OR id_dostawy=1 AND id_statusu=2 OR id_dostawy=1 AND id_statusu=3 OR id_dostawy=1 AND id_statusu=4 ");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1


		
		
		
		
		// Pobieranie zamowien
	$zap2 = "SELECT * FROM zamowienia WHERE id_dostawy=1 AND id_statusu=1 OR id_dostawy=1 AND id_statusu=2 OR id_dostawy=1 AND id_statusu=3 OR id_dostawy=1 AND id_statusu=4 LIMIT $offset, $total_records_per_page";
	$sql_zam2 = mysqli_query($database, $zap2); 

	
	while($row = mysqli_fetch_array($sql_zam2)) {
		$i=$_SESSION['i'];
		echo ("<tr>
			   <td>".$row['id_zamowienia']."</td>
			   <td>");
			unset($game_id_table);
				
	   $i=0;
	   $zapxx4 = "SELECT id_gry FROM zamowienia_gry WHERE id_zamowienia='".$row['id_zamowienia']."' ORDER BY id_zamowienia_gry;";
		$sql_zamxx4 = mysqli_query($database, $zapxx4); 
		while($rowx3 = mysqli_fetch_array($sql_zamxx4)) {
			$game_id_table[]=$rowx3['id_gry'];
			$i++;
			
		}
			   
			   
			   $it = 0;
			   
		while($it<$i){
			// Pobieranie gier
			$zap4 = "SELECT A.nazwa_gry FROM gry A WHERE A.id_gry=$game_id_table[$it];";
			$sql_zam4 = mysqli_query($database, $zap4); 
			while($row2 = mysqli_fetch_array($sql_zam4)) {	
				echo($row2['nazwa_gry']."<br><br>");
			}
			$it++;
		}  
		
	   
	echo("</td>");
	echo("<td>");
	
	
	
	// Pobieranie platform

		$zapx4 = "SELECT A.platforma FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
		$sql_zamx4 = mysqli_query($database, $zapx4); 
		while($row3 = mysqli_fetch_array($sql_zamx4)) {
			echo($row3['platforma']."<br><br>");
		}

	echo("</td>");
	
	 echo("<td>");	
				
		// Pobieranie ilosci kopii

			$zap4 = "SELECT A.ilosc_kopii FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
			$sql_zam4 = mysqli_query($database, $zap4); 
			$i=0;
			while($row4 = mysqli_fetch_array($sql_zam4)) {	
				echo($row4['ilosc_kopii']."<br><br>");
			}


			echo("</td>");	
	
	echo("<td>");	
		
		// Pobieranie edycji

		$zap4 = "SELECT A.edycje_gry FROM zamowienia_gry A WHERE A.id_zamowienia in (SELECT B.id_zamowienia FROM zamowienia B WHERE B.id_zamowienia='".$row['id_zamowienia']."') ORDER BY A.id_zamowienia_gry;";
		$sql_zam4 = mysqli_query($database, $zap4); 
		$i=0;
		while($row5 = mysqli_fetch_array($sql_zam4)) {	
			echo($row5['edycje_gry']."<br><br>");
		}


			 echo("</td>");	
			
				
			   echo ("<td>".$row['email']."</td>
			   <td>".$row['koszt_zamowienia']." PLN</td>
			   <td>".$row['data_zamowienia']."</td>
		   	   ");
			   // Status zamówienia
				$zap5 = "SELECT A.status FROM zamowienia Z INNER JOIN status_zamowienia A ON A.id_statusu = Z.id_statusu WHERE Z.id_zamowienia='".$row['id_zamowienia']."' ORDER BY Z.id_zamowienia";
	
				// Pobieranie statusu
				$sql_zam5 = mysqli_query($database, $zap5); 

				while($row = mysqli_fetch_array($sql_zam5)) {
					echo ("<td>".$row['status']."</td>");
				}
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
		
		<center><br><br><br><br><br><br><br><br>
		<h2>System zarządzania bazą</h2><br><br>
		<br><br><br>
			<div class="left">
			&nbsp;
			</div>
			<div class="center">
			<form method="POST" action="../../php/root.php">
				
				<h3>Edytuj status zamówienia:</h3><br>
				<select class="select" id="get_val select_name" name="Select_id_stat" required>  
						<option>Wybierz id zamówienia</option>  
						<?php 
							$i = 0;
							while($length_zamX!=$i){
								print_r("<option>".$id_zamX[$i]."</option>  "); 
								$i++;
							}
						?>
					</select><br><br>
					
					<select class="select" id="get_val" name="Select_stat" required>  
						<option>Wybierz status zamówienia</option>  
						<?php 
							$i = 0;
							while($length_stat!=$i){
								if($i!=2 && $i!=3 && $i!=6){
								print_r("<option>".$stat_all[$i]."</option>  "); 
								}
								$i++;
							}
						?>
					</select><br><br>
					
				<input type="submit" value="Edytuj" class="btn_buy" name="edit_status">
				
				
			</form><br><br><br><br>
		</div>
		
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