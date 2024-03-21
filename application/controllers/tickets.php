<?php
defined('BASEPATH') or exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Content-Type: application/json");

class Tickets extends CI_Controller
{
	public function __construct()
	{
		header('Access-Control-Allow-Origin: *');
		parent::__construct();
	}

	public function print()
	{
		$data["atencion"][0]["ticket"] = $_GET["ticket"];
		$data["atencion"][0]["preferential"] = $_GET["preferential"];
		$this->load->view('ticket', $data);
	}
}
