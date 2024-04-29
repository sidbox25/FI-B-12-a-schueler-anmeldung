<?php

namespace src\HomePage\HomePageView;

class HomePageView
{

    public function render()
    {
        echo '
        <main>
        <div class="homepage-container scale-up-center">
            <a class="login-btn scale-up-center" href="/schulbesuch">
                Anmelden
            </a>
         </div>
        </main>

  ';
    }
}
