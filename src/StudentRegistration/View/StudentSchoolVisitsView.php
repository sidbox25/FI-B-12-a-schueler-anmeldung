<?php

namespace src\StudentRegistration\View;

class StudentSchoolVisitsView
{

    public function showForm($saved = null)
    {
        echo '<body>

<form>
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

    <label for="last_school">Zuletzt besuchte Schule:</label>
    <input type="text" id="last_school" name="last_school" title="Zuletzt besuchte Schule">

    <label for="completion_year">Abschluss-/Abgangsjahr:</label>
    <input type="text" id="completion_year" name="completion_year" title="Abschluss-/Abgangsjahr">

    <label for="abgeschlossener_lehrgang">Abgeschlossener Lehrgang:</label>
    <select id="abgeschlossener_lehrgang" name="abgeschlossener_lehrgang">
        <option value="IBA">IBA</option>
        <option value="BQL">BQL</option>
        <option value="BV">BV</option>
        <option value="Willkommensklasse">Willkommensklasse</option>
        <option value="Keinen">Keinen</option>
    </select>

    <p style="margin-top: 10px;">Neu an der Rahel-Hirsch-Schule?</p>
    <label>
        <input type="checkbox" name="neu_an_der_schule" value="ja"> Ja, ich bin neu an der Rahel-Hirsch-Schule
    </label>

    <label>
        <input type="checkbox" name="neu_an_der_schule" value="war_schueler"> Ich war bereits Schüler*in der Rahel-Hirsch-Schule
    </label>

    <label>
        <input type="checkbox" name="neu_an_der_schule" value="aktuell_schueler"> Ich bin aktuell Schüler*in der Rahel-Hirsch-Schule
    </label>

    <button  type="submit"><a href="/schultage">Weiter</a</button>
</form>

</body>';
    }

}