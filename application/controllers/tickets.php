<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tickets extends CI_Controller
{
	public function print()
	{
		$data["atencion"][0]["ticket"] = $_GET["ticket"];
		$data["atencion"][0]["preferential"] = $_GET["preferential"];
		$this->load->view('ticket', $data);
	}
}
