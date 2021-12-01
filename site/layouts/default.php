<!DOCTYPE html>
<html lang="en" class="no-js">
<?php snippet('_assets'); ?>

<head>
	<?php snippet('layouts/head'); ?>
</head>

<body class="antialiased bg-gray-100 text-black dark:bg-gray-900 dark:text-white">
	<?= snippet('nav', [], true); ?>
	<div class="mx-2 sm:mx-4 md:mx-12 lg:mx-auto lg:max-w-4xl py-4 md:py-8 lg:pb-20"><?php
		slot('content');
		endslot();

		snippet('layouts/debug');
	?></div>
	<?php
		snippet('nav-calendar');
		if (!option('debug')) : echo <<<HTML
			<script data-goatcounter="https://aoc21-adam.goatcounter.com/count" async src="//gc.zgo.at/count.js"></script>
			HTML;
		endif;
	?>
</body>
</html>
