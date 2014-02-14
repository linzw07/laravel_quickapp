<?php
 
class AppController extends BaseController {
	protected $layout = "layouts.app";

	public function __construct() {
	    $this->beforeFilter('csrf', array('on'=>'post'));
	    $this->beforeFilter('auth');
	}

	public function getDashboard() {
		$this->layout = View::make('layouts.app');
	    $this->layout->content = View::make('app.dashboard');
	}

}

?>