<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bitte laden Sie hier Ihren Ausbildungsvertrag hoch</title>
</head>
<body>
    <p>
        Ihre Daten wurden an das Sekretariat der Rahel-Hirsch-Schule gesendet. 
        Haben Sie Ihren Ausbildungsvertrag hochgeladen, so ist der Anmeldevorgang abgeschlossen und Sie erhalten in den kommenden Wochen ein Schreiben der Schule.
        Haben Sie Ihren Ausbildungsvertrag nicht hochgeladen, müssen Sie ihren Ausbildungsvertrag in Kopie an die Rahel-Hirsch-Schule senden oder ihn persönlich im Sekretariat der Rahel-Hirsch-Schule abgeben.
    </p>

    <form method="post" enctype="multipart/form-data">
        <label for="uploadFile">Datei auswählen:</label>
        <input type="file" name="uploadFile" id="uploadFile" required>
        <input type="submit" value="Datei hochladen">
    </form>

    <p>Aktuelles Upload-Verzeichnis: <?php echo htmlspecialchars($uploadDirectory, ENT_QUOTES, 'UTF-8'); ?></p>

    <!-- Weiter-Button -->
    <button onclick="window.location.href='/weiter'">Weiter</button>
</body>
</html>
