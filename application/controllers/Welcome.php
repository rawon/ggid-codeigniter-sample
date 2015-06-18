<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('welcome_message');
	}
  
  public function test(){
    $jsonString = '{"access_token": "9BNvAnEA1P6ghPkeoNeJ7khKkeMu23", "token_type": "Bearer", "expires_in": 7889000, "refresh_token": "Kybo3IhtKJLneaGPVq8I9Hp5WhSLiz", "scope": "all"}';
    
    print_r(json_decode($jsonString));
    $this->load->view('welcome_message');
  }
}
