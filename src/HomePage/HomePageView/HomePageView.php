<?php

namespace src\HomePage\HomePageView;

class HomePageView
{

    public function render()
    {
        echo '
        <main>
        <div class="homepage-container">
            <a class="login-btn" href="/schulbesuch">
                Anmelden
            </a>
         </div>
        </main>

  ';
    }
}
