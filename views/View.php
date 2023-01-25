<?php

namespace views;

class View
{

	const DEFAULT_HEADER = 'header.php';
	const DEFAULT_FOOTER = 'footer.php';

	public function render($body, $header = null, $footer = null)
	{
		if ($header == null) {
			include('views/templates/partials/' . self::DEFAULT_HEADER);
		}

		include('views/templates/' . $body);

		if ($footer == null) {
			include('views/templates/partials/' . self::DEFAULT_FOOTER);
		}
	}
}
