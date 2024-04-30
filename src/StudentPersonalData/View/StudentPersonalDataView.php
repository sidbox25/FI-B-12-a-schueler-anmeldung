<?php

namespace src\StudentPersonalData\view;
class StudentPersonalDataView
{
    public function createStudentPersonalDataInputForm(array $data)
    {
        echo '
<main class="personal_container">
<h1>Persönliches</h1>
<div class="header_personal_data"></div>
<div class="personal_data_body">

  <form class="personal_data_form" method="post">
  <h4>Personal Daten</h4>
  <label for="fname">Vorname</label>
  <input type="text" id="fname" name="firstname" placeholder="Vorname...">  
  
  <label for="lname">Vorname</label>
  <input type="text" id="lname" name="lastname" placeholder="Nachname...">

  <label for="email_address">Email </label>
  <input type="email" name="email_address" id="email_address" placeholder="Email-Adresse...">

 <fieldset required>
  <legend>Geschlecht:</legend>
  <label> <input type="radio" name="geschlecht" id="radio_maenlich" required value="maenlich"> männlich </label>
  <label> <input type="radio" name="geschlecht" id="radio_weiblich" required value="weiblich"> weiblich </label>
  <label> <input type="radio" name="geschlecht" id="radio_divers" required value="divers"> divers </label>
</fieldset>

  <label for="pickup_time">Geboren am:</label>
  <input type="date" name="pickup_time" id="pickup_time" placeholder="" required>
    
    <label for="nationality">Staatsangehörigkeit</label>
    <input type="text" id="nationality"  placeholder="Staatsangehörigkeit..">
    
    <label for="phone">Handy Nummer</label>
    <input type="text" id="phone"  placeholder="Handynummer..">
    
    <label for="telephone">Telefon</label>
    <input type="text" id="telephone"  placeholder="Telefon..">
    
    <div class="permission_container">
      
      <label for="permission">Zustimmung zur Verwendung</label>
      <label>Ja, die Rahel-Hirsch-Schule darf Fotos von mir verwenden</label>
      <label>Ich erteile hiermit der Rahel-Hirsch-Schule die jederzeit widerrufliche Erlaubnis, für schulische Zwecke (z.B. auf der Webseite der Schule, in Schulbroschüren, etc.) Fotos oder Abbildungen, auf denen ich zu erkennen bin, zu verwenden</label>
      <input type="checkbox" id="permission" name="permission">
      </div>

    <a class="prev-page-btn" href="/">
    <img src="/src/Core/assets/images/prev-arrow.png" class="prev-page" alt="Vorherige Seite">
    </a>
    <button class="weiter-schoolvisit-btn" type="submit">
        <img src="/src/Core/assets/images/next-arrow.png" class="next-page" alt="Nächste Seite">
    </button>
   
  </form>
  </div>
</div>
</main>

<style>

.personal_data_body {
display: flex;
justify-content: center;
align-items: center;
flex-direction: column;
}
.header_personal_data {
background-color: #ef9b49;
height: 2%;
}
  .personal_data_form > * {
   font-size: 1.4em; 
  }
  .personal_data_form {
    display: grid;
    grid-template-columns: [labels] 30% [controls] 70%;
    grid-auto-flow: row;
    grid-gap: .8em .5em;
    background: rgba(243,234,234,0.43);
    padding: 1.2em;
    width: 97%;
  }
  .personal_data_form > label,
  .personal_data_form > fieldset  {
    grid-column: labels;
  }
  .personal_data_form > input, 
  .personal_data_form > select,
  .personal_data_form > textarea,
  .personal_data_form > button {
    grid-column: controls;
    padding: .4em;
    border: 0;
  }
  .personal_data_form > fieldset {
    grid-column: span 2;
  }  
  .personal_data_form > a {
    background-color: rgb(206,107,45);
    color: white;
    border: 5px solid #f8f6f6;;
    border-radius: 5px;
    font-size:  1.3rem;
    font-weight: bold;
    padding: 1.5rem 1.2rem 1.5rem 1.2rem;
    text-align: center;
    text-decoration: none;
      grid-column-start: 1;
      grid-column-end: 3;
    }
  .personal_data_form > textarea {
    min-height: 3em;
    }
    
    .personal_data_form > .permission_container{
    margin-top: 2rem;
         grid-column-start: 1;
      grid-column-end: 3;
    }

    .next-page {
      width: 5%;
      height: auto;
      float:right;
      margin-right:10%;
    }
    .prev-page {
      width: 5%;
      height: auto;
      }
    
    #permission {
    height: 2rem;
    width: 2rem;
    }
    
</style>

';

    }
}
