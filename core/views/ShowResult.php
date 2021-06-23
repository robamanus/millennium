<?php

	class ShowResult{
		
		private $result_array;
		
		function __construct($result_array){
			$this->result_array = $result_array;
		}
		public function PrintResult(){
			print_r($this->result_array);
		}
	}
?>