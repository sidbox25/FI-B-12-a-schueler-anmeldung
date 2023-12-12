<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Zielverzeichnis für den Dateiupload festlegen
    $uploadDir = '/pfad/zum/zielverzeichnis/'; // Passe den Pfad zum Zielverzeichnis an

    // Überprüfen, ob das Verzeichnis existiert und beschreibbar ist
    if (!is_dir($uploadDir) || !is_writable($uploadDir)) {
        die("Das Zielverzeichnis existiert nicht oder ist nicht beschreibbar.");
    }

    // Überprüfen, ob eine Datei hochgeladen wurde
    if (isset($_FILES['uploadFile']) && $_FILES['uploadFile']['error'] === UPLOAD_ERR_OK) {
        $uploadedFile = $_FILES['uploadFile'];
        
        // Dateityp überprüfen (nur PDF-Dateien erlauben)
        $allowedTypes = ['application/pdf'];
        $fileType = mime_content_type($uploadedFile['tmp_name']);
        
        if (!in_array($fileType, $allowedTypes)) {
            echo "Es sind nur PDF-Dateien erlaubt.";
        } else {
            // Dateinamen sicher behandeln und in das Zielverzeichnis verschieben
            $fileName = basename($uploadedFile['name']);
            $destination = $uploadDir . $fileName;
            
            if (move_uploaded_file($uploadedFile['tmp_name'], $destination)) {
                echo "Die Datei wurde erfolgreich hochgeladen.";
            } else {
                echo "Beim Hochladen der Datei ist ein Fehler aufgetreten.";
            }
        }
    } else {
        echo "Es wurde keine Datei ausgewählt oder ein Fehler ist aufgetreten.";
    }
} else {
    // Falls keine POST-Anfrage erfolgt, zeige die Liste der Dateien im Verzeichnis an
    $files = scandir($uploadDir);
    echo "<h1>Liste der Dateien:</h1>";
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<a href='$uploadDir/$file' download>$file</a><br>";
        }
    }
}
?>

<!-- HTML-Formular für den Dateiupload -->
<form method="post" enctype="multipart/form-data">
    <input type="file" name="uploadFile">
    <input type="submit" value="Datei hochladen">
</form>
