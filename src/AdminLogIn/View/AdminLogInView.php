<?php

namespace src\AdminLogIn\View;
class AdminLogInView
{

    public function createTable(array $daten)
    {
        echo '<!DOCTYPE html>
        <html lang="de">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                }
                #logo {
                    max-width: 100px; /* Adjust the max-width as needed */
                    height: auto;
                    margin-bottom: 10px; /* Add margin to separate the logo from the header text */
                    margin-right: 10px
                }
        
                header {
                    background: linear-gradient(to right, #A9A9A9, #D3D3D3); /* Gradient from - to */
                    color: #ffffff; /* Change the text color as needed */
                    padding: 20px;
                    text-align: center;
                    display: flex; /* Use flexbox for layout */
                    align-items: center;
                }
        
                main {
                    padding: 20px;
                }
        
                h1 {
                    color: #2c3e50; /* Change the color as needed */
                    margin-bottom: 50px;
                }

                h3 {
                    color: #7f8c8d; /* Change the color as needed */
                }
        
                h4 {
                    color: #7f8c8d; /* Change the color as needed */
                }
            </style>
            <title>Anmeldung zur Ausbildung</title>
        </head>
        <body>
            <header>
                <img id="logo" src="0ntm06fu.bmp" alt="Your Logo">
                <h2>Anmeldung zur Ausbildung als MFA / ZFA an der Rahel-Hirsch-Schule</h2>
            </header>
        
            <main>
            <h1>Admin Login</h1>
            
                <label for="username">Username:</label>
                <input type="text" id="username" name="username" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>

                <button type="submit">Login</button>
                
                <p><a href="src\ForgotPassword\View\ForgotPasswordView.php">Forgot Password?</a></p>

        </main>
        </body>
        </html>
        ';
    }
}
