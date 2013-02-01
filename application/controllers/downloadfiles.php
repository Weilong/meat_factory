<?
class downloadfiles extends CI_Controller{
	public function download()
	{
		$currentdate = $_GET['currenttime'];
		header("Content-type:application/csv");

		// It will be called downloaded.pdf
		header("Content-Disposition:attachment;filename='".$currentdate.".csv'");
		
		// The PDF source is in original.pdf
		readfile("file/".$currentdate.".csv");
	}
}
?>