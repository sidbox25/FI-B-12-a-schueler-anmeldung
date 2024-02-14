<?php

namespace src\StudentPersonalData\view;
class StudentPersonalDataView
{
    public function createStudentPersonalDataInputForm(array $data)
    {
        echo '
<div class="header_personal_data">
OSZIMT Schule
</div>
<div class="personal_data_container" >
<h1>Persönliches</h1>
<h4>Personal Daten</h4>
  <form class="personal_data">
  <div class="fname_row">
    <label for="fname">Vorname</label>
    <input type="text" id="fname" name="firstname" placeholder="Ihr Vorname">
   </div>
   <div class="lname_row">
    <label for="lname">Familienname</label>
    <input type="text" id="lname" name="lastname" placeholder="Ihr Nachname">
    </div>

<fieldset>
  <legend>Geschlecht:</legend>
  <label for="male">
    <input type="radio" id="male" name="gender" value="male">
    männlich
  </label><br>
  <label for="female">
    <input type="radio" id="female" name="gender" value="female">
    weiblich
  </label><br>
  <label for="diverse">
    <input type="radio" id="diverse" name="gender" value="diverse">
    divers
  </label>
</fieldset>

<div class="birthday_row">
  <label for="birthday">Geboren am</label>
  <input type="date" id="birthday" name="birthday" placeholder="TT.MM.JJJJ" required>
</div>

<div class="birth_place_row">
  <label for="birth_place">Geburtsort</label>
  <input type="text" id="birth_place" name="birth_place" placeholder="Geburtsort.." required>
</div>


<div class="nationality_row">
  <label for="nationality">Staatsangehörigkeit</label>
  <input type="text" id="nationality" name="nationality" placeholder="Staatsangehörigkeit.." required>
</div>  
    
  <div class="phone_row">
  <label for="phone">Handynummer</label>
  <input type="tel" id="phone" name="phone" placeholder="Handynummer.." required>
</div>

<div class="telephone_row">
  <label for="telephone">Telefon</label>
  <input type="tel" id="telephone" name="telephone" placeholder="Telefonnummer.." required>
</div>

<div class="email_row">
  <label for="email">E-Mail</label>
  <input type="email" id="email" name="email" placeholder="E-Mail-Adresse.." required>
</div>

<div class="checkbox_row">
  <input type="checkbox" id="photo_permission" name="photo_permission" checked>
  <label for="photo_permission">Zustimmung zur Verwendung</label>
  <p>Ja, die Rahel-Hirsch-Schule darf Fotos von mir verwenden</p>
  <p>Ich erteile hiermit der Rahel-Hirsch-Schule die jederzeit widerrufliche Erlaubnis, für schulische Zwecke (z.B. auf der Webseite der Schule, in Schulbroschüren, etc.) Fotos oder Abbildungen, auf denen ich zu erkennen bin, zu verwenden</p>
</div>

<!-- Weiter button -->
<div class="button_row">
  <button type="submit">Weiter</button>
</div>
<style>
* {
    box-sizing: border-box;
}

input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
}

label {
    padding: 12px 12px 12px 0;
    display: inline-block;
}

input[type=submit] {
    background-color: #04AA6D;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}


.personal_data {
    display: flex;
    flex-direction: column;
}
.personal_data_container {
border: ;
   background-color: #ffffff;
   padding: 40px;
   width: 50%;
   height: 50%;
   margin-left: auto;
   margin-right: auto;
}

.header_personal_data {
background-color: #b46445;
}

</style>';

    }
}
