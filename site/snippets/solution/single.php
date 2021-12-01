<h3 class="text-center"><?= $label ?? 'Label' ?></h3>
<?php if(isset($description)): ?>
	<p class="text-sm md:text-base lg:text-lg"><?= $description ?></p>
<?php endif; ?>

<p class="flex justify-center items-center space-x-2">
	<span class="desscription">Demo input: </span>
	<span class="font-bold"><?= $demo ?></span>
	<span class="desscription">Real input: </span>
	<span class="font-bold"><?= $input ?></span>
</p>
