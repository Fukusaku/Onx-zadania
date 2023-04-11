<?php
	
	class Textinput 
	{
		public $value = '';
		
		public function add($text) 
		{
			
			 $this->value .= $text;
			 
		}
		
		public function getValue()
		{
			
			return $this->value;
			
		}
		
	}
	
	class Numericinput extends Textinput
	{
		
		public function add($text) 
		{
			
			if(is_numeric($text))
			{
				parent::add($text);
			}
			 
		}
		
	}
	
	//test
		
	$input = new Textinput;
	
	$input->add("text");	
	$input->add("TEXT2");
	
	echo $input->getValue().'<br/>';
	
	$number = new Numericinput;
	
	$number->add("test");	
	$number->add("test123");	
	$number->add("666");
	
	echo $number->getValue();