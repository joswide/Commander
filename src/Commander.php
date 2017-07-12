<?php
namespace Joswide\Commander;

class Commander{
	public $requests = [];
	
	// Commands instances
	public $commands = [];
	
	
	public function __construct()
	{
		
	}
	
	public function getCommands()
	{
		return $this->commands;
	}
	
	public function getCommand($commandText){
		if (!($this->isCommandTextDefined($commandText))){
			return false;
		}
		
		return $this->commands[$commandText];
	}
	
	public function addCommand($command, $alias = null)
	{
		if (!($command instanceof Command)){
			return false;
		}
		
		$commandText = $this->getCommandName($command->getName(), $alias);
		
		if ($this->isCommandTextDefined($commandText)){
			return false;
		}
			
		$this->commands[$commandText] = $command;
		
	}
	
	public function isCommandTextDefined($commandText){
		return isset($this->commands[$commandText]);
	}
	
	public function getCommandName($commandName, $alias = ''){
		$commandName = strtolower($commandName);
		
		if ($this->isNamespace($alias)){
			return $alias.$commandName;
		}
		
		if ($this->isGlobalAlias($alias)){
			return $alias;
		}
		if (strlen($alias) > 0){
			return $alias;
		}
		
		return $commandName;
	}
	
	public function isGlobalAlias($alias){
		if (strlen($alias) === 0){
			return false;
		}
		return (strpos($alias, ':') === false);
	}
	public function isNamespace($alias){
		$pos = strpos($alias, ':');
		
		if ($pos === false){
			return false;
		}
		
		return (strlen($alias) == ($pos + 1));
	}
	
	public function request($input)
	{
		
		if (is_string($input)){
			$request = Request\Inline::doFromString($input);
			
			if ($request){
				
				$request->execute($this);
				
				
				$this->requests[] = $request;
				
				return $request;
			}
			
		}
		
		//jgdebug($this);
	}
}