<html>
<head>
	
	<link rel="stylesheet" href="../../style/bootstrap.min.css">
	<link rel="stylesheet" href="../../style/style.css" type="text/css" />
	<link rel="stylesheet" href="../../style/style_admin.css" type="text/css" />
	<link rel="stylesheet" href="../style/style_messenger.css" type="text/css" />
	<?php
		session_start();
		if(!isset($_SESSION['zalogowany']) || $_SESSION['admin'] != 1){
			echo ('<script>alert("Nie jesteś zalogowany. \nAby zarządzać zamówieniami, zaloguj się na swoje konto administracyjne"); window.location = "login.php";</script>');
		}
		include('../../php/edit_user.php');
		include('../../php/root.php');
		include('../../php/db_connection.php');
		$_SESSION['i']=0;
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
			<center><font size="4px">Moderatorzy:</font><br><br></center>
		
		
			<div style="width:30%; margin:0 auto;">



<table class="table table-striped table-bordered">
<thead>
<tr>
<th style='width:20px;'>ID</th>
<th style='width:150px;'>Imie</th>
<th style='width:150px;'>Nazwisko</th>
<th style='width:150px;'>Szczegóły</th>
</tr>
</thead>
<tbody>
<?php

if (isset($_GET['page_no']) && $_GET['page_no']!="") {
	$page_no = $_GET['page_no'];
	} else {
		$page_no = 1;
        }

	$total_records_per_page = 10;
    $offset = ($page_no-1) * $total_records_per_page;
	$previous_page = $page_no - 1;
	$next_page = $page_no + 1;
	$adjacents = "2"; 

	$sql_id_mod = mysqli_query($database, "SELECT COUNT(DISTINCT `id_moderatora`) FROM `uzytkownicy_messenger`;");
	while($row = mysqli_fetch_array($sql_id_mod)) {
		$count_messages2[] = $row['COUNT(DISTINCT `id_moderatora`)'];
	}

	$result_count = mysqli_query($database,"SELECT COUNT(*) As total_records FROM `wersje`");
	$total_records = mysqli_fetch_array($result_count);
	$total_records = $total_records['total_records'];
    $total_no_of_pages = ceil($total_records / $total_records_per_page);
	$second_last = $total_no_of_pages - 1; // total page minus 1

	$i=0;
    $result = mysqli_query($database,"SELECT id_uzytkownika, imie, nazwisko FROM uzytkownicy WHERE id_uzytkownika IN (SELECT id_moderatora FROM uzytkownicy_messenger ) LIMIT $offset, $total_records_per_page");
    while($row = mysqli_fetch_array($result)){
		echo "<tr>
			  <td>".$row['id_uzytkownika']."</td>
			  <td>".$row['imie']."</td>
			  <td>".$row['nazwisko']."</td>
			  <td style='padding: 0;margin: 0;'><form id='' action='admin_messenger_next.php' method='POST' style='padding: 0; margin:0;'><input type='hidden' name='id_check' value='$row[id_uzytkownika]'><input type='submit' value='Podgląd' name='podglad' style='padding: 0;width: 100%;height: 39px; background:none;'></form></td>
		   	  </tr>";
        }
		$i++;
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
		
		
		</center>
</div>


	</div>





</body>
<?php
	include('../../php/sprawdzanie_sesji.php');
	include('../../php/root.php');
?>



</html>