<?php
	
	class Tezaurus
	{
		
		private $data;
		
		public function __construct($data)
		{
			
			$this->data = $data;
			
		}
		
		public function getSynonyms($word)
		{
			
			if(!empty($this->data[$word])) 
			{
				
				$synonyms = $this->data[$word];
				
			}
			else $synonyms = [];
			
			return json_encode(["word" => $word, "synonyms" => $synonyms]);
					
		}
		
	}
	
	//test
	
	$data = array("market" => array("trade"), "small" => array("little", "compact"));
	$thesaurus = new Tezaurus($data);

	echo $thesaurus->getSynonyms("small"); 
	echo $thesaurus->getSynonyms("asleast"); 
