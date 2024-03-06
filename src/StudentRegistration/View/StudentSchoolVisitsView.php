<?php

namespace src\StudentRegistration\View;

class StudentSchoolVisitsView
{

    public function showForm($saved = null)
    {
        echo '<body>

<form>
    <h1>Schulbesuch</h1>
    <p id = "bisheriger_schulbesuch">Bisherige Schulbesuche</p>

    <div class = "container">
        <div class = "containerWhite">
            <label for="schulabschluss">Schulabschluss:</label>
            <p style="margin-top: 5px; font-style: italic; font-size: 9pt; color: grey">Wählen Sie hier nur Ihren zuletzt erreichten Schulabschluss aus.</p>
        </div>
        <div>
        <select id="schulabschluss" name="schulabschluss">
            <option value="berufsbildungsreife">Berufsbildungsreife</option>
            <option value="erweiterte_berufsbildungsreife">Erweiterte Berufsbildungsreife</option>
            <option value="mittlerer_schulabschluss">Mittlerer Schulabschluss</option>
            <option value="fachabitur">Fachabitur</option>
            <option value="fachabitur_schriftlich">Fachabitur schriftl. Teil</option>
            <option value="ohne">Ohne</option>
        </select>
        </div>
    </div>

    <div class = "container">
        <label class = "containerWhite", for="last_school">Zuletzt besuchte Schule:</label>
        <div>
            <input type="text" id="last_school" name="last_school" title="Zuletzt besuchte Schule">
        </div>
    </div>

    <div class = "container">
        <label class = "containerWhite", for="completion_year">Abschluss-/Abgangsjahr:</label>
        <div>
            <input type="text" id="completion_year" name="completion_year" title="Abschluss-/Abgangsjahr">
        </div>
    </div>

    <div class = "container">
        <label class = "containerWhite", for="abgeschlossener_lehrgang">Abgeschlossener Lehrgang:</label>
        <div>
            <select id="abgeschlossener_lehrgang" name="abgeschlossener_lehrgang">
                <option value="IBA">IBA</option>
                <option value="BQL">BQL</option>
                <option value="BV">BV</option>
                <option value="Willkommensklasse">Willkommensklasse</option>
                <option value="Keinen">Keinen</option>
            </select>
        </div>
    </div>

    <div class = "container">
        <div class = "containerWhite">
            <p>Neu an der Rahel-Hirsch-Schule?</p>
        </div>
        <div>
            <label>
                <input type="checkbox" name="neu_an_der_schule" value="ja"> Ja, ich bin neu an der Rahel-Hirsch-Schule
            </label>

            <label>
                <input type="checkbox" name="neu_an_der_schule" value="war_schueler"> Ich war bereits Schüler*in der Rahel-Hirsch-Schule
            </label>
            <label>
                <input type="checkbox" name="neu_an_der_schule" value="aktuell_schueler"> Ich bin aktuell Schüler*in der Rahel-Hirsch-Schule
            </label>
        </div>
    </div>
    <a class="weiter-schoolvisit-btn" href="/schultage">Weiter</a>
</form>
</body>

<style>
    #bisheriger_schulbesuch {
        background-color: #FF9C00;
        color: white;
    }

    .container {
        display: grid;
        grid-template-columns: [left] 10fr [middle1] 15fr [middle2] 15fr [right];
        grid-template-rows: auto;
        grid-column-start: 1;
        grid-column-end: 2;
        grid-gap: 10px;
        border: 1px solid;
        border-color: white;
        width: 90%;
        padding: 1px;
    }

    .containerWhite {
        background-color: white;
    }

</style>
';
    }
}