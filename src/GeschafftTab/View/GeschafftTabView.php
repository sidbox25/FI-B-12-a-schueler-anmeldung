<?php

namespace src\GeschafftTab\View;
class GeschafftTabView
{

    public function createTable(array $daten)
    {
        echo '   
            <main>
                <h1>Geschafft!</h1>
                <h4>Ihre Daten wurden an das Sekretariat der Rahel-Hirsch-Schule gesendet.<br> 
                Sie müssen sich jetzt noch persönlich im Sekretariat der Rahel-Hirsch-Schule vorstellen. </h4>
                <h4>Bitte gehen Sie mit Ihrem Ausbildungsvertrag bzw. dem Bestätigungsschreiben der Praxis in das Sekretariat um die Anmelddung abzuschließen. </h4>
                <h4>Öffnungszeiten: Mo-Fr von 8:00 – 12:00 Uhr. </h4>

                <!--E-Mail-Button-->
                <p>Anmeldung per E-Mail erhalten:</p>
                <form action="formular.php" method="post">
                    <input type="submit" value="Senden">
                </form>
            </main>
        ';
    }
}
