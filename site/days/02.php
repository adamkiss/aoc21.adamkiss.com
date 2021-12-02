<?php $input = require_once(kirby()->root('inputs').DS.basename(__FILE__));

use Kirby\Toolkit\Obj;
use Kirby\Toolkit\Collection;

$demoinput = new Collection(array_map(function(string $action) {
	list($direction, $value) = explode(' ', $action);
	$value = (int) $value;
	return new Obj(compact('direction', 'value'));
}, explode('|', 'forward 5|down 5|forward 8|up 3|down 8|forward 2')));

function p1(Collection $input): mixed
{
	$groupped = $input->groupBy('direction');

	$distance = array_sum($groupped->get('forward')->pluck('value'));
	$depth = array_sum($groupped->get('down')->pluck('value')) - array_sum($groupped->get('up')->pluck('value'));

	return $distance * $depth;
}

function p2(mixed $input): mixed
{
	$aim = 0;
	$calculated = $input->map(function(Obj $action) use (&$aim) {
		if ($action->direction() === 'forward') {
			$action->depthChange = $action->value() * $aim;
			return $action;
		}
		$aim += $action->direction() === 'down' ? $action->value() : -1 * $action->value();
		return $action;
	});

	$fwdActions = $calculated->filterBy('direction', 'forward');
	return array_sum($fwdActions->pluck('value')) * array_sum($fwdActions->pluck('depthChange'));
}

return implode('',[
	snippet('solution/single', ['demo' => p1($demoinput), 'input' => p1($input), 'label' => 'Result - Part 1'], true),
	snippet('solution/single', ['demo' => p2($demoinput), 'input' => p2($input), 'label' => 'Result - Part 2'], true)
]);
