<?php

namespace src\HomePage\HomePageView;

class HomePageView
{

    public function render()
    {
        echo '
            <header>
                <img id="logo" src="src/HomePage/HomePageView/assets/logo.png"">
                <h1 class="header-text">Anmeldung zur Ausbildung als MFA / ZFA an der Rahel-Hirsch-Schule</h1>
            </header>
        <main>
        <div class="homepage-container">
            <button class="login-btn">
                Anmelden
            </button>
         </div>
        </main>

  ';
    }
}
