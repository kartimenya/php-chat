<?php


class View
{
	
	public function render(string $templateName, array $params = []){
		$templatePath = 'src/Templaite/' . $templateName . '.php';

		if (file_exists($templatePath)) {
			extract($params);

			require $templatePath;
		}
	}
}