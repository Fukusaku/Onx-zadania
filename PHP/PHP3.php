<?php
	
	class RankingTable 
	{
		private $players;
		public $results;
		public $defaultRank = 0;
		
		public function __construct($players=array('testPlayer'))
		{
		
			$this->players = $players;
			
			foreach ($this->players as $player)
			{
				
				$this->results[$player]['score'] = 0;
				$this->results[$player]['games'] = 0;
				
			}
		
		}
		
		public function recordResult($player, $score) 
		{
			
			if ( !(in_array($player, $this->players))) 
			{
				echo "Nie ma takiego gracza";
			}
			else
			{
							
				$this->results[$player]['score'] += $score;
				$this->results[$player]['games'] += 1;
			 
			}
		}
		
		public function playerRank($rank)
		{
			
			uasort($this->results, 	function($a, $b) 
									{
										
										if ($a['score'] !== $b['score']) return $b['score'] - $a['score'];
										

										if ($a['games'] !== $b['games']) return $a['games'] - $b['games'];

									});
			
			foreach ($this->results as $player => $name)
			{
		
				$this->defaultRank += 1;
				if($rank == $this->defaultRank) echo $player;
				
			}
			
		}
		
	}

	// dodałem graczy w inny sposób żeby sprawdzić rózne przypadki
	$test = new RankingTable(array('Jan', 'Maks', 'Tomek', 'Monika'));
	$test->recordResult('Jan', 2);
	$test->recordResult('Jan', 2);
	$test->recordResult('Jan', 1);
	$test->recordResult('Maks', 3);
	$test->recordResult('Maks', 2);
	$test->recordResult('Monika', 6);
	$test->recordResult('Tomek', 6);
	
	echo '<pre>';
	print_r($test->results);
	echo '</pre><br/>';
	
	$test->playerRank(3);
	
	echo '<pre>';
	print_r($test->results);
	echo '</pre><br/>';
	