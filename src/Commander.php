<?php
namespace Joswide\Commander;

class Commander{
	public $requests = [];
	
	public $commands = [];
	
	
	public function __construct(){
		
	}
	
	public function addCommand($command){
		if ($command instanceof Command){
			$this->commands[] = $command;
		}
		
		return false;
	}
	
	public function request($input){
		
		if (is_string($input)){
			$request = new Request\Inline($input);
			
			if ($request){
				$this->requests[] = $request;
			}
			
		}
		
		//jgdebug($this);
	}
}