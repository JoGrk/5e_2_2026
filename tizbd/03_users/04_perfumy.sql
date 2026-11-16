-- 1. Utwórz bazę perfumy i zaimportuj tabele marki.txt perfumy.txt i skład.txt (2019)

USE 5e_2_perfumy;

-- 2. Utwórz użytkownika edytor z prawami do modyfikowania, usuwania i wstawiania danych we wszystkich tabelach bazy danych perfumy.

CREATE USER 'edytor'@'localhost' 

GRANT DELETE,INSERT,UPDATE,SELECT ON 5e_2_perfumy.* TO 'edytor'@'localhost'; 

-- 3. Utwórz użytkownika selektor z prawami do wyszukiwania danych w tabeli perfumy z hasłem 1234

CREATE USER 'selektor'@'localhost' IDENTIFIED BY '1234'

GRANT SELECT 
ON 5e_2_perfumy.perfumy
TO 'selektor'@'localhost';
-- 4. Nadaj hasło użytkownikowi edytor 1234 oraz użytkownikowi selektor 5678

SET PASSWORD FOR 'edytor'@'localhost' = PASSWORD('1234');
SET PASSWORD FOR 'selektor'@'localhost' = PASSWORD('5678');

-- 5. Odbierz użytkownikowi edytor prawo do usuwania danych z wszystkich tabel

REVOKE DELETE ON 5e_2_perfumy.* FROM 'edytor'@'localhost';

-- 6. Sprawdź uprawnienia:

 

-- A. zaloguj się jako edytor i  zmień cenę perfum o id p_1 na 400 (powinno się udać)
-- B. z poziomu konta edytor usuń wszystkie składniki perfum o id p_1 (nie powinno się udać)
-- C. zaloguj się jako selektor i wyszukaj wszystkie perfumy o cenie 400  (powinno się udać)
-- D. z poziomu konta selektor wyszukaj wszystkie składniki perfum o id p_1 (nie powinno się udać)
-- ------------------------------------

-- CREATE ROLE 'app_developer', 'app_read', 'app_write';
-- GRANT ALL ON app_db.* TO 'app_developer';
-- GRANT 'app_developer' TO 'dev1'@'localhost';
-- REVOKE INSERT, UPDATE, DELETE ON app_db.* FROM 'app_write';
 

-- 7. Dodaj rolę usuwanie

CREATE ROLE 'usuwanie'

-- 8. Nadaj prawo do usuwania danych z wszystkich tabel dla roli usuwanie

GRANT DELETE, SELECT ON 5e_2_perfumy.* TO 'usuwanie'

-- 9. Dodaj użytkownika selektor oraz edytor do roli usuwanie

GRANT 'usuwanie' TO 'selektor'@'localhost';

-- 10. Sprawdź czy selektor oraz edytor mają prawa do usuwania danych z bazy (usuń skład perfum p_2 oraz p_3)
DELETE *
FROM skład
WHERE id_perfum IN ('p_2', 'p_3'); 

 show grants;
 set role usuwanie;
 show grants;

-- 11. Odmów selektorowi praw do usuwania (deny) z tabeli skład i sprawdź ponownie jego prawa do usuwania 