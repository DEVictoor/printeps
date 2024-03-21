<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends CI_Controller
{
	public function print()
	{
		// echo "Hello world";
		// print_r($_GET);
		$data["atencion"][0]["ticket"] = $_GET["ticket"];
		$data["atencion"][0]["preferential"] = $_GET["preferential"];
		$this->load->view('ticket', $data);
	}
}
