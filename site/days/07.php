<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = [16,1,2,0,4,2,7,1,2,14];

function p1(mixed $input): mixed
{
	sort($input);
	$center = round(array_sum(array_slice($input, round(count($input)/2) - 1, 2)) / 2);
	return array_reduce(
		$input,
		fn($distance, $position) => $distance + abs($position - $center),
		0
	);
}

function summation(int $i): int
{
	return $i * ($i + 1) / 2;
}

function p2(mixed $input): mixed
{
	$avg = array_sum($input) / count($input);

	$avgs = array_reduce(
		$input,
		fn($avgs, $pos) => [
			$avgs[0] + summation(abs($pos - floor($avg))),
			$avgs[1] + summation(abs($pos - ceil($avg)))
		],
		[0,0]
	);

	return min(...$avgs);
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
