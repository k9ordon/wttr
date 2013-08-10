<?

class Controller_Location extends Controller {

	protected $locationQuery = 'Linz, AT';

	protected $randomPhoto = null;

	public function Action_Index() {
		if(array_key_exists('local', $_GET) && $_GET['local'] == true) {
			$this->htmlClassList[] = 'local';
		}

		if(array_key_exists(1, $this->router->urlParts) && $this->router->urlParts[1]) {
			$this->locationQuery = $this->router->urlParts[1];
		}

		$this->getLocationData();

		echo $this->weather['weather'][0]['icon'] . "\n";

		$this->weatherType = $this->config['weatherTypes'][$this->weather['weather'][0]['icon']];
		$this->htmlClassList[] = 'type'.ucfirst($this->weatherType['class']);


		$this->getLocationPhotoRecursive();

		$this->getHourGraphJson();
		
		$this->render('location-index');
	}

	protected function getLocationData() {
		$Model_Owm = new Model_Owm($this->locationQuery);
		// $this->location = $this->config['fake']['locationData'];
		
		$this->weather = $Model_Owm->getWeather();
		$this->hours = $Model_Owm->getHours();
		$this->days = $Model_Owm->getDays();

		//var_dump($this->days);exit;
	}

	protected function getLocationPhotoRecursive($min = 1) {
		$photos = $this->getLocationPhotos($this->weather['name']);
		var_dump($this->weather['name'].' found '.count($photos));

		if(count($photos) >= $min) return $this->getRandomLoactionPhoto($photos, 3);

		$photos = $this->getLocationPhotos($this->locationQuery);
		var_dump($this->locationQuery.' found '.count($photos));
		if(count($photos) >= $min) return $this->getRandomLoactionPhoto($photos, 3);

		//exit;
	}

	protected function getLocationPhotos($query) {
		$photoApi = new Model_Flickrphotos($query);
		$result = $photoApi->search(@$this->weatherType['flickrsearch'], @$this->weatherType['flickrtag']);

		return $result['photos']['photo'];
	}

	protected function getRandomLoactionPhoto($photos, $max) {

		$photos = array_slice($photos, 0, $max);
		//var_dump($photos);exit;
		
		echo('possible photos' . $max);

		$this->randomPhoto = $photos[array_rand($photos)];
		//var_dump($this->randomPhoto);exit;
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