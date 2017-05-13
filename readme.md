# myApp
myApp jest to prosta aplikacja typu CMS, przeznaczona do zarządzania stroną typu blog.

## Funkcjonalności
* System Logowania / Rejestracji
* ACL - Użytkownicy podzieleni na role (Administrator i Moderator)
* Zarządzanie użytkownikami ( Dodaj, usuń, zmień, itp. )
* Dodawanie wpisów na strone
* "Miękkie" usuwanie wpisów
* Tworzenie kategorii dla wpisów
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

Użytkownika można utworzyć "ręcznie" __localhost:8000/register__ (Utworzony w ten sposób użytkownik będzie miał prawa __moderatora__)

## Autor
Janusz Zębala
j.zebala96@gmail.com
