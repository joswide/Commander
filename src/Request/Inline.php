<?php
namespace Joswide\Commander\Request;

class Inline extends \Joswide\Commander\Request{
	
	public function __construct($inline){
		$parts = explode(' ', $inline);
		
		$this->commandName = current($parts);
		$this->arguments = [];
		
		$args = [];
		$waitingValue = false;
		$prevKey = false;
		
		foreach($parts as $k => $part){
			if ($k == 0){
				$this->commandName = $part;
				continue;
			}
			
			if ($waitingValue){
				$args[] = [
					'prefix'	=> $prevKey,
					'value'		=> $part,
				];
				
				$waitingValue = false;
				$prevKey = false;
				
				continue;
			}
			
			if ($this->isKey($part)){
				$prevKey = $this->getKeyValue($part);
				$waitingValue = true;
				
				continue;
			}
			
			$args[] = [
				'prefix'	=> 'anonimo',
				'value'		=> $part,
			];
		}
		
		$this->arguments = $args;
		
		
		
		echo '<pre>'; print_r($this); echo '</pre>';
		
	}
	
	public function isKey($value){
		return ((strpos($value, '-') === 0) && (strlen($value) > 1));
	}
	
	public function getKeyValue($value){
		return substr($value, 1);
	}
	
}