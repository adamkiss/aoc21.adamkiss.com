<div class="
	sticky top-0 z-30 p-2
  text-black dark:text-white bg-gray-100 dark:bg-gray-900
	bg-blur-lg font-bold text-xs sm:text-base lg:text-lg
	border-b border-black dark:border-white
">
	<nav class="mx-2 sm:mx-4 md:mx-12 lg:mx-auto lg:max-w-4xl flex justify-center items-center">
		<a href="/" class="sm:hidden flex-grow">AoC '21</a>
		<a href="/" class="hidden sm:inline flex-grow">Advent of Code 2021</a>
		<a class="act:bg-toxic act:bg-opacity-50 dark:act:bg-transparent dark:act:text-toxic rounded px-2 sm:px-4 py-2" <?= e($page->slug() === 'home', 'data-active') ?> href="/">ℹ️  Info</a>
		<a class="px-2 sm:px-4 py-2" href="#calendar" x-data @click.prevent="$dispatch('toggle-calendar')">🗓  Calendar</a>
		<a class="px-2 sm:px-4 py-2" href="https://adamkiss.com" target="_blank">→AK</a>
	</nav>
</div>
