<?

class Controller_Location extends Controller {

	public function Action_Index() {
		if(array_key_exists('local', $_GET) && $_GET['local'] == true) {
			$this->htmlClassList[] = 'local';
		}

		$this->getLocationData();

		$this->weatherType = $this->config['weatherTypes'][$this->weather['weather'][0]['icon']];
		$this->htmlClassList[] = 'type'.ucfirst($this->weatherType['class']);


		$this->getLocationPhotos();
		$this->getHourGraphJson();

		if(array_key_exists(2, $this->router->urlParts) && $this->router->urlParts[2]) {
			$this->location['name'] = $this->router->urlParts[2];
		}
		
		$this->render('location-index');
	}

	protected function getLocationData() {
		$Model_Owm = new Model_Owm(2772400);
		$this->location = $this->config['fake']['locationData'];
		
		$this->weather = $Model_Owm->getWeather();
		$this->hours = $Model_Owm->getHours();

		//var_dump($this->weather);exit;
	}

	protected function getLocationPhotos() {
		$photoApi = new Model_Flickrphotos();

		// day
		$result = $photoApi->search($this->weatherType['flickrtag'], 'xum7xdNQUL_5UeTriA');
		
		// night
		//$result = $photoApi->search('Nacht', 'xum7xdNQUL_5UeTriA');

		$this->locationPhotos = $result['photos']['photo'];
		$threshold = 10;
		$count = count($this->locationPhotos);
		if($threshold < round($count/10)) $threshold = 4;

		$this->randomPhoto = $this->locationPhotos[rand(0,$threshold)];

		//var_dump($this->locationPhotos);exit;
	}

	protected function getHourGraphJson() {
		$array = array(
			'rain' => array(),
			'temp' => array(),
			'clouds' => array()

		);
		foreach(array_slice($this->hours['list'], 0, 7) as $idx => $hour) {
			array_push($array['temp'], array($idx, $hour['main']['temp']));
			array_push($array['rain'], array($idx, $hour['rain']['3h']));
			array_push($array['clouds'], array($idx, $hour['clouds']['all']));
		}

		$this->hourGraphJson = json_encode($array);
	}
}