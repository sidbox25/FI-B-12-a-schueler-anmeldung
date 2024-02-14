<?php

namespace src\StudentDataPrivacy\View;

class StudentDataPrivacyView
{

    public function createStudentDataPrivacyForm()
    {
        echo '
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anmeldung zur Ausbildung als MFA / ZFA an der Rahel-Hirsch-Schule</title>
</head>
<body>

    <?php
    // Überprüfe, ob das Formular abgesendet wurde
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Überprüfe, ob die Checkbox gesetzt ist
        if (isset($_POST["privacyCheckbox"]) && $_POST["privacyCheckbox"] == "on") {
            // Leite zur nächsten Seite weiter (Weiterleitung zu Seite 2 ersetzen)
            header("Location: https://www.google.com");
            exit();
        } else {
            // Zeige eine Warnung, wenn die Checkbox nicht gesetzt ist
            echo "Bitte stimmen Sie der Datenschutzerklärung zu.";
        }
    }
    ?>

    <div>
        <p>
        Wir freuen uns, dass Sie sich an der Rahel-Hirsch-Schule zu einer Ausbildung anmelden möchten!
        <br>
        <br>
        Bei der Online-Anmeldung werden temporär verschiedene personenbezogene Daten erhoben. Personenbezogene Daten sind Daten, mit denen Sie persönlich identifiziert werden können. Die vorliegende <a href="deine_datei.pdf" target="_blank">Datenschutzerklärung</a> erläutert, welche Daten wir im Rahmen der Online-Anmeldung erheben und wofür wir sie nutzen. Sie erläutert auch, wie und zu welchem Zweck das geschieht.
        <br>
        <br>
        Sie haben neben der Nutzung der Online-Anmeldung auch die Möglichkeit, sich direkt an der RHS zu bewerben. Hierdurch entstehen Ihnen keinerlei Nachteile. Wenn Sie der elektronischen Datenerfassung nicht zustimmen, melden Sie sich bitte in dem Schulsekretariat.
        </p>

        <h1>Datenschutz</h1>

        <!-- Formular mit Textausgabe und Checkbox -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="checkbox" name="privacyCheckbox" id="privacyCheckbox"> Ich nehme die <a href="deine_datei.pdf" target="_blank">Datenschutzerklärung</a> zur Kenntnis und willige der elektronischen Datenverarbeitung zu.
            <input type="submit" value="Weiter">    
        </form>
        <p><?php echo "Das ist Seite 1 von 7. Bitte füllen Sie alle Seiten aus. Klicken Sie auf weiter."; ?></p>
    </div>

</body>
</html>

        ';
    }
}