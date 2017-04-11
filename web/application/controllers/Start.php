<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Start extends CI_Controller {

	public function index()
	{
		$data = [];

		$l = $this->input->get('l');

		$this->load->helper('trans');
		$data['trans'] = d_get_locale($l);
		
		$data['langList'] = d_get_locale_list();
		
		if ($l) {
			$data['_l'] = $l;
		}
		else {
			$data['_l'] = 'pt';
		}
		
		$this->load->view('start', $data);
	}
}
