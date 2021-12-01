<?php

use Kirby\Toolkit\A;

layout() ?>

<?php slot('content') ?>
	<div class="styled-html">
		<div class="flex justify-between items-center">
			<?php if($p = $page->prevListed()): ?>
				<a href="<?= $p->url() ?>">← <?= $p->title() ?></a>
			<?php else: ?>
				<span> </span>
			<?php endif; ?>
			<h1 class="text-center"><?= $page->title() ?></h1>
			<?php if($n = $page->nextListed()): ?>
				<a href="<?= $n->url() ?>"><?= $n->title() ?> →</a>
			<?php else: ?>
				<span> </span>
			<?php endif; ?>
		</div>

		<p class="flex items-center justify-center">
			<a href="https://adventofcode.com/2021/day/<?= $page->dayInt() ?>">Advent of Code detail</a>
			<span> • </span>
			<a href="https://github.com/adamkiss/aoc21.adamkiss.com/blob/main/site/days/<?= $page->dayFile() ?>">Solution on the Github</a>
		</p>

		<div class="text-base">
			<pre><code data-language="php"><?=
				$page->solution()->html()
			?></code></pre>
		</div>

		<h2 class="mt-8 text-center">Results</h2>

		<?= $page->result() ?>
	</div>
	<script src="/assets/vendor/rainbow-2.1.7.min.js"></script>
<?php endslot() ?>
