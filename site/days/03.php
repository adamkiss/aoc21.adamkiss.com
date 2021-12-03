<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinput = ['00100','11110','10110','10111','10101','01111','00111','11100','10000','11001','00010','01010'];

function strToBits(string $str): array
{
	return array_map(fn($chr) => $chr === '1', str_split($str));
}

function mostCommon(array $arr, int $position) {
	$bits = array_column($arr, $position);
	return count(array_filter($bits, fn($i) => $i)) >= count($bits) / 2;
}

function bitsToDec(array $bits): int
{
	return bindec(implode('', array_map(fn($bit) => $bit ? '1' : '0', $bits)));
}

function p1(array $input): int
{
	$bits = array_map(fn($line) => strToBits($line), $input);
	$epsilon = array_map(fn($pos) => mostCommon($bits, $pos), array_keys($bits[0]));
	$gamma = array_map(fn($bit) => $bit xor true, $epsilon);
	return bitsToDec($epsilon) * bitsToDec($gamma);
}

function p2(array $input): int
{
	$bits = array_map(fn($line) => strToBits($line), $input);
	$oxy = [...$bits]; $pos = 0;
	while (count($oxy) > 1 && $pos < count($bits[0])) {
		$mc = mostCommon($oxy, $pos);
		$oxy = array_filter($oxy, fn($row) => $row[$pos] === $mc);
		$pos++;
	}
	$co2 = [...$bits]; $pos = 0;
	while (count($co2) > 1 && $pos < count($bits[0])) {
		$mc = mostCommon($co2, $pos);
		$co2 = array_filter($co2, fn($row) => $row[$pos] !== $mc);
		$pos++;
	}

	ray(bitsToDec(current($oxy)), bitsToDec(current($co2)));

	return bitsToDec(current($oxy)) * bitsToDec(current($co2));
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
