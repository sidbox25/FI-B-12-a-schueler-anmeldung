<?php

namespace src\StudentRegistration\view;
class StudentRegistrationView
{

    public function createTable(array $daten)
    {
        echo "<table border='1'>";
        foreach ($daten as $row) {
            echo "<tr>";
            foreach ($row as $cell) {
                echo "<td>$cell</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
