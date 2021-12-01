<?php /* so so lazy */ ?>
<style>
	.no-js .calendar {
		margin-top: 2rem;
	}

	.js .calendar {
		position: fixed;
		left: 50%;
		transform: translateX(-47.5%);
		/* 47.5% is a magic number: eyeballed positioning */
		max-width: 20rem;
		z-index: 666; /* hehehehe */
	}

	.js .no-js-hidden {
		display: none;
	}
</style>

<footer>
	<div class="no-js-hidden mt-8">
		<hr>
		<div class="text-2xl mb-8">Calendar</div>
	</div>

	<div class="
		calendar py-2 top-28 md:top-20
		grid grid-cols-7 gap-2
		bg-gray-300 bg-opacity-95 text-black dark:text-white
		rounded-lg bg-blur-lg font-bold
	"
	x-data="{active: false}"
	x-show="active"
	@toggle-calendar.window="active = !active"
	>
		<?php
			// November
			snippet('nav-calendar-day-inactive'); snippet('nav-calendar-day-inactive');

			$december = 1;

			foreach(collection('days') as $days) {
				snippet('nav-calendar-day', ['day'=>$december++]);
			}
			for ($i=0; $i < 24 - collection('days')->count(); $i++) {
				snippet('nav-calendar-day-inactive', ['day'=>$december++]);
			}

			// 25th and 26th december end the week
			snippet('nav-calendar-day-inactive'); snippet('nav-calendar-day-inactive');
		?>
	</div>
</footer>
