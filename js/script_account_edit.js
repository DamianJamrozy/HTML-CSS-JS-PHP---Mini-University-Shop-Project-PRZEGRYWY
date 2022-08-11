
// Komunikat edytowania imienia / nazwiska
function edit_name(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <button class='button button-danger doAction'>" + $true + "</button> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				let name_id = document.getElementById('more_top_name');
				let address_id = document.getElementById('more_top_address');
				let contact_id = document.getElementById('more_top_contact');
				let scroll_to = document.getElementById('foter');
				let card_id = document.getElementById('more_top_card');
				name_id.style.display = "block";
				address_id.style.display = "none";
				contact_id.style.display = "none";
				card_id.style.display = "none";
				scroll_to.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
				
				$([document.documentElement, document.body]).animate({
					scrollTop: $("#foter").offset().top
				}, 2000);
				
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
		// Komunikat
		Confirm('Edycja profilu', 'Czy chcesz edytować Imię lub Nazwisko?', 'Tak', 'Nie');

}

// Komunikat edytowania adresu
function edit_address(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <button class='button button-danger doAction'>" + $true + "</button> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				let name_id = document.getElementById('more_top_name');
				let address_id = document.getElementById('more_top_address');
				let contact_id = document.getElementById('more_top_contact');
				let scroll_to = document.getElementById('foter');
				let card_id = document.getElementById('more_top_card');
				name_id.style.display = "none";
				address_id.style.display = "block";
				contact_id.style.display = "none";
				card_id.style.display = "none";
				scroll_to.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
				
				$([document.documentElement, document.body]).animate({
					scrollTop: $("#foter").offset().top
				}, 2000);
				
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
	   // Komunikat
	   Confirm('Edycja profilu', 'Czy chcesz edytować swój adres zamieszkania?', 'Tak', 'Nie', "#game_time"); /*change*/
}

// Komunikat edytowania kontaktu
function edit_contact(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <button class='button button-danger doAction'>" + $true + "</button> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				let name_id = document.getElementById('more_top_name');
				let address_id = document.getElementById('more_top_address');
				let contact_id = document.getElementById('more_top_contact');
				let scroll_to = document.getElementById('foter');
				let card_id = document.getElementById('more_top_card');
				name_id.style.display = "none";
				address_id.style.display = "none";
				contact_id.style.display = "block";
				card_id.style.display = "none";
				scroll_to.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
				
				$([document.documentElement, document.body]).animate({
					scrollTop: $("#foter").offset().top
				}, 2000);
				
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
	   // Komunikat
	   Confirm('Edycja profilu', 'Czy chcesz edytować dane kontaktowe?', 'Tak', 'Nie', "#game_time"); /*change*/
}

// Komunikat edytowania karty kredytowej
function edit_k_bank(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <button class='button button-danger doAction'>" + $true + "</button> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				let card_id = document.getElementById('more_top_card');
				let name_id = document.getElementById('more_top_name');
				let address_id = document.getElementById('more_top_address');
				let contact_id = document.getElementById('more_top_contact');
				let scroll_to = document.getElementById('foter');
				name_id.style.display = "none";
				address_id.style.display = "none";
				contact_id.style.display = "none";
				card_id.style.display = "block";
				scroll_to.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
				
				$([document.documentElement, document.body]).animate({
					scrollTop: $("#foter").offset().top
				}, 2000);
				
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
	   // Komunikat
	   Confirm('Edycja profilu', 'Czy chcesz edytować numer swojej karty?', 'Tak', 'Nie', "#game_time"); /*change*/
}









// Zmiana hasła 1/2
function edit_password(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <button class='button button-danger doAction'>" + $true + "</button> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				
				password();
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
	   // Komunikat
	   Confirm('Zmiana hasła!', 'Czy jesteś pewien/na że chcesz zmienić swoje hasło? Po zmianie zostaniesz wylogowany/na w celu zatwierdzenia nowego hasła.', 'Tak', 'Nie', "#game_time"); /*change*/
}

// Zmiana hasła 2/2
function password(){
	function Confirm(title, msg, $true, $false, $link) { /*change*/
			let $content =  "<div class='dialog-ovelay'>" + "<form method='POST' action='../php/edit_user.php'>" +
							"<div class='dialog'><header>" +
							 " <h3> " + title + " </h3> " +
							 "<i class='fa fa-close'></i>" +
						 "</header>" +
						 "<div class='dialog-msg'>" +
							 " <p> " + msg + " </p> " +
						 "</div>" +
						 "<footer>" +
							 "<div class='controls'>" +
								 " <input type='submit' value='Zatwierdź' name='edit_password_button' class='button button-danger doAction'>" + $true + "</form> " +
								 " <button class='button button-default cancelAction'>" + $false + "</button> " +
							 "</div>" +
						 "</footer>" +
					  "</div>" +
					"</div>";
				$('body').prepend($content);
			$('.doAction').click(function () {
				
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		$('.cancelAction, .fa-close').click(function () {
				$(this).parents('.dialog-ovelay').fadeOut(500, function () {
				$(this).remove();
				});
			});
		  
		}
	   
	   // Komunikat
	   Confirm('Zmiana hasła!', '<p style="color:white;">Wpisz Obecne Hasło <br><br> <input type="password" class="inpu" name="old_passwd" placeholder="obecne hasło"><br><br><br>Wpisz Nowe Hasło <br><br> <input type="password" class="inpu" name="new_passwd1" placeholder="Nowe Hasło"><br><br>Powtórz Hasło <br><br> <input type="password" class="inpu" name="new_passwd2" placeholder="powtórz hasło"><br></p>', '', 'Anuluj', "#game_time"); /*change*/
}

