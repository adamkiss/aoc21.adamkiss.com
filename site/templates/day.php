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

		<p class="text-sm md:text-base flex items-center justify-center">
			<a href="https://adventofcode.com/2021/day/<?= $page->dayInt() ?>">Advent of Code detail</a>
			<span> • </span>
			<a href="https://github.com/adamkiss/aoc21.adamkiss.com/blob/main/site/days/<?= $page->dayFile() ?>">Solution on the Github</a>
		</p>

		<div class="text-base">
			<pre><code class="language-php"><?=
				$page->solution()->html()
			?></code></pre>
		</div>

		<p class="spacer"> </p>

		<?= $page->result() ?>
	</div>
	<link rel="stylesheet" href="/assets/hljs-styles/a11y-dark.min.css" media="(prefers-color-scheme: dark)">
	<link rel="stylesheet" href="/assets/hljs-styles/a11y-light.min.css" media="(prefers-color-scheme: light)">
	<script src="/assets/vendor/hljs-v11.3.1.min.js"></script>
	<script>hljs.highlightAll();</script>
<?php endslot() ?>
