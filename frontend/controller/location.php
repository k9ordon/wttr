<?

class Controller_Location extends Controller {

	protected $locationQuery = 'Linz AT';

	public function Action_Index() {
		if(array_key_exists('local', $_GET) && $_GET['local'] == true) {
			$this->htmlClassList[] = 'local';
		}

		if(array_key_exists(1, $this->router->urlParts) && $this->router->urlParts[1]) {
			$this->locationQuery = $this->router->urlParts[1];
		}

		$this->getLocationData();

		$this->weatherType = $this->config['weatherTypes'][$this->weather['weather'][0]['icon']];
		$this->htmlClassList[] = 'type'.ucfirst($this->weatherType['class']);


		$this->getLocationPhotos();
		$this->getHourGraphJson();
		
		$this->render('location-index');
	}

	protected function getLocationData() {
		$Model_Owm = new Model_Owm($this->locationQuery);
		$this->location = $this->config['fake']['locationData'];
		
		$this->weather = $Model_Owm->getWeather();
		$this->hours = $Model_Owm->getHours();

		//var_dump($this->weather);exit;
	}

	protected function getLocationPhotos() {
		$photoApi = new Model_Flickrphotos($this->locationQuery);

		// day
		$result = $photoApi->search($this->weatherType['flickrtag']);
		
		// night
		//$result = $photoApi->search('Nacht', 'xum7xdNQUL_5UeTriA');

		$this->locationPhotos = $result['photos']['photo'];
		$count = count($this->locationPhotos);

		if(round($count/10) < 1) $threshold = 3;
		else $threshold = round($count/10);

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
			@$hour['main']['temp'] ? array_push($array['temp'], array($idx, $hour['main']['temp'])) : false;
			@$hour['rain']['3h'] ? array_push($array['rain'], array($idx, $hour['rain']['3h'])) : false;
			@$hour['clouds']['all'] ? array_push($array['clouds'], array($idx, $hour['clouds']['all'])) : false;
		}

		$this->hourGraphJson = json_encode($array);
	}
}