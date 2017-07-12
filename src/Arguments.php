<?php
namespace Joswide\Commander;

class Arguments{
	public $items = [];
	
	
	
	public function addArguments($arguments)
	{
		foreach($arguments as $argument){
			$this->addArgument($argument);
		}
	}
	
	public function addArgument($argument)
	{
		if ($argument instanceof Argument){
			$this->items[$argument->getName()] = $argument;
			
			return true;
		}
		
		if (is_array($argument)){
			$argumentInstance = Argument::doFromArray($argument);
			
			if ($argumentInstance){
				$this->items[$argumentInstance->getName()] = $argumentInstance;
				
				return true;
			}
		}
		
		return false;
	}
	
	
	public function get($name)
	{
		if (!$this->defined($name))
			return null;
			
		return $this->items[$name];
	}
	
	public function defined($name)
	{
		return isset($this->items[$name]);
	}
	
	
	
	
	
}