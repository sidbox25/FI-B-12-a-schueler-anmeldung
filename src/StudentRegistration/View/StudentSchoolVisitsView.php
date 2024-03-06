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
        <label for="schulabschluss">Schulabschluss:</label>
        <select id="schulabschluss" name="schulabschluss">
            <option value="berufsbildungsreife">Berufsbildungsreife</option>
            <option value="erweiterte_berufsbildungsreife">Erweiterte Berufsbildungsreife</option>
            <option value="mittlerer_schulabschluss">Mittlerer Schulabschluss</option>
            <option value="fachabitur">Fachabitur</option>
            <option value="fachabitur_schriftlich">Fachabitur schriftl. Teil</option>
            <option value="ohne">Ohne</option>
        </select>
            <p style="margin-top: 10px; font-style: italic;">Wählen Sie hier nur Ihren zuletzt erreichten Schulabschluss aus.</p>
    </div>

    <div class = "container">
        <label for="last_school">Zuletzt besuchte Schule:</label>
        <input type="text" id="last_school" name="last_school" title="Zuletzt besuchte Schule">
    </div>

    <div class = "container">
        <label for="completion_year">Abschluss-/Abgangsjahr:</label>
        <input type="text" id="completion_year" name="completion_year" title="Abschluss-/Abgangsjahr">
    </div>

    <div class = "container">
        <label for="abgeschlossener_lehrgang">Abgeschlossener Lehrgang:</label>
        <select id="abgeschlossener_lehrgang" name="abgeschlossener_lehrgang">
            <option value="IBA">IBA</option>
            <option value="BQL">BQL</option>
            <option value="BV">BV</option>
            <option value="Willkommensklasse">Willkommensklasse</option>
            <option value="Keinen">Keinen</option>
        </select>
    </div>

    <div class = "container">
        <p>Neu an der Rahel-Hirsch-Schule?</p>
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

    <button  type="submit"><a href="/schultage">Weiter</a</button>
</form>
</body>

<style>
    #bisheriger_schulbesuch {
        background-color: #FF9C00;
        color: white;
    }

    .wrapper {
        display: grid;
        /*grid-template-columns: [first] 30% [second] 70%;*/
        rid-template-columns: [first] 40px [line2] 50px [line3] auto [col4-start] 50px [five] 40px [end];
        grid-template-rows: [row1-start] 25% [row1-end] 100px [third-line] auto [last-line];
    }

    .container1 {
        display: grid;
        grid-template-columns: auto;
        grid-column-start: 1;
        grid-column-end: 2;
    }

    /*.container {
        display: grid;
        /*grid-gap: 10px;*/
        /*grid-template-columns: [left] 10fr [middle1] 10fr [middle2] 10fr [right];*/
        grid-template-columns: auto auto auto auto;
        border: 1px solid;
        border-color: white;
        width: 90%;
        padding: 4px;
    }*/
</style>
';
    }

}