<?php

function same_char($string, $unique) {
	if (count(count_chars($string, 1)) <= $unique) {
		return FALSE;
	}
	else {
		return TRUE;
	}
}

function combinaison($liste_items, $numbers) {
	$new_list = array();
	foreach ($liste_items as $list) {
		foreach($numbers as $nbr) {
			$new_list[] = $list." ".$nbr;
		}
	}
	return $new_list;
}

$numbers_list = array('1', '2', '3');
$numbers_elements = 3;

$tab = $numbers_list;
$i = 1;

while ($i++ < $numbers_elements) {
	$tab = combinaison($tab, $numbers_list);
}

$inc = 0;
file_exists("/home/laurie/files") ? rmdir("/home/laurie/files") : 0;
file_exists("/home/laurie/files") ? 0 : mkdir("/home/laurie/files", 0755);
$text = "Public speaking is very easy.\n 1 2 6 24 120 720\n1 b 214\n9\nopekmq\n4 ";

foreach ($tab as $str) {
	if (same_char($str, 3) == TRUE) {
		$file = fopen("files/file_$inc", w);
		fwrite($file, $text.$str."\n");
		$inc++;
	}
}

$i = 0;
$inc = 0;
while ($i++ <= 119) {
	$output = shell_exec("/home/laurie/bomb files/file_$inc");
	if (!strstr($output, "BOOM")) {
		echo $output."\n";
		echo "Le code est dans le fichier : files_$inc \n";
	}
	$inc++;
}
