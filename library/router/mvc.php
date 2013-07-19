<?

class Router_Mvc {

	private $config;

	public $parsedUrl;
	public $urlParts;
	public $country;

	public $controllerName;
	public $actionName;

	public $controller;

	public function __construct($config) {
		$this->config = $config;
	}

	public function run() {
		$this->parsedUrl = parse_url($_SERVER['REQUEST_URI']);
		$this->urlParts = split('/', $this->parsedUrl['path']);

		
		// controller
		$this->controllerName = 'Controller_' . (array_key_exists(1, $this->urlParts) && !empty($this->urlParts[1]) ? $this->urlParts[1] : $this->config['defaultControllerName']);
		
		//var_dump($this->controllerName);exit;

		$this->controller = new $this->controllerName;

		$this->controller->config = $this->config;
		$this->controller->router = $this;
		//$this->controller->l = new Localizer($this->country['lang']);

		$this->controller->init();

		// action
		$this->actionName = 'Action_' . (array_key_exists(2, $this->urlParts) && !empty($this->urlParts[2]) ? $this->urlParts[2] : $this->config['defaultActionName']);
		$c = $this->controller;
		$a = $this->actionName;

		if(!method_exists($c, $a)) $c->Action_Index();
		else $c->$a();
	
	}

}
