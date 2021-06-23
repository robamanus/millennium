<?php

require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "core/models/GetOddNumbers.php";
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "core/views/Template.php";
require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "core/views/ShowResult.php";

	class Router{
		
		private $request;
		private $page;
		private $all_pages = array(
					"index" => "index",
					"404"	=> "404",
				);
		
		function __construct(){
			$this->request = $_SERVER["REQUEST_URI"];
			$this->request = substr_replace($this->request, "", 0, 1);
			switch($this->request){
				default:
					$this->page = $this->Page404(); break;
				case false:
					$this->page = $this->Index(); break;
				case "get_odd_numbers":
					$from = htmlspecialchars($_POST['from']);
					$to = htmlspecialchars($_POST['to']);
					if((is_numeric($from) === false) || (is_numeric($to) === false)){
						echo "Вы ввели не числа!";
						return;
					}
					elseif(($to>9999) || ($to<-9999) || ($from>9999) || ($from<-9999)){
						echo "Вы ввели числа за пределами диапазона [-9999;9999]!";
						return;
					}
					else{
						$odd_numbers_from_range = new GetOddNumbers($from,$to);
						$show_result = new ShowResult($odd_numbers_from_range->GetResult());
						$show_result->PrintResult();
						return;
					}
					break;
			}
			new Template($this->page);
		}
		function Index(){
			return $this->all_pages["index"];
		}
		function Page404(){
			return $this->all_pages["404"];
		}
	}
?>