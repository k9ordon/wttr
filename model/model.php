<?

class model {
	public function __construct() {}

	// @todo singelton bla
	protected function getMemcache() {
		$meminstance = new Memcache();
		$meminstance->pconnect('localhost', 11211);

		return $meminstance;
	}
}

?>