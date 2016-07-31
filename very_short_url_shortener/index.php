<?php

//~ Very short url shortener!

ini_set('display_errors', 'Off');
// error_reporting(E_ALL);
error_reporting(0);

$toshort = $_POST["bigurl"];

$host = "http://$_SERVER[HTTP_HOST]$_SERVER[SCRIPT_NAME]";

$bookmarklet = 'javascript:void(window.location=&#39;'.$host.'?to_short=&#39+encodeURIComponent(window.location.href));';

if (empty ($toshort)) {

	echo'<a href="index.php">Hello!</a><br>I am very short url shortener.<br>

	I need urls to exist.<br>Feed me now.<br>Or use <a href="'.$bookmarklet.'" onclick="alrt()">the bookmarklet</a>

    ';

    echo'<textarea style="display:none" id="bktxt">'.$bookmarklet.'</textarea>';

	echo'<form method="post">

	<input type="input" name="bigurl" placeholder="//url" value="'.$_REQUEST["to_short"].'"/>

	<input type="submit" value="Shorten with very short url shortener" id="shr"/>

	</form>';

	};

if (!empty ($toshort)) {	

// Change the 5 to match your choice of url

	$token = bin2hex(openssl_random_pseudo_bytes(3));

	file_put_contents($token, $toshort . PHP_EOL, FILE_APPEND);

	echo $toshort;

	echo'<br>has been shorten into:<br>';

	echo'<a href="?s='.$token.'">?s='.$token.'</a>';

    };

if (!empty ($_GET["s"])) {	

	echo"<br>";

	$sid = $_GET["s"];

	$linked = file_get_contents($sid);

	if (empty ($linked)) {

    echo"Error 404 gone to party.";

	};

	if (!empty ($linked)) {			

    echo'<a href="'.$linked.'" id="lnk">'.$linked.'</a>';

    echo'<script>document.getElementById("lnk").click();</script>';

    }};

if (!empty ($_REQUEST["to_short"])) {

	echo'<script>document.getElementById("shr").click();</script>';	

	};

?>

<script>function alrt() {alert(document.getElementById("bktxt").innerHTML)};</script>
