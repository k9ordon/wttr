<?


//
class Model_Flickrphotos extends Model {

	protected $flickrPhotoSearchApiUrl = 'http://api.flickr.com/services/rest/?method=flickr.photos.search&api_key=%s&tags=%s&sort=int&place_id=%s&format=php_serial';

	public function search($tag, $locationId) {
		$string = file_get_contents(sprintf(
			$this->flickrPhotoSearchApiUrl, 
			getenv('APIKEY_FLICKR'), 
			$tag, 
			$locationId));
		//die($string);
		return unserialize($string);
	}

}