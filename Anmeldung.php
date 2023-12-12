<?PHP

require('fpdf.php');

$hostname = "***";
$username = "***";
$password = "***";
$db = "dbs257254";

$dbconnect=mysqli_connect($hostname,$username,$password,$db);


if ($dbconnect->connect_error) {
  die("Database connection failed: " . $dbconnect->connect_error);
}
session_start(); //startet die Session
$column = $_POST['column']; 
$logo = "AB-Logo.png";

/* --- creating class with UTF8  --- */
class PDF extends FPDF {

    function Cell( $w, $h = 0, $t = '', $b = 0, $l = 0, $a = '', $f = false, $y = '' ) {

        parent::Cell( $w, $h, iconv( 'UTF-8', 'windows-1252', $t ), $b, $l, $a, $f, $y );

    }

}

$pdf = new PDF();
$pdf->AddPage('P', 'A4');
$pdf->SetAutoPageBreak(true, 10);
$pdf->SetFont('Arial', '', 9);
$pdf->SetTopMargin(10);
$pdf->SetLeftMargin(10);
$pdf->SetRightMargin(10);

$query = mysqli_query($dbconnect, "SELECT * FROM ft_form_13 WHERE submission_id = $column")
   or die (mysqli_error($dbconnect));

while($row = mysqli_fetch_array($query)){

/* --- Logo --- */
$pdf->Image($logo, 152, 5, 46, 23);

/* --- Check MFA_ZFA --- */
$pdf->SetFontSize(14);
$pdf->Text(100, 26, 'MFA');
$pdf->SetFontSize(14);
$pdf->Text(122, 26, 'ZFA');

if($row[MFA_ZFA]=="MFA")
{
$pdf->Rect(95, 23, 3, 3, 'DF');
$pdf->Rect(117, 23, 3, 3, 'D');
}
else
{
$pdf->Rect(95, 23, 3, 3, 'D');
$pdf->Rect(117, 23, 3, 3, 'DF');
}

/* --- Überschrift --- */
$pdf->SetFont('Arial', '', 20);
$pdf->Text(10, 20, utf8_decode('Personalbogen Schüler*in'));
$pdf->SetFont('Arial', '', 16);
$pdf->Text(10, 26, 'Anmeldung zur Ausbildung als');

/* --- Tabelle Angaben zu Person ------------------------------------------ */
$pdf->SetTextColor(180, 180, 180);
$pdf->SetXY(10, 30);
$pdf->SetFont('', 'B', 9);
$pdf->Cell(0, 4, 'Angaben zur Person', 0, 1, 'L', false);
$pdf->SetTextColor(0);
$pdf->SetFont('');

/* --- Tabelle Zeichnen --- */
$pdf->Rect(10, 30, 190, 71.5, 'D');
$pdf->Rect(10, 34, 190, 6, 'D');
$pdf->Rect(10, 40, 190, 6, 'D');
$pdf->Rect(10, 46, 190, 6, 'D');
$pdf->Rect(10, 52, 190, 6, 'D');
$pdf->Rect(10, 58, 190, 6, 'D');
$pdf->Rect(10, 64, 190, 6, 'D');
$pdf->Rect(10, 70, 190, 6, 'D');
$pdf->Rect(10, 76, 190, 6, 'D');
$pdf->Rect(10, 82, 190, 6, 'D');
  
$pdf->Rect(119, 52, 17.6, 6, 'D');
$pdf->Rect(73.3, 76, 63.3, 12, 'D');
$pdf->Rect(10, 40, 23, 6, 'D');
$pdf->Rect(104.95, 40, 31.65, 6, 'D');
$pdf->Rect(10, 52, 23, 6, 'D');
  
$pdf->Rect(10, 34, 63.3, 36, 'D');
$pdf->Rect(73.3, 34, 63.3, 36, 'D');
$pdf->Rect(136.6, 34, 63.3, 36, 'D');

/* --- Vorname --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 36, 'Vorname');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 36);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Vorname'], 0, 1, 'L', false);

/* --- Name --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 36, 'Name');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 36);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Name'], 0, 1, 'L', false);

/* --- check Geschlecht --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 36, 'Geschlecht');
$pdf->SetTextColor(0);

if($row[Geschlecht]=="w")
{
$pdf->Rect(141, 36.5, 3, 3, 'DF');
$pdf->Rect(161, 36.5, 3, 3, 'D');
$pdf->Rect(181, 36.5, 3, 3, 'D');
$pdf->SetFontSize(9);
$pdf->Text(145, 39.5, 'weiblich');
$pdf->Text(165, 39.5, utf8_decode('männlich'));
$pdf->Text(185, 39.5, 'divers');
}
else if ($row[Geschlecht]=="m")
{
$pdf->Rect(161, 36.5, 3, 3, 'DF');
$pdf->Rect(141, 36.5, 3, 3, 'D');
$pdf->Rect(181, 36.5, 3, 3, 'D');
$pdf->SetFontSize(9);
$pdf->Text(165, 39.5, utf8_decode('männlich'));
$pdf->Text(145, 39.5, 'weiblich');
$pdf->Text(185, 39.5, 'divers');
}
else if ($row[Geschlecht]=="d")
{
$pdf->Rect(181, 36.5, 3, 3, 'DF');
$pdf->Rect(161, 36.5, 3, 3, 'D');
$pdf->Rect(141, 36.5, 3, 3, 'D');
$pdf->SetFontSize(9);
$pdf->Text(185, 39.5, 'divers');
$pdf->Text(165, 39.5, utf8_decode('männlich'));
$pdf->Text(145, 39.5, 'weiblich');
}

/* --- geboren am --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 42, 'Geboren am');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 42);
$pdf->SetFontSize(9);
$pdf->Cell(10, 5, $row['Geboren'], 0, 1, 'L', false);

/* --- Geburtsort --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(34, 42, 'Geburtsort');
$pdf->SetTextColor(0);

$pdf->SetXY(34, 42);
$pdf->SetFontSize(9);
$pdf->Cell(25, 5, $row['Geburtsort'], 0, 1, 'L', false);

/* --- Staatsangehörigkeit --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 42, utf8_decode('Staatsangehörigkeit'));
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 42);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['Staatsangehoerigkeit'], 0, 1, 'L', false);

/* --- Geburtsland --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(105.95, 42, 'Geburtsland');
$pdf->SetTextColor(0);

$pdf->SetXY(105.95, 42);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['Geburtsland'], 0, 1, 'L', false);
  
/* --- Telefon/ Handy --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 48, 'Telefon/ Handy');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 48);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Handynummer'], 0, 1, 'L', false);

/* --- E-Mail --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 48, 'E-Mail Adresse');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 48);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Mail'], 0, 1, 'L', false);

/* --- PLZ --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 54, 'PLZ');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 54);
$pdf->SetFontSize(9);
$pdf->Cell(15, 5, $row['Postleitzahl'], 0, 1, 'L', false);

/* --- Straße --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 54, utf8_decode('Straße'));
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 54);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Strasse'], 0, 1, 'L', false);

/* --- Hausnummer --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(120, 54, utf8_decode('Hausnummer'));
$pdf->SetTextColor(0);
  
$pdf->SetXY(120, 54);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Hausnummer_Wohnort'], 0, 1, 'L', false);
  
/* --- Abweichender Wohnort --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 54, 'Ich wohne bei (falls Familienname abweicht)');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 54);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['Wohnort2'], 0, 1, 'L', false);
$pdf->Cell(30, 5, $row['Strasse2'], 0, 1, 'L', false);

/* --- Wohnort --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(34, 54, 'Wohnort');
$pdf->SetTextColor(0);

$pdf->SetXY(34, 54);
$pdf->SetFontSize(9);
$pdf->Cell(25, 5, $row['Wohnort'], 0, 1, 'L', false);

/* --- VornameMutter --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 60, 'Vorname Mutter*');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 60);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['VornameMutter'], 0, 1, 'L', false);

/* --- NameMutter --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 60, 'Name Mutter wenn abweichend*');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 60);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['NameMutter'], 0, 1, 'L', false);

/* --- TelMutter --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 60, 'Telefon/ Handy Mutter*');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 60);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['TelMutter'], 0, 1, 'L', false);

/* --- VornameVater --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 66, 'Vorname Vater*');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 66);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['VornameVater'], 0, 1, 'L', false);

/* --- NameVater --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 66, 'Name Vater wenn abweichend*');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 66);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['NameVater'], 0, 1, 'L', false);

/* --- TelVater --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 66, 'Telefon/ Handy Vater*');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 66);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['TelVater'], 0, 1, 'L', false);

/* --- Abweichende Adresse --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 72, 'Abweichende Adresse Mutter/ Vater*');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 72);
$pdf->SetFontSize(9);
$pdf->Cell(170, 5, $row['AdrMutterVater'], 0, 1, 'L', false);

/* --- VornameErz --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 78, 'Vorname Erziehungsberechtigter (falls nicht Mutter/Vater)*');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 78);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['VornameErz'], 0, 1, 'L', false);

/* --- NameErz --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 78, 'Name Erziehungsberechtiger (falls nicht Mutter/Vater)*');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 78);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['NameErz'], 0, 1, 'L', false);

/* --- TelErz --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 78, 'Telefon/ Handy Erziehungsberechtigter**');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 78);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['TelErz'], 0, 1, 'L', false);

/* --- Vorname Kontaktperson --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 84, 'Vorname Kontaktperson im Notfall');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 84);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Notfall'], 0, 1, 'L', false);

/* --- Kontaktperson im Notfall --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(74.3, 84, 'Name Kontaktperson im Notfall');
$pdf->SetTextColor(0);

$pdf->SetXY(74.3, 84);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Notfall'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Telefon Notfall --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 84, utf8_decode('Telefon/ Handy Kontaktperson für Notfall'));
$pdf->SetTextColor(0);

$pdf->SetXY(138, 84);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['TelNot'], 0, 1, 'L', false);

/* --- Check Fotos --- */
$pdf->SetFontSize(8);
$pdf->SetXY(20, 89);
$pdf->MultiCell(180, 3, "Ja, ich erteile der Rahel-Hirsch-Schule die jederzeit widerrufliche Erlaubnis, für schulische Zwecke (z.B. auf der Website der Schule,in Broschüren, etc.) Fotos, auf denen ich zu erkennen bin, zu verwenden.", 0);
if($row[FotoOK]=="JA")
{
$pdf->Rect(14, 89.5, 3, 3, 'DF');
}
else 
{
$pdf->Rect(14, 89.5, 3, 3, 'D');
}
  
/* --- Check Datenschutz --- */
$pdf->SetFontSize(8);
$pdf->SetXY(20, 96.5);
$pdf->MultiCell(180, 3, "Ich willige in die elektronische Datenverarbeitung gemäß Datenschutzerklärung ein.", 0);
if($row['Webspeicherung'] == "Ja")
{
$pdf->Rect(14, 96.5, 3, 3, 'DF');
}
else 
{
$pdf->Rect(14, 96.5, 3, 3, 'D');
}
  
/* --- Fußnote --- */
$pdf->SetY(101);
$pdf->SetFont('', '', 7.5);
$pdf->Write(5, '* Nur ausfüllen, wenn Sie noch nicht volljährig (18 Jahre) sind.');


/* --- Tabelle Ausbildungsbetrieb ------------------------------------------ */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetXY(10, 110);
$pdf->SetFont('', 'B', 9);
$pdf->Cell(0, 4, 'Ausbildungsbetrieb', 0, 1, 'L', false);
$pdf->SetTextColor(0);
$pdf->SetFont('');

/* --- Tabelle Zeichnen --- */
$pdf->Rect(10, 110, 190, 50, 'D');
$pdf->Rect(10, 114, 190, 12, 'D');
$pdf->Rect(10, 126, 190, 12, 'D');
$pdf->Rect(10, 138, 190, 12, 'D');
$pdf->Rect(63, 114, 137, 6, 'D');
$pdf->Rect(63, 120, 137, 6, 'D');
$pdf->Rect(63, 126, 137, 6, 'D');
$pdf->Rect(63, 132, 137, 6, 'D');
$pdf->Rect(63, 138, 137, 6, 'D');
$pdf->Rect(63, 144, 137, 6, 'D');
$pdf->Rect(10, 150, 190, 5, 'D');
$pdf->Rect(10, 155, 190, 5, 'D');
$pdf->Rect(137, 114, 63, 36, 'D');
$pdf->Rect(100, 120, 100, 6, 'D');
$pdf->Rect(100, 132, 100, 6, 'D');
$pdf->Rect(100, 144, 100, 16, 'D');
$pdf->Rect(119, 114, 18, 6, 'D');  
  
/* --- Ausbildungsbetrieb 1--- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 116, 'Name Ausbildungsbetrieb');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 116);
$pdf->SetFontSize(9);
$pdf->MultiCell(50, 4, $row['NameBetrieb']);

/* --- Straße --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 116, 'Strasse');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 116);
$pdf->SetFontSize(9);
$pdf->Cell(70, 5, $row['StrBetrieb'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Hausnummer --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(120, 116, 'Hausnummer');
$pdf->SetTextColor(0);

$pdf->SetXY(120, 116);
$pdf->SetFontSize(9);
$pdf->Cell(124, 5, $row['Hausnummer_Betrieb'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Ansprechpartner 1 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 116, 'Ansprechpartner (Frau/Herr)');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 116);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['NameAusbilder'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Telefon 1 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 122, 'Telefon');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 122);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['TelBetrieb'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Fax 1 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(101, 122, 'Fax');
$pdf->SetTextColor(0);

$pdf->SetXY(101, 122);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['FaxBetrieb'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- E-Mail 1 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 122, 'E-Mail');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 122);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['MailBetrieb'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Ausbildungsbetrieb 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 128, 'Bei Wechsel: Name Ausbildungsbetrieb');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 128);
$pdf->SetFontSize(9);
$pdf->MultiCell(50, 4, $row['NameBetrieb2']);

/* --- Anschrift 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 128, 'Anschrift');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 128);
$pdf->SetFontSize(9);
$pdf->Cell(70, 5, $row['AdrBetrieb2'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Ansprechpartner 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 128, 'Ansprechpartner (Frau/Herr)');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 128);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Ausbilder2'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Telefon 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 134, 'Telefon');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 134);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['TelBetrieb2'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Fax 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(101, 134, 'Fax');
$pdf->SetTextColor(0);

$pdf->SetXY(101, 134);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['Faxbetrieb2'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- E-Mail 2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 134, 'E-Mail');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 134);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['MailBetrieb2'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Ausbildungsbetrieb 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 140, 'Bei Wechsel: Name Ausbildungsbetrieb');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 140);
$pdf->SetFontSize(9);
$pdf->MultiCell(50, 4, $row['NameBetrieb3']);

/* --- Anschrift 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 140, 'Anschrift');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 140);
$pdf->SetFontSize(9);
$pdf->Cell(70, 5, $row['AdrBetrieb3'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Ansprechpartner 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 140, 'Ansprechpartner (Frau/Herr)');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 140);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Ausbilder3'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- Telefon 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(64, 146, 'Telefon');
$pdf->SetTextColor(0);

$pdf->SetXY(64, 146);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['TelBetrieb3'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
  
/* --- Fax 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(101, 146, 'Fax');
$pdf->SetTextColor(0);

$pdf->SetXY(101, 146);
$pdf->SetFontSize(9);
$pdf->Cell(30, 5, $row['FaxBetrieb3'], 0, 1, 'L', false);
$pdf->SetTextColor(0);

/* --- E-Mail 3 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(138, 146, 'E-Mail');
$pdf->SetTextColor(0);

$pdf->SetXY(138, 146);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['MailBetrieb3'], 0, 1, 'L', false);
$pdf->SetTextColor(0);
 
/* --- Schultagewunsch 1 --- */
$pdf->SetTextColor(0);
$pdf->SetFontSize(9);
$pdf->SetXY(11,151);
$pdf->Write(5, 'Schultagewunsch des Ausbildungsbetriebes (1.Wahl):');

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
  
$pdf->Rect(102, 151, 3, 3, 'D');
$pdf->Text(107, 154, 'Montag');
$pdf->Rect(121, 151, 3, 3, 'D');
$pdf->Text(126, 154, 'Dienstag');
$pdf->Rect(141, 151, 3, 3, 'D');
$pdf->Text(146, 154, 'Mittwoch');
$pdf->Rect(161, 151, 3, 3, 'D');
$pdf->Text(166, 154, 'Donnerstag');
$pdf->Rect(184, 151, 3, 3, 'D');
$pdf->Text(189, 154, 'Freitag');
  
if(strpos($row[Tage1], 'Mo') !== false)
{
$pdf->Rect(102, 151, 3, 3, 'DF');
}
if(strpos($row[Tage1], 'Di') !== false)
{
$pdf->Rect(121, 151, 3, 3, 'DF');
}
if(strpos($row[Tage1], 'Mi') !== false)
{
$pdf->Rect(141, 151, 3, 3, 'DF');
}
if(strpos($row[Tage1], 'Do') !== false)
{
$pdf->Rect(161, 151, 3, 3, 'DF');
}
if(strpos($row[Tage1], 'Fr') !== false)
{
$pdf->Rect(184, 151, 3, 3, 'DF');
}

/* --- Schultagewunsch 2 --- */
 $pdf->SetTextColor(0);
$pdf->SetFontSize(9);
$pdf->SetXY(11, 156);
$pdf->Write(5, 'Schultagewunsch des Ausbildungsbetriebes (2.Wahl):');

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
  
$pdf->Rect(102, 156, 3, 3, 'D');
$pdf->Text(107, 159, 'Montag');
$pdf->Rect(121, 156, 3, 3, 'D');
$pdf->Text(126, 159, 'Dienstag');
$pdf->Rect(141, 156, 3, 3, 'D');
$pdf->Text(146, 159, 'Mittwoch');
$pdf->Rect(161, 156, 3, 3, 'D');
$pdf->Text(166, 159, 'Donnerstag');
$pdf->Rect(184, 156, 3, 3, 'D');
$pdf->Text(189, 159, 'Freitag');
  
if(strpos($row[Tage2], 'Mo') !== false)
{
$pdf->Rect(102, 156, 3, 3, 'DF');
}
if(strpos($row[Tage2], 'Di') !== false)
{
$pdf->Rect(121, 156, 3, 3, 'DF');
}
if(strpos($row[Tage2], 'Mi') !== false)
{
$pdf->Rect(141, 156, 3, 3, 'DF');
}
if(strpos($row[Tage2], 'Do') !== false)
{
$pdf->Rect(161, 156, 3, 3, 'DF');
}
if(strpos($row[Tage2], 'Fr') !== false)
{
$pdf->Rect(184, 156, 3, 3, 'DF');
}
/* --- Tabelle Schulbesuch ------------------------------------------ */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetXY(10, 166);
$pdf->SetFont('', 'B', 9);
$pdf->Cell(0, 4, 'Schulbesuch', 0, 1, 'L', false);
$pdf->SetTextColor(0);
$pdf->SetFont('');

/* --- Tabelle Zeichnen --- */
$pdf->Rect(10, 166, 190, 30, 'D');
$pdf->Rect(10, 170, 190, 6, 'D');
$pdf->Rect(10, 176, 190, 6, 'D');
$pdf->Rect(10, 182, 190, 6, 'D');
$pdf->Rect(10, 188, 190, 8, 'D');
$pdf->Rect(63, 170, 137, 32, 'D');
$pdf->Rect(10, 196, 190, 6, 'D');

/* --- Letzte Schule --- */
$pdf->SetTextColor(0);
$pdf->SetFontSize(9);
$pdf->SetXY(11, 172);
$pdf->Write(5, 'Zuletzt besuchte Schule');

$pdf->SetXY(64, 172);
$pdf->SetFontSize(9);
$pdf->Cell(64, 5, $row['letzte_Schule'], 0, 1, 'L', false);

/* --- Abschlussjahr --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 178, 'Abschlussjahr Schule');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 178);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Abgangsjahr'], 0, 1, 'L', false);
$pdf->SetTextColor(0);  

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
  
$pdf->Rect(64, 178, 3, 3, 'D');
$pdf->Text(69, 181, 'BBR');
$pdf->Rect(78, 178, 3, 3, 'D');
$pdf->Text(83, 181, 'EBBR');
$pdf->Rect(94, 178, 3, 3, 'D');
$pdf->Text(99, 181, 'MSA');
$pdf->Rect(108, 178, 3, 3, 'D');
$pdf->Text(113, 181, 'Abitur');
$pdf->Rect(124, 178, 3, 3, 'D');
$pdf->Text(129, 181, 'Fachabitur');
$pdf->Rect(146, 178, 3, 3, 'D');
$pdf->Text(151, 181, 'Fachabitur theor. Teil');
$pdf->Rect(184, 178, 3, 3, 'D');
$pdf->Text(189, 181, 'Ohne');
  
if(strpos($row[Schulabschluss], 'BBR') !== false)
{
$pdf->Rect(64, 178, 3, 3, 'DF');
}  
if(strpos($row[Schulabschluss], 'EBBR') !== false)
{
$pdf->Rect(78, 178, 3, 3, 'DF');
} 
if(strpos($row[Schulabschluss], 'MSA') !== false)
{
$pdf->Rect(94, 178, 3, 3, 'DF');
} 
if(strpos($row[Schulabschluss], 'Abitur') !== false)
{
$pdf->Rect(108, 178, 3, 3, 'DF');
} 
if(strpos($row[Schulabschluss], 'Fachabi') !== false)
{
$pdf->Rect(124, 178, 3, 3, 'DF');
} 
if(strpos($row[Schulabschluss], 'Fachabi ST') !== false)
{
$pdf->Rect(146, 178, 3, 3, 'DF');
} 
if(strpos($row[Schulabschluss], 'Ohne') !== false)
{
$pdf->Rect(184, 178, 3, 3, 'DF');
} 
if($row[Schulabschluss] == "")
{
$pdf->Rect(184, 178, 3, 3, 'DF');
} 
    
/* --- Besuchter Lehrgang --- */
$pdf->SetTextColor(0);
$pdf->SetFontSize(9);
$pdf->SetXY(11, 184);
$pdf->Write(5, 'Besuchter Lehrgang');

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
  
$pdf->Rect(64, 184, 3, 3, 'D');
$pdf->Text(69, 187, 'IBA');
$pdf->Rect(77, 184, 3, 3, 'D');
$pdf->Text(82, 187, 'BQL');
$pdf->Rect(90, 184, 3, 3, 'D');
$pdf->Text(95, 187, 'BV');
$pdf->Rect(102, 184, 3, 3, 'D');
$pdf->Text(107, 187, 'Willkommensklasse');
$pdf->Rect(137, 184, 3, 3, 'D');
$pdf->Text(142, 187, 'Keinen');
  
if(strpos($row[Lehrgang], 'IB') !== false)
{
$pdf->Rect(64, 184, 3, 3, 'DF');
}  
if(strpos($row[Lehrgang], 'BQL') !== false)
{
$pdf->Rect(77, 184, 3, 3, 'DF');
} 
if(strpos($row[Lehrgang], 'BV') !== false)
{
$pdf->Rect(90, 184, 3, 3, 'DF');
} 
if(strpos($row[Lehrgang], 'Willkommensklasse') !== false)
{
$pdf->Rect(102, 184, 3, 3, 'DF');
} 
if(strpos($row[Lehrgang], 'Nein') !== false)
{
$pdf->Rect(137, 184, 3, 3, 'DF');
} 
if($row[Lehrgang] == "")
{
$pdf->Rect(137, 184, 3, 3, 'DF');
} 
/* --- Abgeschlossene Berufsausbildung --- */
$pdf->SetXY(11, 188.5);
$pdf->SetFontSize(9);
$pdf->MultiCell(50, 4, "Abgeschlossene Berufsausbildung", 0);

  
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(100, 191, 'Wenn ja, Berufsbezeichnung');
$pdf->SetTextColor(0);

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
 
if($row[ausbildung] == "" || $row[ausbildung] == "Nein")
{
$pdf->Rect(64, 191, 3, 3, 'D');
$pdf->Text(69, 194, 'Ja');
$pdf->Rect(74, 191, 3, 3, 'DF');
$pdf->Text(79, 194, 'Nein');
}else{
$pdf->Rect(64, 191, 3, 3, 'DF');
$pdf->Text(69, 194, 'Ja');
$pdf->Rect(74, 191, 3, 3, 'D');
$pdf->Text(79, 194, 'Nein'); 

$pdf->SetXY(100, 191);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['ausbildung'], 0, 1, 'L', false);
$pdf->SetTextColor(0); 
}
 
/* --- Neu an RHS --- */
 $pdf->SetTextColor(0);
$pdf->SetFontSize(9);
$pdf->SetXY(11, 198);
$pdf->Write(5, 'Neu an der Rahel-Hirsch-Schule');

$pdf->SetFontSize(9);
$pdf->SetTextColor(0);
  
$pdf->Rect(64, 198, 3, 3, 'D');
$pdf->Text(69, 201, 'Neu');
$pdf->Rect(78, 198, 3, 3, 'D');
$pdf->Text(83, 201, utf8_decode('War Schüler*in'));
$pdf->Rect(107, 198, 3, 3, 'D');
$pdf->Text(112, 201, utf8_decode('Bin Schüler*in'));
  
if(strpos($row[SchuelerStatus], 'Neu') !== false)
{
$pdf->Rect(64, 198, 3, 3, 'DF');
}  
if(strpos($row[SchuelerStatus], 'War Schüler*in') !== false)
{
$pdf->Rect(78, 198, 3, 3, 'DF');
}  
if(strpos($row[SchuelerStatus], 'Bin Schüler*in') !== false)
{
$pdf->Rect(107, 198, 3, 3, 'DF');
}  
  
  
/* --- Tabelle Wird von Sekretariat ausgefüllt ------------------------------------------ */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetXY(10, 208);
$pdf->SetFont('', 'B', 9);
$pdf->Cell(0, 4, 'Wird von Sekretariat ausgefüllt', 0, 1, 'L', false);
$pdf->SetTextColor(0);
$pdf->SetFont('');

/* --- Tabelle Zeichnen --- */
$pdf->Rect(10, 208, 190, 28, 'D');
$pdf->Rect(10, 212, 190, 6, 'D');
$pdf->Rect(10, 218, 190, 6, 'D');
$pdf->Rect(10, 224, 190, 6, 'D');
$pdf->Rect(10, 230, 190, 6, 'D');
$pdf->Rect(105, 212, 95, 24, 'D');
$pdf->Rect(152.5, 212, 47.5, 12, 'D');  
$pdf->Rect(57.5, 212, 142.5, 6, 'D');  
$pdf->Rect(29, 218, 16, 18, 'D');

/* --- Aufnahmetag --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 214, 'Aufnahmetag');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 214);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Aufnahmetag'], 0, 1, 'L', false);

/* --- Reg.Nr --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(58.5, 214, 'Reg.-Nr. Vertrag');
$pdf->SetTextColor(0);

$pdf->SetXY(58.5, 214);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['RegNrvertrag'], 0, 1, 'L', false);

/* --- Muttersprache --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(106, 214, 'Muttersprache');
$pdf->SetTextColor(0);

$pdf->SetXY(106, 214);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Erstsprache'], 0, 1, 'L', false);
  
/* --- Aufenthaltsstatus --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(153.5, 214, 'Aufenthaltsstatus');
$pdf->SetTextColor(0);

$pdf->SetXY(153.5, 214);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Ausbildungsduldung'], 0, 1, 'L', false);

/* --- Aufenthaltsdatum --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(153.5, 220, 'Aufenthalt bis');
$pdf->SetTextColor(0);

$pdf->SetXY(153.5, 220);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Aufenthaltsstatus'], 0, 1, 'L', false);

/* --- Beginn am --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 220, 'Beginn am');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 220);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Beginn'], 0, 1, 'L', false);

/* --- Klasse --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(30, 220, 'Klasse');
$pdf->SetTextColor(0);

$pdf->SetXY(30, 220);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Klasse'], 0, 1, 'L', false);
  
/* --- Lehrer --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(46, 220, 'Klassenlehrer*in');
$pdf->SetTextColor(0);
           
$pdf->SetXY(46, 220);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Lehrer'], 0, 1, 'L', false);
  
/* --- Wechsel am --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 226, 'Wechsel am');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 226);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['WechselAm'], 0, 1, 'L', false);

/* --- Klasse 2--- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(30, 226, 'Klasse');
$pdf->SetTextColor(0);

$pdf->SetXY(30, 226);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Klasse2'], 0, 1, 'L', false);
  
/* --- Lehrer 2--- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(46, 226, 'Klassenlehrer*in');
$pdf->SetTextColor(0);

$pdf->SetXY(46, 226);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Lehrer2'], 0, 1, 'L', false);
  
/* --- Grund --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(106, 226, 'Grund');
$pdf->SetTextColor(0);

$pdf->SetXY(106, 226);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Grund'], 0, 1, 'L', false);
  
/* --- Wechsel am --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(11, 232, 'Wechsel am');
$pdf->SetTextColor(0);

$pdf->SetXY(11, 232);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['WechselAm2'], 0, 1, 'L', false);

/* --- Klasse 3--- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(30, 232, 'Klasse');
$pdf->SetTextColor(0);

$pdf->SetXY(30, 232);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Klasse3'], 0, 1, 'L', false);
  
/* --- Lehrer 3--- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(46, 232, 'Klassenlehrer*in');
$pdf->SetTextColor(0);

$pdf->SetXY(46, 232);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Lehrer3'], 0, 1, 'L', false);
  
/* --- Grund2 --- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetFontSize(5.5);
$pdf->Text(106, 232, 'Grund');
$pdf->SetTextColor(0);

$pdf->SetXY(106, 232);
$pdf->SetFontSize(9);
$pdf->Cell(60, 5, $row['Grund2'], 0, 1, 'L', false);

/* --- Eingereichte Unterlagen ------------------------------------- */
$pdf->SetTextColor(175, 175, 175);
$pdf->SetXY(10, 242);
$pdf->SetFont('', 'B', 9);
$pdf->Cell(0, 4, 'Eingereichte Unterlagen', 0, 1, 'L', false);
$pdf->SetTextColor(0);
$pdf->SetFont('');

/* --- Tabelle Zeichnen --- */
$pdf->Rect(10, 242, 190, 25, 'D');
$pdf->Rect(10, 246, 190, 21, 'D');
$pdf->Rect(73.3, 246, 63.3, 21, 'D');
  
$pdf->SetFontSize(6);
$pdf->SetTextColor(0);
  
$pdf->Rect(11, 247, 3, 3, 'D');
$pdf->Text(16, 249, utf8_decode('Vertragsbestätigung'));
$pdf->Rect(11, 251, 3, 3, 'D');
$pdf->Text(16, 253, 'Registrierter Ausbildungsvertrag');
$pdf->Rect(11, 255, 3, 3, 'D');
$pdf->Text(16, 257, '2 Fotos');
$pdf->Rect(11, 259, 3, 3, 'D');
$pdf->Text(16, 261, 'Zeugnis Schulabschluss');
$pdf->Rect(11, 263, 3, 3, 'D');
$pdf->Text(16, 265, 'Aufenthaltsstatus');

$pdf->Text(74.3, 249, utf8_decode('Umschüler:'));
$pdf->Rect(74.3, 250, 3, 3, 'D');
$pdf->Text(79.3, 252.5, 'Umschulungsvertrag');
$pdf->Rect(74.3, 255, 3, 3, 'D');
$pdf->Text(79.3, 257, utf8_decode('Kostenübernahmeerklärung'));
  
$pdf->Text(138, 249, 'Brandenburger Azubis:');
$pdf->Rect(138, 250, 3, 3, 'D');
$pdf->Text(143, 252.5, 'Zustimmung Sen BJF "Beschulung in Berlin"');
$pdf->Rect(138, 254.5, 3, 3, 'D');
$pdf->Text(143, 257, 'Zustimmung Kammer BB');
$pdf->Rect(138, 259, 3, 3, 'D');
$pdf->Text(143, 261, 'Zustimmung Berlin');

if(strpos($row[Vertragsbestaetigung], 'Bestätigung') !== false)
{
$pdf->Rect(11, 247, 3, 3, 'DF');
}   
if(strpos($row[Vertragsbestaetigung], 'Registriert') !== false)
{
$pdf->Rect(11, 251, 3, 3, 'DF');
} 
if(strpos($row[Vertragsbestaetigung], 'Fotos') !== false)
{
$pdf->Rect(11, 255, 3, 3, 'DF');
}  
if(strpos($row[Vertragsbestaetigung], 'Zeugnis') !== false)
{
$pdf->Rect(11, 259, 3, 3, 'DF');
}  
if(strpos($row[Vertragsbestaetigung], 'Duldung') !== false)
{
$pdf->Rect(11, 263, 3, 3, 'DF');
} 

if(strpos($row[Umschuele], 'Umschulungsvertrag') !== false)
{
$pdf->Rect(74.3, 250, 3, 3, 'DF');
}  
if(strpos($row[Umschuele], 'Kostenübernahme') !== false)
{
$pdf->Rect(74.3, 255, 3, 3, 'DF');
}  
  
if(strpos($row[Brandenburger], 'Zustimmung SenBJF') !== false)
{
$pdf->Rect(138, 250, 3, 3, 'DF');
}  
if(strpos($row[Brandenburger], 'Zustimmung BB') !== false)
{
$pdf->Rect(138, 254.5, 3, 3, 'DF');
}  
if(strpos($row[Brandenburger], 'Zustimmung B') !== false)
{
$pdf->Rect(138, 259, 3, 3, 'DF');
}  
  
/* --- Bestätigung ------------------------------------------ */
$pdf->SetFontSize(10);
$pdf->SetTextColor(0);
$pdf->Text(15, 273, utf8_decode('Ich bestätige die Richtigkeit der Angaben.'));
  
/* --- Unterschrift ------------------------------------------ */
$pdf->SetFontSize(12);
$pdf->SetTextColor(0);
$pdf->Text(15, 283, 'Unterschrift: _____________________________________   Datum: _______________');

  
/* --- Fußzeile ------------------------------------------ */
$pdf->SetFontSize(5,5);
$pdf->SetTextColor(0);
$pdf->Text(10, 293, utf8_decode('Personalbogen Schüler*in der Rahel Hirsch Schule'));
$pdf->Text(185, 293, 'Stand: 04.04.2021');  
  
}
$pdf->Output('created_pdf.pdf','I');
?>
