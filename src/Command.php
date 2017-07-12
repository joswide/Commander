<?php
namespace Joswide\Commander;

class Command{
	
	public $name;
	public $description;
	
	public $arguments; // Arguments class
	
	public function __construct()
	{
		// Create instance of Commander\Arguments
		$this->arguments = new Arguments();
	}
	
	public function getId()
	{
		return strtolower($this->name);
	}
	public function getName()
	{
		return $this->name;
	}

	/**
	 *	Add a simple argument to command
	 *
	 *	@param Commander\Argument|array $argument
	 *	@return $this
	 *
	 */
	public function addArgument($argument)
	{
		$this->arguments->addArgument($argument);
		
		return $this;	
	}
	
	/**
	 *	Add a array of arguments to command
	 *
	 *	@param array $arguments
	 *	@return $this
	 *
	 */
	public function addArguments($arguments)
	{
		$this->arguments->addArguments($arguments);	
		
		return $this;
	}
	
	
	
	public function main(Request $request)
	{
		
	}
	
	
	
	
}