<?php

use System\Dbh;
use System\Config;

class App {

	private static $config;

	private static $emails;

	private $dbh = NULL;

	private static $action = 'default';


	public function __construct() {

		self::$config = Config::getInstance()::$config;

        self::$config['live'] = LIVE;

		//self::$config['log'] = new Components\Logs(self::$config);

		//self::$emails = new Components\Emails(self::$config);

		//self::$config['email'] = new Components\Emails(self::$config);

		$this->dbh = Dbh::getInstance(self::$config)::$dbh;

		var_dump($this->dbh);

		var_dump(Config::getInstance()::$config);


		//self::$config['log']->log_to_file('Application run');

	}

	public static function run() {

		self::view();

	}

	private static function view() {

		$render = new System\Render(self::$config,self::$action);

		$render->dump(self::$action);

		// Load header

		$header_content = self::$config['views'] . DIRECTORY_SEPARATOR . 'header.php';

		if(file_exists($header_content)) {
			require_once($header_content);
		} else {
			die("Hiányzó template file: header");
			exit(-1);
		}

		$menupanel_content = self::$config['views'] . DIRECTORY_SEPARATOR . 'menu.panel.php';

		if(file_exists($menupanel_content)) {
			require_once($menupanel_content);
		} else {
			die("Hiányzó template file: menu.panel");
			exit(-1);
		}

		// Load content

		$view_content = self::$config['views'] . DIRECTORY_SEPARATOR . self::$action . '.view.php';

		if(!file_exists($view_content)) {
			$view_content = self::$config['views'] . '404.view.php';
		}
		require_once($view_content);

		// Load footer

		$footer_content = self::$config['views'] . DIRECTORY_SEPARATOR . 'footer.php';

		if(file_exists($footer_content)) {
			require_once($footer_content);
		} else {
			die("Hiányzó template file: footer");
			exit(-1);
		}


	}

}