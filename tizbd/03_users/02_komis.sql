-- . Dodaj użytkowników:
-- A. Kasia, odpowiadająca za wprowadzanie danych o klientach, hasło 1234
CREATE USER 'kasia'@'localhost' 
IDENTIFIED BY 'hasło1234';
-- B. Jan - głównego mechanika wpisującego informacje o naprawach, hasło 1234

CREATE USER 'Jan'@'localhost' IDENTIFIED BY 'haslo1234';
-- C. Kasjer - odpowiedzialnych za wystawianie rachunków, ale nie mogących wprowadzać zmian do bazy, hasło 1234

CREATE USER 'kasjer'@'localhost' IDENTIFIED BY '1234';

-- 2. Utwórz perspektywę (widok)  KlienciKoszty (nazwa, adres, kwota, data_wpisu z tabeli rejestry pod nazwą data_rejestru) łączącą dane z tabel Klienci i Rejestry, która będzie potrzebna kasjerowi do pracy

CREATE VIEW KlienciKoszty AS
    SELECT nazwa, adres, kwota, rejestry.data_wpisu AS data_rejestru
FROM rejestry
    INNER JOIN klienci ON rejestry.klient = klienci.id;
 
-- 3. Ustal minimalny zestaw uprawnień dla utworzonych użytkowników, kierując się zasadą "im mniejsze uprawnienia, tym mniej można zepsuć"
-- A. Kasia, wszystkie prawa do tabeli Klienci

GRANT ALL 
ON 5e_2_komis.klienci 
TO 'kasia'@'localhost';


-- B. Jan - prawa do modyfikacji, dodawania i usuwania danych dla tabel operacje i rejestry oraz wyszukiwania dla wszystkich tabel w bazie

GRANT UPDATE, INSERT, DELETE ON 5e_2_komis.operacje TO 'Jan'@'localhost';
GRANT UPDATE, INSERT, DELETE ON 5e_2_komis.rejestry TO 'Jan'@'localhost';

GRANT SELECT on 5e_2_komis.* TO 'Jan'@'localhost';



-- C. Kasjer - prawa do przeszukiwania perspektywy KlienciKoszty
GRANT SELECT ON 5e_2_komis.KlienciKoszty TO 'kasjer'@'localhost';
-- 4. Utwórz nowego użytkownika uczendba z hasłem dostępu zaq1@WSX 

CREATE USER 'uczendba'@'localhost'
IDENTIFIED BY 'zaq1@WSX';
-- A. przypisz mu wszystkie uprawnienia do tabel Klienci i Handlowcy.
GRANT ALL ON 5e_2_komis.Klienci TO 'uczendba'@'localhost';
GRANT ALL ON 5e_2_komis.Handlowcy TO 'uczendba'@'localhost';

-- B. zabroń mu usuwania rekordów z tabeli Klienci:
DENY DELETE ON 5e_2_komis.Klienci TO 'uczendba'@'localhost';

REVOKE DELETE ON 5e_2_komis.Klienci FROM 'uczendba'@'localhost';

-- C. odbierz uprawnienia wykonywania zapytań usuwania rekordów i modyfikowania wartości w tabeli Handlowcy

REVOKE DELETE, UPDATE ON 5e_2_komis.Handlowcy FROM 'uczendba'@'localhost';

-- 5. Utwórz użytkowników jeden i dwa (bez hasła).

CREATE USER 'jeden'@'localhost';
CREATE USER 'dwa'@'localhost';

--  A. Nadaj uprawnienia wprowadzania, zmiany i usuwania danych w całej bazie komis dla użytkownika jeden

GRANT INSERT, UPDATE, DELETE ON 5e_2_komis.* TO 'jeden'@'localhost';

-- B. nadaj wszystkie uprawnienia do tabeli Auta użytkownikowi dwa

GRANT ALL ON 5e_2_komis.Auta TO 'dwa'@'localhost';
-- C. odbierz użytkownikowi jeden prawa usuwania danych 

REVOKE delete ON 5e_2_komis.* FROM 'jeden'@'localhost';

-- D. odbierz wszystkie uprawnienia użytkownikowi dwa do tabeli Auta

REVOKE ALL
ON 5e_2_komis.Auta
FROM 'dwa'@'localhost';

-- 6. 
-- A. Zaloguj się jako użytkownik jeden i ustaw hasło 'zaq1@WSX'
SET PASSWORD = PASSWORD('zaq1@WSX');

-- B. Ustaw hasło dla użytkownika dwa na 'zaq1@WSX'
SET PASSWORD = PASSWORD('zaq1@WSX');

-- C. z poziomu konta root zmień hasło dla użytkownika jeden na 'haslo'

SET PASSWORD FOR 'jeden'@'localhost' = PASSWORD('haslo');