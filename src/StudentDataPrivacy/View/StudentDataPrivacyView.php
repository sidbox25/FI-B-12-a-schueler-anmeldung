<?php

namespace src\StudentDataPrivacy\View;

class StudentDataPrivacyView
{

    public function createStudentDataPrivacyForm()
    {
        echo '
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
        <form id="form-datenschutz" method="post">
            <input type="checkbox" name="privacyCheckbox" id="privacyCheckbox"> Ich nehme die <a href="deine_datei.pdf" target="_blank">Datenschutzerklärung</a> zur Kenntnis und willige der elektronischen Datenverarbeitung zu.
            <p>Das ist Seite 1 von 7. Bitte füllen Sie alle Seiten aus. Klicken Sie auf weiter.</p>
            
        <div class="back-next-page-bar">
        <a class="next-back-page" href="/">
            <img src="/src/Core/assets/images/prev-arrow.png" class="next-back-page" alt="Vorherige Seite">
        </a>
        <a class="next-back-page" href="/persoenliche_daten" onclick="document.getElementById(\'form-datenschutz\').submit();">' .
            '<img src="/src/Core/assets/images/next-arrow.png" class="next-back-page" alt="Nächste Seite">' .
            '</a>' .
        '</div>
            
        </form>
        
    </div>
<style>
.next-back-page {
    height: 20% !important;
    width: 20% !important;

}

</style>
        ';
    }
}