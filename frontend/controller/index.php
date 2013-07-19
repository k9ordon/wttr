<?

class Controller_Index extends Controller {

	public function Action_Index() {
		$this->getItems();
		$this->render('index-index');
	}

	public function getItems() {
		$this->numbers = range(1,5);
	}
}