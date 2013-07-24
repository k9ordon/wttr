<?

class Model_Zamg extends Model {
	protected $xmlString;
	protected $array = null;

	public function __construct() {}

	public function getWeather() {
		$this->xmlString = file_get_contents('../fakeData/wetter_beispiel.xml');

		//die($this->xmlString);exit;
		return $this->parseWeather();
	}

	public function parseWeather() {
		$xml = simplexml_load_string($this->xmlString);
		$json = json_encode($xml);
		$xmlArray = json_decode($json, true);
		


		$this->array = [];

		// parse xml stations
		foreach($xmlArray['station'] as $idx => $station) {
			//var_dump($station['prognose']['datum'][0]);exit;

			if($idx >= 3) break;

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

			// parse station days
			foreach($station['prognose']['datum'] as $day) {
				var_dump($day);exit;
				$date = $day['@attributes']['value'];
				
				// parse time
			}

			$this->array[] = [
				'name' => $station['@attributes']['name'],
				'today' => $today,
				'foreacast' => $days
			];
		}

		return $this->array;
	}
}

?>