<?

class Controller_Location extends Controller {

	public function Action_Index() {
		if($_GET['local'] == true) {
			$this->htmlClassList[] = 'local';
		}

		$this->getLocationData();

		if($this->router->urlParts[2]) {
			$this->location['name'] = $this->router->urlParts[2];
		}
		
		$this->render('location-index');
	}

	public function getLocationData() {
		$this->location = $this->config['fake']['locationData'];
	}
}