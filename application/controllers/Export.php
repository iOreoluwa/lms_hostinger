<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Export extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();/* call CodeIgniter's default Constructor */
		$this->load->database();/* load database libray manually */
		$this->load->model('User_model');/* load Model */
	}
	public function index(){
		$data['usersData'] = $this->User_model->getUserDetails();
		// $this->load->view('backend/admin/navigation',$data); 
        // $this->load->view('backend/admin/navigation', $data);

        $this->load->view('backend/admin/navigation',$data);

	}
	public function export_csv(){ 
		/* file name */
		$filename = 'users_'.date('Ymd').'.csv'; 
		header("Content-Description: File Transfer"); 
		header("Content-Disposition: attachment; filename=$filename"); 
		header("Content-Type: application/csv; ");
	   /* get data */
		$usersData = $this->User_model->getUserDetails();
		/* file creation */
		$file = fopen('php:/* output','w'); 
		$header = array("First Name","Last Name","Email"); 
		fputcsv($file, $header);
		foreach ($usersData as $key=>$line){ 
			fputcsv($file,$line); 
		}
		fclose($file); 
		exit; 
	}

	// public function export_csv(){ 
	// 	echo 'Hello World';
	// }
	
}