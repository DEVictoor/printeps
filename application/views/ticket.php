<?php
/* Change to the correct path if you copy this example! */
require 'vendor/autoload.php';

use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

try {
	// print_r($atencion);
	$connector = new WindowsPrintConnector("XP-81C");

	$printer = new Printer($connector);

	$printer->setJustification(Printer::JUSTIFY_CENTER);
	$logo = EscposImage::load("images/logo_eps.png", false);
	$printer->bitImage($logo);

	$printer->selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
	$printer->text("Bienvenido" . "\n");
	$printer->text("\n");

	$printer->selectPrintMode(Printer::MODE_FONT_B);
	$printer->setTextSize(1, 1);
	setlocale(LC_ALL, "es_ES");
	date_default_timezone_set("America/Lima");
	$printer->text(date("d-m-Y H:i:s") . "\n");

	$printer->text("Su turno es:" . "\n");
	$printer->setTextSize(4, 4);
	$printer->text($atencion[0]["ticket"] . "\n");

	if ($atencion[0]["preferential"] == 0) {
		$p = "Normal";
	} elseif ($atencion[0]["preferential"] == 1) {
		$p = "Preferencial";
	}

	$printer->setTextSize(1, 1);
	$printer->text("\n" . "Atención " . $p . "\n");

	$printer->setJustification(Printer::JUSTIFY_RIGHT);
	$printer->setTextSize(1, 1);
	$printer->text("\n" . "En breves momentos sera atendido." . "\n");
	$printer->text("Gracias.");

	$printer->feed();

	$printer->cut();

	$printer->pulse();

	$printer->close();
	echo "Mensaje positivo";
} catch (Exception $e) {
	echo "Mensaje negativo";
}
