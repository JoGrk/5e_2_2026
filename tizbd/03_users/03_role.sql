-- 1. Utwórz użytkownika u1  z hasłem abcd
CREATE USER 'u1'@'localhost' IDENTIFIED BY 'abcd';

-- 3. Użytkownikowi u1 nadaj prawo do efektywnego wstawiania, usuwania i modyfikowania danych dla tabeli auta (baza komis).
GRANT INSERT, DELETE, UPDATE ON 5e_2_komis.auta TO 'u1'@'localhost';
-- 3. Użytkownikowi u1 odbierz prawo do usuwania danych w tabeli auta

REVOKE DELETE ON 5e_2_komis.auta FROM 'u1'@'localhost';

-- 4. Zablokuj koto u1

ALTER USER 'u1'@'localhost' ACCOUNT LOCK

-- 5. Odblokuj konto u1

ALTER USER 'u1'@'localhost' ACCOUNT unLOCK

-- 6.Ustaw hasło dla użytkownika u1 na 1234
ALTER USER 'u1'@'localhost' IDENTIFIED BY '1234';
-- 7, utwórz rolę r1 z prawami do wyświetlania danych z wszystkich tabel bazy b

CREATE ROLE 'r1';

GRANT SELECT ON 5e_2_komis.* TO 'r1';

-- 8. Użytkownikowi u1 przypisz prawo do roli r1:
GRANT 'r1' TO 'u1'@'localhost';

-- 9 zaloguj się jako u1 i sprawdź uprawniania (show grants):
mysql -u u1 -p
1234
SHOW GRANTS;

--        10. Sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

SELECT * FROM zamowienia;

--        11. włącz (ustaw) rolę r1

SET ROLE r1;

--        12. sprawdź, czy możesz wyświetlić dane z tabeli zamowienia

SELECT * FROM zamowienia;

--         13. sprawdź, czy możesz usunąć zamowienie o id 3
DELETE FROM zamowienia
WHERE id = 3

-- 14. do roli r1 dodaj prawo do usuwania danych z tabeli zamowienia

grant delete on 5e_2_komis.zamowienia to 'r1';

--          15. sprawdź uprawnienia

--          16. usuń zamówienie o id 2

delete from zamowienia
where id =2;

-- 17. usuń rolę r1
DROP ROLE 'r1';

-- 18. usuń użytkownika u1

DROP USER 'u1'@'localhost';