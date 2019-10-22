<?php 

/*Zadanie 1.
Napisz program, który dla danego wzorca P (ang. pattern) i tekstu T wypisze pozycje, na których znajduje się wzorzec P jako podsłowo tekstu T.

Wejście
W pierwszym wierszu danych znajduje się liczba natralna T (0 < T < 11) oznaczająca liczbę zestawów danych.
Każdy zestaw danych podany jest w trzech wierszach. Pierwszy zawiera jedną liczbę naturalną n - oznaczającą długość wzorca P ( n <= 1000000 ). Drugi wiersz zawiera wzorzec P - napis złożony z n liter angielskiego alfabetu (a-z, A-Z). Trzeci wiersz zawiera test T czyli ciąg liter alfabetu angielskiego zakończony znakiem nowego wiersza.

Wyjście
Dla każdego zestawu danych wypisz pozycje na których wzorzec P pasuje w tekscie T. Zakładamy, że litery tekstu T numerowane są od zera.


*/

/**
* Generowanie randomowego tekstu
*/
function randomString($length = 6) {
	$str = "";
	$characters = array_merge(range('A','Z'), range('a','z'));
	$max = count($characters) - 1;
	for ($i = 0; $i < $length; $i++) {
		$rand = mt_rand(0, $max);
		$str .= $characters[$rand];
	}
	return $str;
}

/**
* Liczba zestawów danych
*/
$amount = rand(2, 10);

$array = [];
$data =[];

for ($y=1; $y <= $amount; $y++) { 
	$amount_text = rand(1, 1000000);
	$array[] = [
		$amount_text,
		randomString($amount_text),
		randomString(3) . '/n',
	];
}

/**
* Zestaw danych
*/
$data = [
	0 => $amount,
	1 => $array,
];



foreach ($data[1] as $value) {
	// Usuwanie znaku nowej linii
	$pattern = preg_replace("|[\/n]+|", "", $value[2]);

	// Znajdowanie wartości w ciągu
	preg_match_all("/($pattern)/", $value[1], $matches, PREG_OFFSET_CAPTURE);

	// Wyświetlenie wyników
	echo "<pre>";
	var_dump($matches);
	echo "</pre>";
}