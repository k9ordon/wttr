<?


//
class Model_Flickrphotos extends Model {

	protected $flickrPhotoSearchApiUrl = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=%s&tags=%s&tag_mode=all&sort=int&place_id=%s&min_upload_date=%s&format=php_serial';

	public function search($tag, $locationId, $minUploadDate = false) {
		$apiUrl = sprintf(
			$this->flickrPhotoSearchApiUrl, 
			getenv('APIKEY_FLICKR'), 
			$tag, 
			$locationId,
			!$minUploadDate ? strtotime('Last Monday', strtotime('Last Month - 4 year')) : $minUploadDate);

		$mem = $this->getMemcache();
		$string = $mem->get($apiUrl);
		if($string) return unserialize($string);

		//echo "caching" . $apiUrl;

		$string = file_get_contents($apiUrl);
		$mem->set($apiUrl, $string, MEMCACHE_COMPRESSED, 60*10);

		//die("cache done");
		return unserialize($string);
	}

}