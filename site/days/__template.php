<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = [];

function p1(mixed $input): mixed
{
	return '';
}

function p2(mixed $input): mixed
{
	return '';
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
