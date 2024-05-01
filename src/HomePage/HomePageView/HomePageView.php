<?php

namespace src\HomePage\HomePageView;

class HomePageView
{

    public function render()
    {
        echo '
        <main>
        <div class="homepage-container scale-up-center">
          <a class="button" href="/datenschutz">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            Anmelden
          </a>
         </div>
        </main>

  ';
    }
}
