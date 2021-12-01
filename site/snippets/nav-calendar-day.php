<a  href="/home/<?= $day ?>"
	class="p-2 font-bold text-center tabular-nums rounded act:bg-toxic act:bg-opacity-50 dark:act:bg-transparent dark:act:text-toxic"
	<?= e(Url::path() === "home/{$day}", 'data-active') ?>
>
	<span class="hidden lg:inline no-js:md:inline">Day </span>
	<span><?= $day ?></span>
</a>
