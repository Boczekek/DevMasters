# DevMasters - Portal społecznościowy dla developerów

## Wstęp
Niniejsza dokumentacja opisuje funkcjonowanie projektu DevMasters — portalu społecznościowego dedykowanego programistom i entuzjastom tworzenia oprogramowania.
Głównym celem projektu jest stworzenie aplikacji webowej zintegrowanej z relacyjną bazą danych, umożliwiającej interakcję użytkowników, publikację próśb o pomoc
programistyczną oraz zarządzanie zgłoszeniami i kontami.

## Wymagania systemowe
### Wymagania sprzętowe
Aplikacja może zostać uruchomiona lokalnie przy użyciu pakietu XAMPP. Minimalna konfiguracja sprzętowa:  

 • Procesor: minimum 2-rdzeniowy 2.0 GHz  
 • Pamięć RAM: co najmniej 4 GB  
 • Dysk twardy: minimum 500 MB wolnego miejsca  

 ### Wymagania programowe i użytkownika końcowego
 • System operacyjny: Windows, Linux lub macOS  
 • Zainstalowany XAMPP (z Apache, PHP, MySQL)  
 • Przeglądarka internetowa wspierająca JavaScript (Google Chrome, Firefox, Edge)  
 • Włączona obsługa JavaScript w przeglądarce  

 ## Instalacja
 Aby zainstalować i uruchomić projekt lokalnie:
 1. Zainstaluj i uruchom środowisko XAMPP.
 2. Włącz serwery Apache i MySQL z panelu XAMPP.
 3. Otwórz phpMyAdmin i zaimportuj plik DevM.sql.
 4. Skopiuj folder DevMasters do katalogu htdocs.
 5. W przeglądarce przejdź do adresu: http://localhost/devmasters/

## Struktura katalogów i plików
```
DevMasters/ 
├── css/ 
│   ├── login.css 
│   └── style.css 
├── images/ 
│   └── icon.png 
├── js/ 
│   ├── app.js 
│   ├── jquery.js 
│   ├── jquery.min.js 
│   ├── jquery.slim.min.js 
│   └── popper.min.js 
├── ap_accept.php 
├── ap_del.php 
├── aplikacje.php 
├── aplikuj.php 
├── dbconfig.php 
├── home.php 
├── index.php 
├── login.html 
├── login.php 
├── logout.php 
├── prosba.html 
├── prosba_del.php 
├── prosba_dodaj.php 
├── prosba_edit.php 
├── prosba_edit_zapisz.php 
├── prosby.php 
├── register.html 
├── register.php 
├── user_del.php 
├── users.php 
├── zlecenia.php 
DevM.sql 
karta-projektu.pdf 
instrukcja.pdf
```

## Opis działania
### Układ strony
Strona składa się z trzech głównych komponentów:  
 • Pasek tytułowy z logo, przyciskiem logowania i nazwą użytkownika  
 • Pasek nawigacyjny z zakładkami  
 • Główna sekcja zawartości — dynamicznie zmieniana  

### Zakładka Home
Wzakładce homewyświetlane są informacje dostosowane do aktualnie zalogowanego użytkownika oraz proste statystyki pobierane z bazy danych.  
 
Jeśli użytkownik nie jest zalogowany wyświetlany jest kafelek powitalny z zachętą do założenia konta.  
 
Jeśli użytkownik nie posiada rangi developer, wyswietlany jest też kafelek z zachętą do wypełnienia formularza zgłoszeniowego.  

### Zakładka Prośby
Zakładka prośby służy do składania próśb do developerów o napisanie lub poprawienie
kodu. Aby złożyć taką prośbę jedynym wymaganiem jest aby użytkownik był zalogowany.
Wyświetlają się tu również aktywne prośby użytkownika.

#### Tworzenie prośby
Po kliknięciu przycisku utwórz prośbę, użytkownik zostaje przekierowany do kreatora próśb. Prośba składa się z tytułu, opisu oraz tagów.

#### Edycja prośby
Po kliknięciu przycisku edytuj, użytkownik zostaje przekierowany do edytora próśb. Formularz powinien być uzupełniony od treści z oryginalnej prośby, które może edytować.
Przy edycji należy na nowo wybrać tagi.

### Ekran logowania/rejestracji
Aby się zalogować użytkownik musi pdać login i hasło do istniejącego konta. Jest też opcja założenia nowego konta. Wymagane jest wtedy podanie adresu e-mail, a następnieustalenie loginu oraz hasła.

#### Rangi
 Na portalu dostępne są następujące rangi użytkownika:  
 
 • użytkownik- podstawowa ranga z dostępem do tworzenia próśb  
 • developer- może reagować na zlecenia (prośby)  
 • moderator- może zarządzać kontami użytkowników  
 • administrator- ma pełne uprawnienia do wszystkiego, w tym do zarządzania kontami moderatorów  

 #### Konta testowe
 Wcelu swobodnego testowania projektu, utworzone zostały testowe konta z różnymi poziomami dostępu.  
 
 Konto użytkownika  
 Login: user  
 Hasło: user  
 
 Konto developera  
 Login: dev  
 Hasło: dev  
 
 Konto moderatora  
 Login: mod  
 Hasło: mod  
 
 Konto administratora  
 Login: admin  
 Hasło: admin  

### Zakładka Zlecenia
Tutaj można przeglądać prośby złożone przez innych użytkowników. Prośby zalogowanego użytkownika są odfiltrowane i wyświetlają się tylko w zakładce Prośby.

### Zakładka Zgłoszenia
Tutaj moderatorzy i administratorzy mogą przeglądać, akceptować i odrzucać zgłoszenia na zostanie developerem.

### Zakładka Użytkownicy
Tutaj moderatorzy i administratorzy mogą zarządzać kontami innych użytkowników.

## Podsumowanie
 Portal DevMasters realizuje założoną funkcjonalność — umożliwia interakcję między
 użytkownikami w kontekście pomocy programistycznej, zarządzanie kontami oraz publi
kację i realizację próśb. Dzięki zastosowaniu PHP, MySQL i technologii front-endowych
 (HTML, CSS, JS), projekt może być uruchamiany lokalnie za pomocą XAMPP i z łatwo
ścią rozwijany.

