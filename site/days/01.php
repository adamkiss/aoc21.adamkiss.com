<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = [199, 200, 208, 210, 200, 207, 240, 269, 260, 263];

function p1(mixed $input): mixed
{
	return array_reduce($input, function(int $total, int $item) use (&$prev) {
		if (isset($prev)) {
			if ($item > $prev) { $total += 1; }
		}
		$prev = $item;
		return $total;
	}, 0);
}

function p2(mixed $input): mixed
{
	// Create windows of [i, i+1, i+2] from the input
	// and just run part 1 on that window instead of the original input
	$windows = [];
	for ($i=0; $i < count($input)-2; $i++) {
		$windows []= array_sum(array_slice($input, $i, 3));
	}
	return p1($windows);
}

return implode('', [
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
