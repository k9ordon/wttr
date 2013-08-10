<?

/* icons * /
foreach(array(1,2,3,4,9,10,11,13,50) as $i) echo sprintf( '<br>%02dd', $i ).'<img src="'.sprintf( 'http://openweathermap.org/img/w/%02dd.png', $i ).'">'.sprintf( '%02dn', $i ).'<img src="'.sprintf( 'http://openweathermap.org/img/w/%02dn.png', $i ).'">'; exit;

/*

http://openweathermap.org/api

http://api.openweathermap.org/data/2.5/weather?q=Linz,at&mode=json
http://api.openweathermap.org/data/2.5/forecast?q=Linz,at&mode=json
http://api.openweathermap.org/data/2.5/forecast/daily?q=Linz,at&mode=json&cnt=16


icons
http://openweathermap.org/wiki/API/Weather_Condition_Codes#Icon_list

*/

class Model_Owm extends Model {
	protected $apiBaseUrl = 'http://api.openweathermap.org/data/2.5/';
	protected $apiDefaultParams = array('units'=>'metric','lang'=>'de', 'mode' => 'json');

	protected $city;

	// 2772400 

	public function __construct($placeQuery = 'Hawaii') {
		$places = $this->loadPlace($placeQuery);
//var_dump($places);exit;

		$this->place = $places['list'][0];
// var_dump($this->place);
	}


	public function loadPlace($query) {
		$apiUrl = $this->apiUrl('find', array('q' => $query, 'type' => 'like'));

		$mem = $this->getMemcache();
		$json = $mem->get($apiUrl);

		if($json) return $json;

		//echo "caching" . $apiUrl;

		$json = json_decode(file_get_contents($apiUrl), true);
		$mem->set($apiUrl, $json, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");

		return $json;
	}

	public function getPlace() {
		return $this->place;
	}

	public function getWeather() {
		$apiUrl = $this->apiUrl('weather', array('id' => $this->place['id']));

		$mem = $this->getMemcache();
		$json = $mem->get($apiUrl);

		if($json) return $json;

		//echo "caching" . $apiUrl;

		$json = json_decode(file_get_contents($apiUrl), true);
		$mem->set($apiUrl, $json, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");

		return $json;
	}

	public function getHours() {
		$apiUrl = $this->apiUrl('forecast', array('id' => $this->place['id']));

		$mem = $this->getMemcache();
		$json = $mem->get($apiUrl);

		if($json) return $json;

		//echo "caching" . $apiUrl;

		$json = json_decode(file_get_contents($apiUrl), true);
		$mem->set($apiUrl, $json, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");

		return $json;
	}

	public function getDays() {
		$apiUrl = $this->apiUrl('forecast/daily', array('id' => $this->place['id'], 'cnt' => 16));

		$mem = $this->getMemcache();
		$json = $mem->get($apiUrl);

		if($json) return $json;

		//echo "caching" . $apiUrl;

		$json = json_decode(file_get_contents($apiUrl), true);
		$mem->set($apiUrl, $json, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");

		return $json;
	}

	protected function apiUrl($method, $params = array()) {
		return sprintf('%s%s?%s', 
			$this->apiBaseUrl, 
			$method, 
			http_build_query(array_merge($this->apiDefaultParams, $params))
		);
	}
}

?>