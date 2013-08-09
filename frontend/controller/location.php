<?

class Controller_Location extends Controller {

	public function Action_Index() {
		if(array_key_exists('local', $_GET) && $_GET['local'] == true) {
			$this->htmlClassList[] = 'local';
		}

		$this->getLocationData();
		$this->getLocationPhotos();


		$this->htmlClassList[] = 'type'.ucfirst($this->location['today']['type']['class']);

		if(array_key_exists(2, $this->router->urlParts) && $this->router->urlParts[2]) {
			$this->location['name'] = $this->router->urlParts[2];
		}
		
		$this->render('location-index');
	}

	public function getLocationData() {
		$this->location = $this->config['fake']['locationData'];
		//var_dump($this->location);exit;
	}

		public function getLocationPhotos() {
		$photoApi = new Model_Flickrphotos();

		$result = $photoApi->search($this->location['today']['type']['flickrtag'], 'xum7xdNQUL_5UeTriA');
		$this->locationPhotos = $result['photos']['photo'];
		$this->randomPhoto = $this->locationPhotos[rand(0,1)];
		//var_dump($this->locationPhotos);exit;
	}
}