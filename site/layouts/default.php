<!DOCTYPE html>
<html lang="en" class="no-js">
<?php snippet('_assets'); ?>

<head>
	<?php snippet('layouts/head'); ?>
</head>

<body class="antialiased bg-gray-100 text-black  dark:bg-gray-900 dark:text-white px-2 sm:px-4 md:px-6 lg:px-12">
	<div class="mx-auto max-w-2xl"><?php
		snippet('nav');

		slot('content');
		endslot();

		snippet('layouts/debug');
		snippet('nav-calendar');

		if (!option('debug')) : echo <<<HTML
		<script data-goatcounter="https://aoc21-adam.goatcounter.com/count" async src="//gc.zgo.at/count.js"></script>
		HTML;
		endif;
	?></div>
</body>
</html>
