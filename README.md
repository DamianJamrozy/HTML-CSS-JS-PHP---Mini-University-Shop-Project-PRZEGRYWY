# Projekt zaliczeniowy z przedmiotu: _**Aplikacje internetowe**_

# Temat projektu: Internetowy Sklep z Grami.
## Skład grupy:  Damian Jamroży & Rafał Iwańczyk
## Specyfikacja projektu
### Cel projektu : Utworzenie pseudo sklepu internetowego z grami cyfrowymi.
#### Cele szczegółowe:
   1. Symulacja sklepu internetowego.
   2. Symulacja koszyka sklepu internetowego.
   3. Symulacja metod płatności.
   4. Symulacja zakupów z wykorzystaniem kodów rabatowych
   5. Administracja dostępnymi danymi w bazie danych.
   6. Administracja symulowanych zakupów.
   7. Utworzenie wydajnego komunikatora pomiędzy użytkownikiem a moderatorem sklepu.


### Funkcjonalności:
   1. Rejestracja nowych użytkowników.
   2. Logowanie do kont administracyjnych, moderacyjnych oraz zwykłych użytkowników.
   3. Edycja informacji dotyczących użytkowników.
   4. Wirtualny koszyk przetrzymujący informacje o obecnym zamówieniu.
   5. Funkcjonalności CRUD.
   6. Obsługa wirtualnych metod płatności.
   7. Składanie wirtualnych zamówień.
   8. Wyświetlanie mini statystyk strony (tj. ilość użytkowników oraz ilość złożonych zamówień).
   9. Wyświetlanie rozbudowanych danych statystycznych dostępnych jedynie dla administratorów, wyświetlanych w postaci boxów oraz wykresów. Przedstawiają one statystyki dotyczące zarobków za dany miesiąc/rok oraz ilość nowych oraz obecnych użytkowników.
   10. Wybór avatarów profilu.
   11. Wczytywanie dynamicznie budowanych stron opartych na skryptach PHP.
   12. Instant czat z moderacją w stylu messengera.



### Interfejs serwisu

   <details>
       <summary>Ekran główny (Home) </summary>
	
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Home1.PNG "Home Page")

           Przedstawiono stronę główną aplikacji (index.php).
	   
   <p>Strona ta zawiera sekcje takie jak: header, baner, content oraz foter. Układ ten jest powielany na większości podstron z wyjątkiem slidera. Jest on ustawiony jako tło baneru, a napisany został w języku CSS. Strona ta dotyczy głównie kwestii wizualnej. Home jest wizytówką każdej strony internetowej i to często od jej wyglądu zależy, czy użytkownik postanowi ją obejrzeć w całości czy też nie. Kolorystycznie nawiązuje do barw neonowych, które są uwielbiane przez większość graczy - czyli grupę docelową symulowanego sklepu.</p>
   
   
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Home2.PNG "Home Page - scroll")

           Przedstawiono stronę główną aplikacji (index.php) - scroll.
	   
   <p>Poniżej slidera na stronie startowej wyświetlają się również animowane mini statystyki wirtualnego sklepu, wczytywane z bazy danych. Dotyczą one liczby złożonych zamówień oraz ilości zarejestrowanych użytkowników.</p>
   
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Icons.png "Menu Sub-Pages")

           Przedstawiono stronę główną aplikacji (index.php) - menu.
	   
   <p>Na stronie w sekcji header funkcjonuje logo oraz zakładki, umożliwiające łatwe przemieszczanie się pomiędzy różnymi podstronami. Kolor niebieski oznacza obecną stronę, natomiast kolor fioletowy to zakładka po najechaniu kursora myszy..</p>
   
   
   
   </details>
   <details>
       <summary>Ekran RODO</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/RODO.PNG "RODO")

           Przedstawiono stronę RODO (rodo.php).
	   
   <p>Strona ta nie zawiera żadnych funkcjonalności. Jest to jedynie strona opisowa, zawierająca informacje dotyczące RODO.</p>
   </details>
   
   <details>
       <summary>Ekran Kart Lojalnościowych</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Loyal.PNG "RODO")

           Przedstawiono stronę Kart Lojalnościowych (loyality.php).
	   
   <p>Strona ta nie zawiera żadnych funkcjonalności. Jest to jedynie strona opisowa, zawierająca informacje dotyczące kart lojalnościowych.</p>
   </details>
   
   
<details>
       <summary>Ekran O Sklepie</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/O_sklepie.PNG "O Sklepie")

           Przedstawiono stronę O sklepie (me.php).
	   
   <p>Strona ta nie zawiera żadnych funkcjonalności. Jest to jedynie strona opisowa, umożliwiająca pozyskanie większej ilości informacji dotyczących wirtualnego sklepu. (Funkcja reprezentacyjna).</p>
   </details>
   
   <details>
       <summary>Ekran Kontakt</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Kontakt.PNG "Kontakt")

           Przedstawiono stronę Kontakt (contact.php).
	   
   <p>Strona ta nie zawiera żadnych funkcjonalności. Jest to jedynie strona opisowa, umożliwiająca pozyskanie większej ilości informacji dotyczących kontaktu z właścicielami sklepu.</p>
   </details>
   
   <details>
       <summary>Ekran Produkty</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/produkty1.PNG "Produkty")

           Przedstawiono stronę produkty (brand.php).
	   
   <p>Na stronie tej wyświetlane są okładki gier sprzedawanych w naszym sklepie. Okładki te przechowywane są w bazie danych za pomocą bloblong. Każda z okładek wczytywana jest w postaci formularza, który ma za zadanie pobrać oraz przesłać id wybranej gry do strony danego produktu. Strona ta jest w 100% generowana na podstawie otrzymanego id. Na górze strony wyświetla się top 6 gier, pod względem sprzedaży.</p>
   
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/produkty2.PNG "Produkty")

           Przedstawiono stronę produkty (brand.php).
	   
   <p>Poniżej listy bestsellerów znajdują się wszystkie inne gry, dostępne do kupna w bazie danych. Na wszystkie okładki gier, narzucane zostają nazwy platformy wraz z ich ceną dla wyznaczonej gry.</p>

  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/produkty3.1.PNG "Produkty")

           Przedstawiono stronę produkty - wyszukiwarka (brand.php).
	   
   <p>Pod banerem na stronie produktów wyświetlają się dwa przyciski, służące do obsługi wyszukiwarki. Wyszukiwarka ta, przeszukuje nazwy oraz opisy gier w poszukiwaniu wpisów zbliżonych do podanych przez użytkownika. Jeżeli natrafi na podobny rekord to wyświetla go w postaci okładki gry. Jeżeli takowych rekordów jest bardzo dużo to wypisuje 16 najbardziej pasujących gier, a na górze strony podaje liczbę wszystkich pasujących rekordów. </p>
   
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/produkt3.PNG "Produkty")
  

           Przedstawiono stronę produkty - wyszukiwarka (brand.php).
	   
   <p>Jeżeli użytkownik nie odnalazł pasujących dla niego rekordów może dopisać więcej szczegółów w celu zmniejszenia ilości uzyskanych rekordów lub zwinąć okno wyszukiwarki, klikając na strzałkę, znajdującą się w prawym dolnym rogu ekranu.</p>
   
   </details>
   
   
   <details>
       <summary>Ekran Produkt -> Wybrany produkt</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Produkt%20v1.PNG "Produkt")
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Produkt%20v2.PNG "Produkt")

           Przedstawiono stronę produkt (product.php).
	   
   <p>Strony produktów są w pełni zautomatyzowane. Zawartość jest generowana na podstawie informacji zawartych w bazie danych. Każda z gier nie posiada osobnej podstrony, co pozwala na wysoką oszczędność pamięciową. Informacje o grze są automatycznie wczytywane do utworzonego wcześniej szablonu graficznego.</p>
   
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Produkt%20v3.PNG "Produkt")

           Przedstawiono stronę produkt (product.php).
	   
   <p>Na podstawie wygenerowanych danych, użytkownik może wybrać odpowiednią konfigurację gry, którą chce nabyć. Musi wybrać odpowiednio platformę, edycję, wersję oraz ilość kopii. Wybór ilości kopii odblokowuje się dopiero po wybraniu platformy, a ich liczba jest zależna od zawartości bazy danych.</p>
   
   
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Produkt%20v4.PNG "Produkt")

           Przedstawiono stronę produkt (product.php) - po zatwierdzeniu kupna.
	   
   <p>Po zatwierdzeniu chęci kupna gry, informacje o wyborach użytkownika zostają przesłane do zmiennej sesyjnej, a użytkownik może zadecydować, czy chce przejść do koszyka, czy woli wybrać więcej produktów i przejść do koszyka później.</p>
   
   </details>
   
   
   <details>
       <summary>Ekran Koszyk</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v1.PNG "Koszyk")

           Przedstawiono stronę Koszyk (bucket.php) - Pusty.
	   
 <p>Gdy użytkownik nie doda jeszcze produktu (zmienna sesyjna jest pusta), na ekranie wyświetla się odpowiedni komunikat. </p>
 
 
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/koszyk2.PNG "Koszyk")

           Przedstawiono stronę Koszyk (bucket.php).
	   
 <p>Gdy koszyk nie jest pusty, użytkownik na ekranie uzyskuje obraz aktualnego zamówienia wraz z jego szczegółami. Jeżeli posiada on kartę lojalnościową, w tym momencie zostają naliczone zniżki do zamówienia, które odejmowane są od ceny dostawy lub sumy zamówienia. </p>
 
 
 ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v3.PNG "Koszyk")

           Przedstawiono stronę Koszyk (bucket.php).
	   
 <p>Poniżej informacji o zamówieniu, użytkownik ma do wyboru metodę dostawy oraz metodę płatności. Jeżeli użytkownik wybierze produkt w wersji CD-KEY, a w zamówieniu nie ma żadnej gry w wersji pudełkowej, może on wybrać opcję dostawy w wersji CD-KEY’a, który zostanie przesłany na podany adres email. W razie wyboru takowej opcji, w metodzie płatności „Gotówka” ulega zablokowaniu, tak aby użytkownik musiał dokonać płatności w sposób zdalny. Jeżeli natomiast użytkownik wybierze grę w wersji Pudełkowej na liście dotyczącej metody dostawy opcja CD-KEY jest niewidoczna.  </p>
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v4.PNG "Koszyk")
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v5.PNG "Koszyk")


           Przedstawiono stronę Koszyk (bucket.php).
	   
 <p>Po wybraniu odpowiedniej metody dostawy, użytkownik otrzymuje różne opcje do wyboru. Przy dostawie „Odbiór w sklepie” użytkownik musi wybrać jedną z istniejących placówek firmy, przy innych metodach musi podać adres dostawy. </p>
 
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v7.PNG "Koszyk")


           Przedstawiono stronę Koszyk (bucket.php).
	   
 <p>Użytkownik, który podał swoje dane podczas konfiguracji konta, bądź uzupełnił je później, za pomocą edycji konta ma dostęp do opcji autouzupełniania. Po kliknięciu przycisku typu radio, w miejsce wymaganych danych, wklejają się podane informacje. Wszystkie podane informacje muszą przejść walidację, tak aby kod pocztowy lub numer telefonu, spełniał wymagania formalne.</p>
 
 ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v8.PNG "Koszyk")


           Przedstawiono stronę Koszyk - Podsumowanie (sum_bucket.php).
	   
 <p>Po zatwierdzeniu informacji, użytkownik zostaje przekierowany do strony podsumowującej zamówienie. Na stronie tej wyświetlają się wszystkie niezbędne informacje, a poniżej podanych danych, użytkownik musi podać dane (w przypadku metody płatności innej niżeli gotówka). Dane te nie są weryfikowane, gdyż jest to jedynie symulacja sklepu – nie metod płatności.</p>
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Koszyk%20v9.PNG "Koszyk")


           Przedstawiono stronę Koszyk - Podsumowanie (sum_bucket.php).
	   
 <p>Po potwierdzeniu zamówienia, użytkownik otrzymuje odpowiedni komunikat, a zamówienie zostaje dodane do bazy danych, pomniejszając ilość dostępnych kopii gier, tak aby następny użytkownik nie mógł zamówić gry, która jest już kupiona.</p>
 
 
 
   </details>
   
   <details>
       <summary>Ekran Zaloguj / Rejestracja</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Logowanie.PNG "Logowanie")

           Przedstawiono stronę Logowania / Rejestracji (login.php).
	   
 <p>Zakładka zaloguj się (przycisk) jest dynamicznie kontrolowana przez status sesji. Gdy użytkownik posiada już konto oraz poprawnie zaloguje się w panelu dostępnym po lewej stronie ekranu. Następuje podmiana przycisku zaloguj się, na przycisk wyloguj się. Po kliknięciu przycisku wyloguj się, sesja zostaje zamknięta, a użytkownik przestaje mieć dostęp do ekranu edycji konta. Zakładka zaloguj się umożliwia również rejestrowanie nowych użytkowników (po prawej stronie). Nowy użytkownik musi podać niezbędne informacje dotyczące swojej osoby. Tj. Imię, Nazwisko, E-mail, Telefon, Login do zakładanego konta oraz hasło, wraz z jego powtórzeniem w celu weryfikacji poprawności składni. Dane te muszą odpowiadać formatowi bazy danych! Np. jeżeli użytkownik poda adres email bez użycia znaku @, otrzyma odpowiedni komunikat błędu walidacji danych. Gdy walidacja przebiegnie poprawnie, dane użytkownika zostają przesłane do bazy danych, a skrypt wysyła go do nowej strony, gdzie jest proszony o uzupełnienie profilu większą ilością danych opcjonalnych (adres, nr konta itd.) Przy czym hasło użytkownika zostaje przesłane metodą haszującą, dzięki czemu niwelujemy możliwość przechwycenia / wycieku haseł użytkowników. </p>
 
 
 
 <summary>Menu po zalogowaniu na konto administracyjne.</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/logowanie%20wszystkie%20ikonki.PNG "Logowanie")

           Przedstawiono stronę Logowania / Rejestracji (login.php) - menu.
	   
 <p>Po zalogowaniu się na górnym menu pojawiają się dodatkowe ikony. Jeżeli użytkownik jest administratorem dostaje on dostęp do konta oraz admin panelu. Jeżeli natomiast jest to zwykły użytkownik to otrzymuje jedynie dostęp do zakładki 'Moje konto'. </p>
 
 ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/rejestracja_new.PNG "Konfiguracja")

           Przedstawiono stronę konfiguracyjną (reg_next.php).
	   
 <p>Gdy użytkownik loguje się po raz pierwszy, zostaje przekierowany na stronę konfiguracyjną konta, którą może pominąć. Dane które tam wpisze, zostaną przypisane do jego konta oraz będą dostępne w zakładce „Moje konto”. Służyć one będą autouzupełnianiu danych podczas składania zamówienia. </p>
 
 
   </details>
   
   <details>
       <summary>Ekran Admin Panel</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_stat1.PNG "Admin Panel - ekran główny")
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_stat2.PNG "Admin Panel - statystyki")

           Przedstawiono stronę główną 'Admin Panel' (admin.php).
          
<p>Użytkownicy z uprawnieniami administratora mają dostęp do strony Admin Panel, gdzie mają możliwość zarządzania: produktami, użytkownikami, zamówieniami oraz wiadomościami wysyłanymi do moderatorów.</p>
<p>Po wejściu na stronę Admin Panel, użytkownik widzi stronę główną, gdzie znajdują się statystyki generowane dynamicznie w postaci czytelnych wykresów oraz dokładnych informacji, ważnych dla zarządzającego sklepem internetowym</p>
         
<p>Dostępnymi aktualnie statystykami są:
<br>* Zarobki za obecny miesiąc (PLN)
<br>* Zarobki ogólne (PLN)
<br>* Przychód obecnoroczny (PLN)
<br>* Przychód zeszłoroczny (PLN)
<br>* Graf ilustrujący przychody za każdy miesiąc bieżącego roku
<br>* Liczba zarejestrowanych kont
<br>* Liczba administratorów
<br>* Liczba moderatorów
<br>* Liczba użytkowników (wyłączając administratorów i moderatorów)
<br>* Graf ilustrujący liczbę rejestracji kont w każdym miesiącu bieżącego roku
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_men.PNG "Admin Panel - menu")

           Przedstawiono stronę 'Admin Panel' wraz z rozsuwanym menu (admin.php).
          
<p>Panel administratora posiada wysuwane, animowane menu, które jest częściowo responsywne. Pozwala ono na wygodną nawigację pomiędzy podstronami, na których można zarządzać odpowiednimi dziedzinami sklepu.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_add_game.PNG "Admin Panel - GRY")
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_add_game2.PNG "Admin Panel - GRY")

           Przedstawiono stronę 'Admin Panel' pozwalającą dodawać asortyment (admin.php).
          
<p>Administrator ma możliwość dodawania nowej pozycji w sklepie, wypełniając pola opisujące odpowiednio produkt (nazwa gry, opis, PEGI, okładka, czas przejścia, data premiery).
Dodawanie okładki obsługuje mechanizm "drag and drop", który przyśpiesza oraz ułatwia ten proces. Admin ma także możliwość podglądu dodanej przez siebie grafiki, usunięcia jej oraz eksportu do bazy danych (przycisk ten jednak nie został w pełni ukończony z powodu napotkania wielu problemów) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_delete_game.PNG "Admin Panel - GRY")

           Przedstawiono stronę 'Admin Panel' pozwalającą usuwać pozycje z asortymentu (admin.php).
          
<p>Administrator ma możliwość usuwania danej pozycji w sklepie oraz usuwania wybranej platformy dla danej gry. Wystarczy wybrać z listy produkt oraz zadecydować jakie działania są potrzebne. 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_edit_game.PNG "Admin Panel - GRY")

           Przedstawiono stronę 'Admin Panel' pozwalającą edytować pozycje z asortymentu (admin.php).
          
<p>Administrator jest w stanie w bardzo łatwy sposób edytować wszystkie informacje na temat wybranej gry. Po wybraniu pozycji z listy, należy wypełnić te same informacje, co przy dodawaniu nowego produktu.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_publisher.PNG "Admin Panel - GRY - Wydawcy")

           Przedstawiono stronę 'Admin Panel' pozwalającą na odczytanie wszystkich dostępnych wydawców, których produkty są dostępne w sklepie oraz umożliwienie swobodnej ich modyfikacji (admin.php).
          
<p>Strona wyświetla nazwy wydawców, które pochodzą z bazy danych, w formie tabelarycznej. Na stronie znajduje się paginacja, która ma na celu podniesienie walorów estetycznych oraz użytkowych strony. Poniżej znajdują się pola umożliwiające dodawanie, edycję oraz usunięcie wybranego wydawcy.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_studio.PNG "Admin Panel - GRY - Studia")

           Przedstawiono stronę 'Admin Panel' pozwalającą na odczytanie wszystkich dostępnych studiów, których produkty są dostępne w sklepie oraz umożliwienie swobodnej ich modyfikacji (admin.php).
          
<p>Strona wyświetla nazwy studiów, które pochodzą z bazy danych, w formie tabelarycznej. Na stronie znajduje się paginacja, która ma na celu podniesienie walorów estetycznych oraz użytkowych strony. Poniżej znajdują się pola umożliwiające dodawanie, edycję oraz usunięcie wybranego studia.
</p>



![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_edition.PNG "Admin Panel - GRY - edycje")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać edycjami oferowanymi przez sklep (admin.php).
          
<p>Na stronie wyświetlane są informacje na temat edycji. Stworzony sklep ma w domyśle 3 edycje (Podstawową, Gracza oraz Prze-Grywa). Przedstawiona strona pozawala na dodanie kolejnych edycji (wraz z ich benefitami), modyfikację istniejących (oraz ich benefitów), a także na usuwanie całych edycji.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_version.PNG "Admin Panel - GRY - wersje")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać wersjami oferowanymi przez sklep (admin.php).
          
<p>Na stronie wyświetlane są informacje na temat wersji. Stworzony sklep ma w domyśle 2 wersje (Pudełkową oraz CD-Key). Przedstawiona strona pozawala na dodanie kolejnych wersji, modyfikację istniejących, a także na usuwanie całych edycji.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_supplie.PNG "Admin Panel - GRY - asortyment")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zasobami sklepu (admin.php).
          
<p>Na stronie wyświetlane są informacje na temat asortymentu (nazwa gry, dostępne platformy, ceny oraz ilość kopii). Administrator ma możliwość uzupełniania ilości gier na daną platofrmę oraz modyfikację ich cen
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_sell.PNG "Admin Panel - Zamówienia")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zamówieniami (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat złożonych zamówień przez użytkowników. Administator może zmieniać statusy zamówienia (wszystkie zamówienia ze statusem "Dostarczono" lub "Anulowano" trafiają do archiwum) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_sell_cd_key.PNG "Admin Panel - Zamówienia - CD-Key")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zamówieniami wersji CD-Key (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat złożonych zamówień wersji CD-Key przez użytkowników. Administator może zmieniać statusy zamówienia (wszystkie zamówienia ze statusem "Dostarczono" lub "Anulowano" trafiają do archiwum) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_sell_shop.PNG "Admin Panel - Zamówienia - Sklep")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zamówieniami, które są dostarczane do sklepu stacjonarnego (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat złożonych zamówień, które są dostarczane do sklepu stacjonarnego. Administator może zmieniać statusy zamówienia (wszystkie zamówienia ze statusem "Dostarczono" lub "Anulowano" trafiają do archiwum) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_sell_dost.PNG "Admin Panel - Zamówienia - Dostawa")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zamówieniami, które są dostarczane pod wskazany adres (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat złożonych zamówień, które są dostarczane pod wskazany adres. Administator może zmieniać statusy zamówienia (wszystkie zamówienia ze statusem "Dostarczono" lub "Anulowano" trafiają do archiwum) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_sell_arch.PNG "Admin Panel - Zamówienia - Archiwum")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać zamówieniami, które są w archiwum (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat złożonych zamówień, które mają status "Dostarczono" lub "Anulowano". Administator może zmieniać statusy zamówienia (wszystkie zamówienia ze statusem innym niż "Dostarczono" lub "Anulowano" zostaną przeniesione z archiwum) 
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_mod1.PNG "Admin Panel - Messenger")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać moderatorami (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat moderatorów strony, którzy mają pełnią rolę pomocy technicznej oraz informacji dla użytkowników.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_mod2.PNG "Admin Panel - Messenger")

           Przedstawiono stronę 'Admin Panel' pozwalającą przeglądać wiadomości moderatorów (admin.php).
          
<p>Na stronie wyświetlane są wszystkie informacje na temat konwersaji prowadzonych przez moderatorów strony. Administrator każdą konwersacje może swobodnie przeglądać, jednak nie może odpowiadać na wiadomości, usuwać ich, ani zamykać tematu.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_mod3.PNG "Admin Panel - Messenger")

           Przedstawiono stronę 'Admin Panel' pozwalającą przeglądać wiadomości moderatorów (admin.php).
          
<p>Przykładowa konwersacja z moderatorem.
</p>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/admin_panel_user.PNG "Admin Panel - Użytkownicy")

           Przedstawiono stronę 'Admin Panel' pozwalającą zarządzać kontami na stronie sklepu (admin.php).
          
<p>Informacje na temat kont wyświetlane są w formie tabelarycznej (zastosowano paginację w celu zwiększenia przejrzystości strony). Niedostępne są jedynie hasła (które są przechowywane w bazie danych za pomocą hashcode w celu podniesienia bezpieczeństwa użytkowników). Poniżej znajdują się opcje edycji typu konta (możliwość nadania uprawień administatora, moderatora lub zwykłego użytkownika), a także możliwość usunięcia konta wybranego użytkownika.</p>


   </details>
   
   <details>
       <summary>Ekran Konta Klienta</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v1.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php).
	   
 <p>Po założeniu konta oraz zalogowaniu się, użytkownik otrzymuje dostęp do własnego konta. W zakładce tej znajdują się skrócone informacje dotyczące danych osobowych oraz zamówień wykonanych przez danego użytkownika. Może on uzyskać takie informacje jak: Imię i Nazwisko, Adres zamieszkania, Kontakt, Nr. Karty kredytowej, Wartość kupionych gier, Ilość dokonanych zamówień oraz ich skrócony opis, a także wygląd oraz opis karty lojalnościowej (o ile użytkownik takową posiada). </p>
 
 
 ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v2.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php) - Komunikat edycji konta.
	   
 <p>Użytkownik może również w pełni edytować dane umieszczone na stronie korzystając z symbolu zębatki. Po kliknięciu takowej ikony, użytkownik otrzymuje komunikat z zapytaniem, czy jest pewien, iż chce edytować swoje dane. Po wybraniu opcji Tak, komunikat automatycznie się zamyka, a ekran scrolluje się do końca strony, gdzie odkrywa się nowa opcja edycji konta. </p>
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v3.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php) - Po akceptacji edycji.
	   
	   
	   
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v4.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php) - Edycja hasła.
	   
 <p>Dostępna jest również opcja edycji hasła do konta użytkownika. Po kliknięciu opcji „Zmień hasło” oraz po zatwierdzeniu wstępnego komunikatu, użytkownik otrzymuje kolejny komunikat, w którym musi podać poprzednie hasło oraz potwierdzić nowe hasło. Jeżeli podane dane przejdą walidację poprawnie, hasło zostanie zmienione, a użytkownik zostanie wylogowany.. </p>
 
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v5.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php) - Edycja avatara.
	   
 <p>Każdy użytkownik ma do wyboru 4 różne avatary. Ilość avatarów, zmienia się wraz ze zdobyciem wyższych poziomów kont lojalnościowych.
<br>- Brak karty = 4 avatary
<br>- Brązowa karta (50 zamówień) = 10 avatarów
<br>- Srebrna karta (100 zamówień) = 20 avatarów
<br>- Złota karta (250 zamówień) = 40 avatarów
<br>- Platynowa karta (500 zamówień) = 60 avatarów
<br>Dodatkowo, użytkownik może otrzymać dostęp do kilku dodatkowych avatarów, jeżeli podczas zakupów użyje odpowiedniego kodu rabatowego.
 </p>
 
 
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/Moje%20konto%20v6.PNG "Konto")

           Przedstawiono stronę 'Moje konto' (user_account.php) - Zamówienia.
	   
 <p>Po kliknięciu „Zamówienia”, użytkownik może obejrzeć złożone przez siebie zamówienia oraz śledzić ich status. </p>
 
 
   </details>
   
   
   <details>
       <summary>Instant Czat - Messenger</summary>

![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger1.PNG "messenger")

           Przedstawiono stronę 'Index' (Index.php).
	   
 <p>Dla użytkowników zwykłych typu ‘user’ dostępna jest opcja instant czatu z moderatorem. Jest ona dostępna w postaci kółka w prawym dolnym rogu ekranu. </p>
 
 
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger2.PNG "messenger")

           Przedstawiono stronę 'Index' (Index.php) - Otworzenie instant czatu.
	   
 <p>Po kliknięciu na kółko zostaje otwarte okienko rozmowy. Jeżeli użytkownik nie wysłał jeszcze żadnej wiadomości otrzyma on wiadomość standardową. Jak widać wiadomość nie posiada widocznego odbiorcy, gdyż żaden z moderatorów nie został dopasowany do danego użytkownika. </p>
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger3.PNG "messenger")

           Przedstawiono stronę 'Index' (Index.php) - Po wysłaniu wiadomości.
	   
   <p> Po wysłaniu wiadomości, dla użytkownika zostaje przyznany jeden z dostępnych moderatorów. Skrypt, wysyła zapytania do bazy danych i sprawdza który z moderatorów jest obecnie dostępny. Działa to w postaci sprawdzenia czy dany moderator posiada obecnie więcej niżeli 5 oczekujących rozmów. Jeżeli tak się stanie to sprawdza następnego moderatora itd. Jeżeli każdy z moderatorów posiada co najmniej 5 oczekujących wiadomości, system powtarza proces dla liczby 10 rozmów itd. Iterując liczbę wiadomości o 5.</p>
	   
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger4.PNG "messenger")

           Przedstawiono stronę 'Wiadomości' (messenger_moderator.php).
	   
 <p>Po zalogowaniu się na konto o typie moderatora, na górnym pasku, możemy zauważyć dodatkową opcję jaką jest ‘Wiadomości’. W zakładce tej moderator może odpisywać oczekującym klientom. Jak widać moderator w zakładce ‘Wiadomości’ otrzymuje takie informacje jak: id, imię oraz nazwisko klienta wysyłającego wiadomość oraz treść rozmowy.</p>
 
 
  ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger5.PNG "messenger")

           Przedstawiono stronę 'Wiadomości' (messenger_moderator.php) - Zakończenie rozmowy.
	   
 <p>Po zakończeniu rozmowy (rozwiązaniu problemu). Moderator musi zakończyć rozmowę za pośrednictwem przycisku znajdującego się poniżej. Gdy kliknie takową opcję, statusy wiadomości w bazie danych zostają edytowane i przeniesione do archiwum, a moderator (o ile jest ktoś w kolejce) natychmiastowo otrzymuje nowego użytkownika do rozmowy.</p>
 
 
   ![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/messenger6.PNG "messenger")
   
           Przedstawiono stronę 'Index' (Index.php) - Odpowiedź dla usera.
	   
	   
 <p>Jak widać na powyższym screenie użytkownik otrzymał odpowiedź od moderatora.</p>
 
 
   </details>
   
   
         
### Baza danych
####	Diagram ERD
![alt text](https://github.com/DamianJamrozy/HTML-CSS-JS-PHP---Mini-University-Shop-Project-PRZEGRYWY/tree/main/img-readme/ERD.png "Diagram ERD")

####	Skrypt do utworzenia struktury bazy danych znajduje się w pliku baza_przegrywy.sql

## Wykorzystane technologie:
1.	PHP v7.4.7
2.	HTML
3.	JavaScript
4.	JQuery
5.	CSS
6.	MySql
7.	Bootstrap (Wykorzystany jedynie do listowania stron)

## Proces uruchomienia aplikacji (krok po kroku)

Aplikacja ta została utworzona w środowisku PHP wersji 7. Aby wszystkie zaimplementowane funkcje działały poprawnie należy korzystać z PHP w wersji 7.4.7, monitora o rozdzielczości min. 1920x1080 (rekomendowane 4k) oraz przeglądarki google chrome.
Do uruchomienia aplikacji wymagany jest program obsługujący ww. język. Jednym z takowych programów jest xampp.
Aby uruchomić aplikację za pomocą programu xampp należy:
1. Zainstalować xampp v. 7.4.7.
2. Uruchomić program oraz aktywować dwie pierwsze opcje tj. Apache oraz MySQL.
3. W przeglądarce wpisać "localhost" następnie przejść do phpMyAdmin oraz należy utworzyć pustą bazę danych o nazwie baza_przegrywy.
4. Po utworzeniu bazy należy kliknąć na jej nazwę, a następnie wybrać funkcję importowania.
5. Podczas importowania wybieramy dołączony powyżej plik baza_przegrywy.sql a następnie klikamy wykonaj.
6. Jeżeli proces przebiegnie pomyślnie nasza baza danych będzie gotowa do użycia wraz z przykładowymi kontami użytkowników oraz wpisami na temat gier.
7. W tym kroku należy poprawnie zaimportować stronę. Należy przejść do katalogu docelowego instalacji oprogramowania xampp (standardowo jest to C:\xampp\htdocs). W katalogu tym należy utworzyć folder o nazwie np. websites, a następnie do tego katalogu należy wkleić wypakowaną uprzednio aplikację.
8. Aby otworzyć aplikację należy wejść w przeglądarkę (Zalecana google chrome) i w pasku wyszukiwania wpisać: "localhost/websites". Jeżeli strona oraz baza danych została poprawnie dodana, na naszym monitorze powinna ukazać się strona główna aplikacji webowej prze-gry.wy.

### Potrzebne nazwy użytkowników do uruchomienia aplikacji
Administrator:
Login: djamrozy
Hasło: zaq1@WSX

Moderator:
Login: riwanczyk
Hasło: XSW@1qaz

Użytkownik:
Login: kk123
Hasło: kk123


[Przydatny link przy tworzeniu plików *.md ](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)

[logo]: https://gallery.dpcdn.pl/imgc/UGC/34567/g_-_960x640_-_s_x20131110194052_0.jpg "Strona główna"
