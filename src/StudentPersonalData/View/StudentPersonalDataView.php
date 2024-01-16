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
    <input type="text" id="fname" name="firstname" placeholder="Your name..">
   </div>
   <div class="lname_row">
    <label for="lname">Familienname</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
    </div>

  <p>Geschlecht:</p>
<label for="man">männlich</label><br>
 <input type="radio" id="man">
<label for="woman">weiblich</label><br>
<input type="radio" id="woman">
 <label for="divers">divers</label>
<input type="radio" id="divers" name="fav_language" value="JavaScript">

   <div class="birthday_row">
    <label for="birthday">Geboren Am</label>
    <input type="text" id="birthday"  placeholder="Your birthday..">
    </div>
    
       <div class="birth_place_row">
    <label for="birth_place">Geburtsort</label>
    <input type="text" id="birth_place" placeholder="Yourbirth_place..">
    </div>
    
       <div class="nationality_row">
    <label for="nationality">Staatsangehörigkeit</label>
    <input type="text" id="nationality"  placeholder="Your nationality..">
    </div>       
    
    <div class="phone_row">
    <label for="phone">Handy Nummer</label>
    <input type="text" id="phone"  placeholder="Your phone..">
    </div>    
    
    <div class="telephone_row">
    <label for="telephone">Telefon</label>
    <input type="text" id="telephone"  placeholder="Your phone..">
    </div>    
    
    <div class="email_row">
    <label for="email">Telefon</label>
    <input type="text" id="email"  placeholder="Your email..">
    </div>
    <div class="checkbox_row">
    <span class="checkmark">Zustimmung zur Verwendung</span>
    <input type="checkbox" checked="checked">
    <p>Ja, die Rahel-Hirsch-Schule darf Fotos von mir verwenden</p>
    <p>Ich erteile hiermit der Rahel-Hirsch-Schule die jederzeit widerrufliche Erlaubnis, für shculische Zwecke (z.B auf der Webseite der Schule, in Schulbroschüren, etc.) Fotos oder Abbildungen, auf denen ich zu erkennen bin, zu verwenden</p>
    </div>

    <!-- Upload file -->
    <h2>Upload a file</h2>
    <form method="post" enctype="multipart/form-data">
        <input type="file"  accept=".pdf,.jpg,.png"/>
        <br /><br />
        <button type="submit" name="submit">Upload</button>
    </form>
</div>

  </form>
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
