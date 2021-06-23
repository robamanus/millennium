<?php

	class Template{
		
		private $request;
		
		function __construct($request){
			require_once "tpl/" . $request . ".tpl";
		}
	}
?>