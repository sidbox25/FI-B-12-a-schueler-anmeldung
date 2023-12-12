<?php
  $host_name = '***';
  $database = 'dbs257254';
  $user_name = '***';
  $password = '***';
  $connect = mysqli_connect($host_name, $user_name, $password, $database);
  $tabelle= "ft_form_13"; /* Name der Tabelle, kann frei gewaehlt werden */
  if (mysqli_connect_errno()) {
    die('<p>Verbindung zum MySQL Server fehlgeschlagen: '.mysqli_connect_error().'</p>');
  } else {
    echo '<p>Verbindung zum MySQL Server erfolgreich aufgebaut.</p >';
  }
  
  
$result=MYSQL_QUERY("SELECT name, email
FROM $tabelle
WHERE (name = 'IONOS' OR INSTR(LCASE(email), 'united'))
ORDER BY NAME DESC LIMIT 3
");

/* Ausgabe der Tabelle in einer HTML-Table */
echo "<table border=\"1\" align=center width=50%";
echo "<tr>";
echo "<div color=\"#ffff00\">";
while ($field=mysql_fetch_field($result)) {
echo "<th>$field->name</A></th>";
}
echo "</font></tr>";
while($row = mysql_fetch_row($result)) {
echo "<tr>";
for($i=0; $i < mysql_num_fields($result); $i++) {
echo "<td align=center>$row[$i]</td>";
}
echo "</tr>\n";
}
echo "</table>";

MYSQL_CLOSE();

?>