<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nofun extends MX_Controller {

	public function index()
	{
		echo "<h1>No Fun</h1>";
	}
	function sayHello($name){
		echo "Hello ",$name.". How do you do?";
	}
}
