# Festgelegte SQL-Naming Conventions
Konventionen für Tabellen- und Spaltennamen.

### Tabellennamen
- klein geschrieben
- Plural
- Snake_case

### Spaltennamen
- klein geschrieben
- Singular
- Snake_case
- Schlüsselattribute kennzeichnen mit "p_" für Primary-, "f_" für Foreign-Key
- Schlüsselattribute enden mit "_id", "_nr", ...



### Beispiel:
#### chosen_options
- p_chosen_option_id *int* PRIMARY KEY
- chosen_option *int*

Besprochen am 14.02.24
