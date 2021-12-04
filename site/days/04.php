<?php

use Kirby\Toolkit\Obj;
use Kirby\Toolkit\Str;

$input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = Str::replace("7,4,9,5,11,17,23,2,0,14,21,24,10,16,13,6,15,25,12,22,18,20,8,19,3,26,1||22 13 17 11  0| 8  2 23  4 24|21  9 14 16  7| 6 10  3 18  5| 1 12 20 15 19|| 3 15  0  2 22| 9 18 13 17  5|19  8  7 25 23|20 11 10 24  4|14 21 16 12  6||14 21 17 24  4|10 16 15  9 19|18  8 23 26 20|22 11 13  6  5| 2  0 12  3  7", '|', "\n");

function processInput(string $i): Obj
{
	$input = Str::split($i, "\n\n");

	$numbers = array_map(fn(string $nr) => (int)$nr, Str::split(array_shift($input), ","));
	$cards = array_map(
		function(string $cardString) {
			return array_map(
				fn($line) => array_map(
					fn($nr) => (new Obj(['nr'=>(int)$nr,'checked'=>false])),
					Str::split($line, ' ')
				),
				Str::split($cardString, "\n")
			);
		},
		$input
	);

	return new Obj([
		'numbers' => $numbers,
		'cards' => $cards,
	]);
}

function checkBingo(array $rowOrColumn) {
	return count($rowOrColumn) === count(array_filter(array_map(fn($cell) => $cell->checked, $rowOrColumn)));
}

function countBingoSum(array $rowOrColumn, array $card): int|false {
	if (checkBingo($rowOrColumn)) {
		return array_sum(array_map(
			fn($row) => array_sum(
				array_map(fn($cell) => $cell->checked ? 0 : $cell->nr, $row)
			),
			$card
		));
	}

	return false;
}

function p1(mixed $input, bool $last = false): int
{
	$i = processInput($input);

	$bingo = false; $keepGoing = true;  $cardsWithBingo = [];
	while($keepGoing && !empty($i->numbers)) {
		$nr = array_shift($i->numbers);
		$counter = 0;
		while($keepGoing && $counter !== count($i->cards)){
			$c = $i->cards[$counter];
			$fCard = array_filter(
				array_map(
					function($row) use ($nr) {
						$fRow = array_filter(
							$row,
							fn($cell) => $cell->nr === $nr
						);
						return (empty($fRow)) ? false : array_keys($fRow)[0];
					},
					$c
				),
				fn($el) => $el !== false
			);
			if (!empty($fCard)) {
				$y = array_keys($fCard)[0]; $x = $fCard[$y];
				$i->cards[$counter][$y][$x]->checked = true;
				if ($sum = countBingoSum($i->cards[$counter][$y], $i->cards[$counter])) {
					$cardsWithBingo[$counter] = true;
					$bingo = $sum * $nr;
				} else if ($sum = countBingoSum(array_column($i->cards[$counter], $x), $i->cards[$counter])) {
					$cardsWithBingo[$counter] = true;
					$bingo = $sum * $nr;
				}
			}
			$counter++;
			$keepGoing = $last
				? count($cardsWithBingo) < count($i->cards)
				: $bingo === false;
		}
	}

	return $bingo;
}

function p2(mixed $input): mixed
{
	return p1($input, true);
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
