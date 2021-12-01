<?php

use Kirby\Cms\Page;
use Kirby\Cms\Pages;
use Kirby\Cms\Template;
use Kirby\Filesystem\Dir;
use Kirby\Filesystem\F;
use Kirby\Toolkit\Obj;

class HomePage extends Page {

	public function children()
	{
		$dayFiles = Dir::read(kirby()->root('days'));

		$days = [];
		foreach($dayFiles as $dayFile) {
			if ($dayFile === '__template.php') continue;

			$day = explode('.', $dayFile)[0];
			$days []= [
				'slug' => $day,
				'num' => (int)$day,
				'template' => 'day',
				'model' => 'day',
				'content' => [
					'title' => $day,
					'solution' => F::read(kirby()->root('days') . DS . $dayFile),
				],
			];
		}

		return Pages::factory($days, $this);
	}

}
