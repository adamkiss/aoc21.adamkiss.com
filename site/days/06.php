<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = [3,4,3,1,2];

function p1(mixed $input): mixed
{
	$fishes = array_fill(0, 9, 0);
	foreach($input as $state) { $fishes[$state]++; }

	for ($i=0; $i < 80; $i++) {
		$spawn = array_shift($fishes);
		$fishes[6] += $spawn;
		$fishes []= $spawn;
	}

	return array_sum($fishes);
}

function p2(mixed $input): mixed
{
	$fishes = array_fill(0, 9, 0);
	foreach($input as $state) { $fishes[$state]++; }

	for ($i=0; $i < 256; $i++) {
		$spawn = array_shift($fishes);
		$fishes[6] += $spawn;
		$fishes []= $spawn;
	}

	return array_sum($fishes);
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
