<?php 
$ordinateur = $_POST['ordinateur'];
$ecran = $_POST['ecran'];
$imprimante = $_POST['imprimante'];
$telephone = $_POST['telephone'];
$souris = $_POST['souris'];
$clavier = $_POST['clavier'];
require_once __DIR__ . '/vendor/autoload.php';
$html = file_get_contents('template.html');
$find[0] = '{ siret }';
$find[1] = '{ date }';
$find[2] = '{ ordinateur }';
$find[3] = '{ ecran }';
$find[4] = '{ imprimante }';
$find[5] = '{ telephone }';
$find[6] = '{ souris }';
$find[7] = '{ clavier }';
$find[8] = '{ ht }';
$find[9] = '{ ttc }';

$replace[0] =  $_SESSION['siret'];
$replace[1] = date('d-m-Y');
$replace[2] = $ordinateur;
$replace[3] = $ecran;
$replace[4] = $imprimante;
$replace[5] = $telephone;
$replace[6] = $souris;
$replace[7] = $clavier;
$replace[8] = ($souris * 9.99) + ($ecran * 25.99) + ($imprimante * 49.99) + ($ordinateur * 59.99) + ($telephone * 89.99) + ($clavier * 19.99);
$replace[9] = 1.20* (($souris * 9.99) + ($ecran * 25.99) + ($imprimante * 49.99) + ($ordinateur * 59.99) + ($telephone * 89.99) + ($clavier * 19.99)); 
str_replace($find,$replace,$html);
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$mpdf->Output();

?>