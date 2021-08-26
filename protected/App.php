<?php

class App extends \System\BaseClass {

	private static $config;

	private static $emails;

	private static $dbh = NULL;

	private static $action = 'default';

	public function __construct($config = NULL) {

        parent::getInstance();

        self::$config = $config;

        self::$config['live'] = LIVE;

		//self::$config['log'] = new Components\Logs(self::$config);

		//self::$emails = new Components\Emails(self::$config);

		//self::$config['email'] = new Components\Emails(self::$config);

		self::$dbh = new System\Dbh(self::$config);


		//self::$config['log']->log_to_file('Application run');

	}

	public static function run() {

		self::view();

	}

	private static function view() {

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