<?php

#PHP Source Code
require "phpspellcheck/include.php";

//$mySpell = new SpellCheckButton();
//$mySpell->InstallationPath = "/phpspellcheck/";
//$mySpell->Fields = "ALL";
//echo $mySpell->SpellImageButton();


$mySpell = new SpellAsYouType();
$mySpell->InstallationPath = "/phpspellcheck/";
$mySpell->Fields = "ALL";
echo $mySpell->Activate();

/*
$correct = "true";
if (isset($_GET['phrase'])) {
$input = $_GET['phrase'];
//$input = "tsshis is my cat"; // debug
$words = explode(" ", $input);
//$word = "test"; // debug
$pspell_link = pspell_new("en");
foreach ($words as $word) {
   if (pspell_check($pspell_link, $word)) {
	//echo "correct";
   }
   else {
	//echo "not correct";
	$correct = "false"; 
   }
} // end foreach
} // end if
echo $correct;
*/
?>
