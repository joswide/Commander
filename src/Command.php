<?php
namespace Joswide\Commander;

class Command{
	
	public $name;
	public $description;
	
	public $arguments; // Arguments class
	
	public function __construct(){
		$this->arguments = new Arguments();
	}
	
	public function addArguments($arguments){
		
		$this->arguments->addArguments($arguments);
		
	}
	
	
	
	public function main(){
		
	}
	
	
	
	
}