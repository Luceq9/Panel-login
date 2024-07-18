Panel Logowania to prosty system autoryzacji, który umożliwia użytkownikom rejestrację, logowanie oraz wyświetlanie ich danych po zalogowaniu. System przechowuje dane użytkowników w bazie danych MySQL i wykorzystuje PHP do interakcji z bazą oraz zarządzania sesjami.

Funkcje
Rejestracja: Umożliwia użytkownikom stworzenie konta poprzez podanie e-maila i hasła.
Logowanie: Umożliwia użytkownikom logowanie się do systemu przy użyciu e-maila i hasła.
Wyświetlanie danych: Po pomyślnym zalogowaniu, wyświetlane są dane użytkownika (e-mail i ID).
Sesje: Używanie sesji PHP do zarządzania stanem zalogowania użytkownika.
Technologie
HTML: Używany do strukturyzacji formularzy rejestracji i logowania.
CSS: Stylizacja formularzy i interfejsu użytkownika.
JavaScript: Opcjonalne wsparcie dla walidacji formularzy i interakcji z użytkownikiem.
PHP: Obsługuje logikę rejestracji, logowania oraz interakcję z bazą danych MySQL.
MySQL: Baza danych do przechowywania danych użytkowników.
Instalacja
Utwórz bazę danych:

Zaloguj się do phpMyAdmin lub użyj innego narzędzia do zarządzania bazą danych.
Utwórz nową bazę danych, np. db. i ustaw wartości w pliku php db.php
