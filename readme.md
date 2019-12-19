# myApp
myApp jest to prosta aplikacja typu CMS, przeznaczona do zarządzania stroną typu blog.

## Funkcjonalności
* System Logowania / Rejestracji
* ACL - Użytkownicy podzieleni na role (Administrator, Moderator, Uzytkownik)
* Zarządzanie użytkownikami ( Dodaj, usuń, zmień, itp. )
* Logi użytkowników
* Generowanie logów w raportach PDF
* Dodawanie wpisów na strone
* Tworzenie kategorii dla wpisów
* Komentowanie wpisów
* Planowanie swoich wydarzeń
* Edycja strony Głównej

## Instalacja
*(Pamiętaj aby zainstalować Composer'a)*
1. Pobierz zawartość repozytorium
2. Utwórz plik __.env__ na podstawie pliku __.env.example__
3. Skonfiguruj bazę danych w pliku __.env__ 
4. Wykonaj w folderze z aplikacją polecenie:
    ```
    composer install
    composer upgrade
    ```
5. Wykonaj w folderze z aplikacją polecenie:
    ```
    php artisan key:generate
    ```
6. Wykonaj migracię bazy danych oraz seedery:
    ```
    php artisan migrate
    ```
    ```
    php artisan db:seed
    ```
7. Wykonaj w folderze z aplikacją polecenie:
    ```
    php artisan serve
    ```
    (Pamiętaj aby uruchomić także serwer bazy danych)

### Użytkownicy startowi
| Id | Użytkownik | Rola | Hasło |
| :--: |:----------:|:-----:|:------:|
| 1  | admin@myapp.com | Administrator | mypassword12 | 
| 2  | moderator@myapp.com | Moderator | mypassword12 | 

Użytkownika można utworzyć "ręcznie" __localhost:8000/register__ (Utworzony w ten sposób użytkownik będzie miał prawa __uzytkownik__, możliwość tylko komentowania wpisów)

## Autor
Janusz Zębala
j.zebala96@gmail.com
