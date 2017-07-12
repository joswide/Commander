<?php
namespace Joswide\Commander;

class Request{
	
	// command name
	protected $commandName;
	
	// arguments
	protected $arguments = [];
	
	private $commander;
	
	public $output = '';
	
	public function getCommander()
	{
		return $this->commander;
	}
	public function execute(Commander $commander){
		// set main commander instance
		$this->commander = $commander;
		
		
		$command = $this->commander->getCommand($this->getCommandName());
		
		// Error. Command does not exist
		if (!$command){
			$this->setOutput('Error: Command does not exist');
			return false;
		}
		
		
		$output = $command->main($this);
		
		$this->setOutput($output);
	}
	
	public function getOutput(){
		return $this->output;
		
		return $this;
	}
	
	public function setOutput($output){
		$this->output = $output;
		
		return $this;
	}
	/**
	 *	Return command name
	 *
	 *	@return String
	 */
	public function getCommandName()
	{
		return $this->commandName;
	}
	
	/**
	 *	Return command name
	 *
	 *	@return Array
	 */
	public function getArguments()
	{
		return $this->arguments;
	}
	
}