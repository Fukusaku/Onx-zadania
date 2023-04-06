<?php
	
	class Pipeline 
	{
		
		public function make(...$fxs) 
		{
			
			return function($arg) use ($fxs) 
			{
				
				$result = $arg;
				foreach ($fxs as $function) 
				{
					
					$result = $function($result);
					
				}
				return $result;
			};
		}
	}
	
	//test
	
	$pip = new Pipeline;
	
	$funct = $pip->make(
		function($var) { return $var * 3; },
		function($var) { return $var + 1; },
		function($var) { return $var / 2; }
	);

	echo $funct(3); //zwraca 5
