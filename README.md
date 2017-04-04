# Timesheet - wymagania projektu
##

### Informacje ogólne:
- **Witryna internetowa**,
- Należy zastosować ORM lub Micro-ORM,
- Dane powinny być walidowane po stronie front i back endu,
- Mechanizm logowania błędów,
- Projektu musi się znajdować na repozytorium,
- Dane muszą być zapisywane i odczytywane z bazy danych,
- Projekt będzie oceniany również ze względu na estetykę, 
- Projekt musi posiadać czytelną dokumentację,

### Aplikacja:
- Rejestracje nowego użytkownika wraz z podaniem danych osobowych,
- Mechanizm "Przypominania hasła",
- W systemie muszą występować 3 role - Administrator, Manager i Pracownik,
- Moduł przesyłania wiadomości pomiędzy użytkownikami systemu,
- We wszystkich tabelach w systemie powinna być możliwość filtracji danych,
- Należy zaimplementować mechanizm aprobowania wpisów.

### Pracownik:
- Możliwość dodawania i edycji wpisów za danych dzień pracy. Wpis musi zawierać: datę, czas pracy, projekt, zadanie, komentarz,
- Wyświetlanie listy wszystkich wpisów (wraz z możliwością ich filtracji).

### Manager:
- Wyświetlanie, dodawanie, edycja i usuwanie zadań (zadania powinny posiadać przewidywaną estymację),
- Wyświetlanie wszystkich projektów, które są prowadzone przez danego managera, 
- Wyświetlanie listy pracowników w danym projekcie,
- Generowanie raportu z przebiegu prac w projekcie,
- Aprobowanie wpisów pracowników.

### Administrator:
- Wyświetlanie listy użytkowników, zadań i projektów,
- Możliwość zablokowania użytkownika lub wymuszenie zmiany hasła,
- Dodawanie, edycja i usuwanie projektów,
- Przypisywanie managerów i pracowników do projektów.