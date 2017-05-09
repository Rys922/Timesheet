# Timesheet - wymagania projektu

### Informacje ogólne:
- <s>**Witryna internetowa**</s>,
- <s>Należy zastosować ORM lub Micro-ORM</s>,
- Dane powinny być walidowane po stronie front i back endu,
- <s>Mechanizm logowania błędów</s>,
- <s>Projektu musi się znajdować na repozytorium</s>,
- <s>Dane muszą być zapisywane i odczytywane z bazy danych</s>,
- <s>Projekt będzie oceniany również ze względu na estetykę</s>, 
- Projekt musi posiadać czytelną dokumentację,

### Aplikacja:
- <s>Rejestracje nowego użytkownika wraz z podaniem danych osobowych</s>,
- Mechanizm "Przypominania hasła",
- <s>W systemie muszą występować 3 role - Administrator, Manager i Pracownik</s>,
- Moduł przesyłania wiadomości pomiędzy użytkownikami systemu,
- We wszystkich tabelach w systemie powinna być możliwość filtracji danych,
- Należy zaimplementować mechanizm aprobowania wpisów.

### Pracownik:
- Możliwość dodawania i edycji wpisów za danych dzień pracy. Wpis musi zawierać: datę, czas pracy, projekt, zadanie, komentarz,
- Wyświetlanie listy wszystkich wpisów (wraz z możliwością ich filtracji).

### Manager:
- Wyświetlanie, dodawanie, edycja i usuwanie zadań (zadania powinny posiadać przewidywaną estymację),
- <s>Wyświetlanie wszystkich projektów, które są prowadzone przez danego managera</s>, 
- Wyświetlanie listy pracowników w danym projekcie,
- Generowanie raportu z przebiegu prac w projekcie,
- Aprobowanie wpisów pracowników.

### Administrator:
- <s>Wyświetlanie listy użytkowników, zadań i projektów</s>,
- <s>Możliwość zablokowania użytkownika lub wymuszenie zmiany hasła</s>,
- <s>Dodawanie, edycja i usuwanie projektów</s>,
- Przypisywanie managerów i pracowników do projektów.