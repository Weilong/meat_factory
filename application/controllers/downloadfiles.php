<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Downloadfiles extends CI_Controller{
	public function index()
	{
		$currentdate = $_GET['currenttime'];
		header("Content-type:application/csv");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='".$currentdate.".csv'");
		
		// The PDF source is in original.pdf
		readfile("file/".$currentdate.".csv");
	}
	public function clientreportdownloading()
	{
		$currentdate = $_GET['currenttime'];
		header("Content-type:application/csv");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='".$currentdate.".csv'");
		
		// The PDF source is in original.pdf
		readfile("file/client_info/".$currentdate.".csv");
	}
	public function supplierreportdownloading()
	{
		$currentdate = $_GET['currenttime'];
		header("Content-type:application/csv");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='".$currentdate.".csv'");
		
		// The PDF source is in original.pdf
		readfile("file/supplier_info/".$currentdate.".csv");
	}
	public function productreportdownloading()
	{
		$currentdate = $_GET['currenttime'];
		header("Content-type:application/csv");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='".$currentdate.".csv'");
		
		// The PDF source is in original.pdf
		readfile("file/product_info/".$currentdate.".csv");
	}
}
?>