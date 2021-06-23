<?php

require_once $_SERVER['DOCUMENT_ROOT'] . DIRECTORY_SEPARATOR . "core/views/Template.php";

	class GetOddNumbers{
		
		private $result = array();
		
		function __construct($from,$to){
			for($a=$from;$a<=$to;$a++){
				if(($a % 2 == 1) || ($a % 2 == -1)){
					$this->result[] = $a;
				}
			}
		}
		function GetResult(){
			return $this->result;
		}
	}
?>