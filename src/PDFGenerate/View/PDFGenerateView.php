<?php

namespace src\PDFGenerate\View;
class PDFGenerateView
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

                form {
                    display: inline-block; /* Center the form */
                    text-align: left; /* Align the form content to the left */
                }

                label {
                    display: block; /* Stack labels vertically */
                    margin-bottom: 10px; /* Add space between labels */
                }

                input {
                    width: 100%; /* Make the input fields full-width */
                    box-sizing: border-box; /* Include padding and border in the width */
                    margin-bottom: 15px; /* Add space between input fields */
                }

            </style>
            <title>Anmeldung zur Ausbildung</title>
        </head>
        <body>
            <header>
                <img id="logo" src="0ntm06fu.bmp" alt="Your Logo">
                <h2>Change Password</h2>
            </header>
        
            <main>
                <form action="process_change_password.php" method="post">
                    <label for="username">Enter Username:</label>
                    <input type="text" id="username" name="username" required>

                    <label for="new_password">Enter New Password:</label>
                    <input type="password" id="new_password" name="new_password" required>

                    <label for="confirm_password">Reenter New Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" required>

                    <button type="submit">Update Password</button>
                </form>
            </main>
        </body>
        </html>
        ';
    }
}
