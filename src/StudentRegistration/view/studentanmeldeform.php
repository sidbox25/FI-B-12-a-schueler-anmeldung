<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP HTML Tabelle</title>
</head>
<body>

<?php
// Dummy-Daten für die Tabelle
$daten = array(
    array("Name", "Alter", "Stadt"),
    array("Max Mustermann", 25, "Musterstadt"),
    array("Erika Musterfrau", 30, "Teststadt"),
    array("John Doe", 22, "Example City")
);

// HTML-Tabelle erstellen
echo "<table border='1'>";
foreach ($daten as $row) {
    echo "<tr>";
    foreach ($row as $cell) {
        echo "<td>$cell</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>