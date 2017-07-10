<?php
namespace Joswide\Commander;

class Argument{
	public $name;
	public $prefix;
	public $longPrefix;
	public $description;
	
	public $defaultValue;
	public $required;
	public $noValue;
	public $castTo;
	
	public function __construct($argument){
		$this->name 		= $argument['name'] ?? null;
		$this->prefix		= $argument['prefix'] ?? null;
		$this->longPrefix	= $argument['longPrefix'] ?? null;
		$this->description	= $argument['description'] ?? null;
		
		$this->defaultValue	= $argument['defaultValue'] ?? null;
		$this->required		= $argument['required'] ?? null;
		$this->noValue		= $argument['noValue'] ?? null;
		$this->castTo		= $argument['castTo'] ?? null;
	}
	
	public function getName(){
		return $this->name;
	}
	
	
	static public function doFromArray($argument){
		return new self($argument);
	}
	
	
}