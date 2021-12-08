<?php

use Kirby\Toolkit\Str;

$input = require_once(kirby()->root('inputs').DS.basename(__FILE__));
$demoinputStr = <<<INPUT
be cfbegad cbdgef fgaecd cgeb fdcge agebfd fecdb fabcd edb | fdgacbe cefdb cefbgd gcbe
edbfga begcd cbg gc gcadebf fbgde acbgfd abcde gfcbed gfec | fcgedb cgb dgebacf gc
fgaebd cg bdaec gdafb agbcfd gdcbef bgcad gfac gcb cdgabef | cg cg fdcagb cbg
fbegcd cbd adcefb dageb afcb bc aefdc ecdab fgdeca fcdbega | efabcd cedba gadfec cb
aecbfdg fbg gf bafeg dbefa fcge gcbea fcaegb dgceab fcbdga | gecf egdcabf bgf bfgea
fgeab ca afcebg bdacfeg cfaedg gcfdb baec bfadeg bafgc acf | gebdcfa ecba ca fadegcb
dbcfg fgd bdegcaf fgec aegbdf ecdfab fbedc dacgb gdcebf gf | cefg dcbef fcge gbcadfe
bdfegc cbegaf gecbf dfcage bdacg ed bedf ced adcbefg gebcd | ed bcgafe cdgba cbgef
egadfb cdbfeg cegd fecab cgb gbdefca cg fgcdab egfdb bfceg | gbdfcae bgc cg cgb
gcafb gcf dcaebfg ecagb gf abcdeg gaef cafbge fdbac fegbdc | fgae cfgab fg bagce
INPUT;
$demoinput = array_map(
	function ($line) {
		list($digits, $output) = Str::split($line, " | ");
		return [
			'digits' => Str::split($digits, " "),
			'output' => Str::split($output, " ")
		];
	},
	Str::split($demoinputStr, "\n")
);

function p1(mixed $input): mixed
{
	$allOutput = array_merge(...array_map(fn($l) => $l['output'], $input));

	$easyDigits = count(
		array_filter(
			$allOutput,
			fn(string $digit) => in_array(Str::length($digit), [2, 3, 4, 7])
		)
	);

	return $easyDigits;
}

function p2(mixed $input): mixed
{
	return '';
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
