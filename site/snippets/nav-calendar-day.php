<a  href="/<?= $day ?>"
	class="p-2 font-bold text-center tabular-nums rounded bg-gray-200 act:bg-toxic act:bg-opacity-50"
	<?= e(Url::path() === $day, 'data-active') ?>
>
	<span class="hidden lg:inline no-js:md:inline">Day </span>
	<span><?= $day ?></span>
</a>
