<?

class Controller {

	public $config = null;
	public $router = null;

	public $currentUser = null;
	public $country;

	public function init() {
		if($_SESSION && array_key_exists('uid', $_SESSION)) {
		}
	}

	public function render($view) {
		if(file_exists(sprintf('view/%s.php', $view))) {
			require sprintf('view/%s.php', $view);
		} else {
			die('view not found ' . $view);
		}
	}
}