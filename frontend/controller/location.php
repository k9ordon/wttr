<?

class Controller_Location extends Controller {

	public function Action_Index() {
		$this->getLocationData();
		$this->render('location-index');
	}

	public function getLocationData() {
		$this->location = $this->config['fake']['locationData'];
	}
}