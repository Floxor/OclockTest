<?php
session_start();

$bdd =  'oclocktest';
$host = 'localhost';
$user = 'root';
$pass = '';


function connecter() { // ouverture de connection
	global $bdd,$host,$user,$pass;
	@$connexion = mysql_connect($host, $user, $pass)or die('Erreur SQL : '.mysql_error());
	@$choix_base = mysql_select_db($bdd, $connexion)or die('Erreur SQL : '.mysql_error());
}

function deconnecter() {mysql_close();} // fermeture de connection en cours

function request($str_query, $connect = 1) {
	if ($connect == 1) connecter();     // si connect =1 on se connect
	$resultat = mysql_query($str_query) or die('Erreur SQL : '.mysql_error());
	if ($connect == 1) deconnecter();   // si connect =1 on se deconnect

	return $resultat;
}

function create_db_if_not_exists($_database) {
	global $host, $user, $pass;
	@$connexion = mysql_connect($host, $user, $pass) or die(db_vierge());
	$result = mysql_query("SHOW DATABASES");
	$bddExist = false;

	while ($row = mysql_fetch_row($result)) {
		if ($row[0] == $_database) {
			$bddExist = true;
		}
	}
	mysql_close();

	if (!$bddExist) {
		mysql_connect($host, $user, $pass);
		mysql_query("CREATE DATABASE `".$_database."` ;");
		mysql_close();
	}
}

create_db_if_not_exists($bdd);

request("
CREATE TABLE IF NOT EXISTS `stormtroopers` (
  `Name` varchar(28) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Age` int(11) NOT NULL,
  `Origine` varchar(28) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `Abilities` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_2` (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;
");

request("INSERT INTO stormtroopers (`Name`, `ID`, `Age`, `Origine`, `Abilities`) VALUES ('Darth Vader', 1, 45, 'Tatooine', 'Armure mécanique, Hyper sensible à la force') ON DUPLICATE KEY UPDATE ID='1';");
request("INSERT INTO stormtroopers (`Name`, `ID`, `Age`, `Origine`, `Abilities`) VALUES ('Obi-Wan Kenobi', 2, 51, 'Stewjon', 'Calme olympien') ON DUPLICATE KEY UPDATE ID='2';");
request("INSERT INTO stormtroopers (`Name`, `ID`, `Age`, `Origine`, `Abilities`) VALUES ('Ben Solo', 3, 27, 'Chandrila', 'Jeune suprême leader') ON DUPLICATE KEY UPDATE ID='3';");


function AddNewMember($name, $age, $origine, $abilities) {
	request("INSERT INTO stormtroopers (`Name`, `ID`, `Age`, `Origine`, `Abilities`) VALUES ('$name', '', $age, '$origine', '$abilities');");
}

?>