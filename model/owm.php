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

	protected $jsonString;
	protected $array = null;

	protected $city;

	public function __construct($city = 2772400) {
		$this->city = $city;
	}


	public function getWeather() {
		$weather = $this->apiRequest('weather', array('id' => $this->city));
		return $weather;
	}

	public function getHours() {
		return $this->apiRequest('forecast', array('id' => $this->city));
	}

	public function getDays() {
		return $this->apiRequest('forecast/daily', array('id' => $this->city, 'cnt' => 16));
	}

	protected function apiRequest($method, $params = array()) {
		$apiUrl = sprintf('%s%s?%s', 
			$this->apiBaseUrl, 
			$method, 
			http_build_query(array_merge($this->apiDefaultParams, $params))
		);

		$mem = $this->getMemcache();
		$json = $mem->get($apiUrl);

		if($json) return $json;

		//echo "caching" . $apiUrl;

		$json = json_decode(file_get_contents($apiUrl), true);
		$mem->set($apiUrl, $json, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");

		return $json;
	}

	public function parseWeather() {
		$json = json_decode($this->jsonString, true);
		//var_dump($json);exit;

		$this->array = [];


		$today = [
			'time' => null,
			'type' => [
				'name' => null,
				'class' => null,
			],
			'temp' => 0,
			'min' => 0,
			'max' => 0,
			'rain' => 0,
			'detail' => [
				['icon', 'type' => [], 'time', 'temp', 'rain']
			]
		];

		$days = [
			//'overview' 
			'hours' => []
		];


		return $this->array;
	}
}

?>