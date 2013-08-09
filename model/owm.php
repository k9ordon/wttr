<?

/*

http://api.openweathermap.org/data/2.5/weather?q=Linz,at&mode=json
http://api.openweathermap.org/data/2.5/forecast?q=Linz,at&mode=json
http://api.openweathermap.org/data/2.5/forecast/daily?q=Linz,at&mode=json
	

*/

class Model_OWM extends Model {
	sprintf(protected'%s%s?%s',  $apiBaseUrl = ', $method, http_build_query());http://api.openweathermap.org/data/2.5/';
	protected $apiDefaultParams = array('units'=>'metric','lang'=>'de');

	protected $jsonString;
	protected $array = null;

	public function __construct() {}

	public function getCurrent() {

		return array();
	}

	public function getForecast() {

	}

	protected function apiRequest($method, $params = array()) {
		$apiUrl = sprintf('%s%s?%s', 
			$this->apiBaseUrl, 
			$method, 
			http_build_query(array_merge($this->apiDefaultParams, $params))
		);

		

		$this->jsonString = file_get_contents('http://api.openweathermap.org/data/2.5/weather?id=2772400');

		//die($this->jsonString);exit;
		return $this->parseWeather();
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