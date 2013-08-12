<?


//
class Model_Flickrphotos extends Model {

	protected $apiBaseUrl = 'http://api.flickr.com/services/rest/';
	protected $apiDefaultParams = array('method' => null, 'api_key'=> null, 'format'=>'php_serial');

	protected $place;

/*
	http://api.flickr.com/services/rest/

	?method=flickr.photos.search & api_key=%s&tags=%s&tag_mode=all&sort=int&place_id=%s&min_upload_date=%s&format=php_serial

	?method=flickr.places.find&api_key=1c3376b3342e47b9a93f57745c94483a&query=Wilhering+AT&format=rest
*/

	public function __construct($place = false) {
		if(is_array($place)) {
			$this->place = $place;
		}
		elseif($placeQuery !== false) {
			$places = $this->loadPlace($placeQuery);
			$this->place = $places['places']['place'][0];
		}		

	}

	public function loadPlace($query) {
		$apiUrl = $this->apiUrl(
			'flickr.places.find', 
			array(
				'query' => urlencode($query)
			)
		);

		$mem = $this->getMemcache();
		$string = $mem->get($apiUrl);
		if($string) return unserialize($string);

		//echo "caching" . $apiUrl;

		$string = file_get_contents($apiUrl);
		$mem->set($apiUrl, $string, MEMCACHE_COMPRESSED, 60 * 60 * 24 * 7);

		//die("cache done");

		return unserialize($string);
	}

	public function getPlace() {
		return $this->place;
	}

	public function setPlace() {

	}

	public function search($query, $tags, $locationSearch = 'place_id', $minUploadDate = false) {
		//var_dump($this->place);

		$params = array();
		if($locationSearch == 'place_id') {
			$params['place_id'] = $this->place['place_id'];
			$params['accuracy'] = 11;
		} 
		elseif($locationSearch == 'latlng') {
			$params['lat'] = $this->place['latitude'];
			$params['lon'] = $this->place['longitude'];
			$params['radius_units'] = 'km';
			$params['radius'] = 8;
		}

		$apiUrl = $this->apiUrl(
			'flickr.photos.search', 
			array_merge($params, array(
				//'extras' => 'geo',
				//'tag_mode' => 'or', 
				//'is_commons' => "true",
				//'license' => '4,5,6',
				'sort' => 'interestingness-desc', 
				'content_type' => 1,
				'min_taken_date' => !$minUploadDate ? strtotime('Last Monday', strtotime('Last Month - 4 year')) : $minUploadDate,
				//'tags' => $tags,
				'text' => urlencode($query)		
			))
		);
		
		//echo "\n".$apiUrl."\n";

		$mem = $this->getMemcache();
		$string = $mem->get($apiUrl);
		if($string) return unserialize($string);

		//echo "caching" . $apiUrl;

		$string = file_get_contents($apiUrl);
		$mem->set($apiUrl, $string, MEMCACHE_COMPRESSED, 60 * 60 * 24 * 7);

		//die("cache done");

		return unserialize($string);
	}

	protected function apiUrl($method, $params = array()) {
		return sprintf('%s?method=%s&%s', 
			$this->apiBaseUrl, 
			$method, 
			urldecode(http_build_query(array_merge($this->apiDefaultParams, array('api_key' => getenv('APIKEY_FLICKR')), $params)))
		);
	}

}