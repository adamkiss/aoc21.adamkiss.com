<footer>
	<div class="js:hidden" [x-cloak]>
		<hr>
		<div class="text-2xl text-center my-4">Calendar</div>
	</div>

	<div class="
		js:fixed js:z-20 js:top-14 js:right-0
		p-2 pt-4 grid grid-cols-7 gap-2
		bg-gray-100 dark:bg-gray-900 bg-opacity-95 text-black dark:text-white
		js:md:border-l js:border-b bg-blur-lg border-black dark:border-white
	" x-data="{active: false}" x-show="active" @toggle-calendar.window="active = !active">
		<?php
		// November
		snippet('nav-calendar-day-inactive');
		snippet('nav-calendar-day-inactive');

		$december = 1;

		foreach (collection('days') as $days) {
			snippet('nav-calendar-day', ['day' => sprintf('%02d', $december++)]);
		}
		for ($i = 0; $i < 24 - collection('days')->count(); $i++) {
			snippet('nav-calendar-day-inactive', ['day' => sprintf('%02d', $december++)]);
		}

		// 25th and 26th december end the week
		snippet('nav-calendar-day-inactive');
		snippet('nav-calendar-day-inactive');
		?>
	</div>
</footer>
