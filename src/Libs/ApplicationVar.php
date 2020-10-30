<?php

namespace LuBan\Top\Libs;

class ApplicationVar
{
	public $saveFile;
	public $application = null;
 	public $appData = '';


	function __construct()
 	{
 	    $this->saveFile = __DIR__.'/httpdns.conf' ;
 		$this->application = [];
 	}

 	public function setValue($var_name,$var_value)
    {
   		if (!is_string($var_name) || empty($var_name))
    		return false;
   
   		$this->application[$var_name] = $var_value;
    }

    public function write()
    {
        $this->appData = @serialize($this->application);
        $this->__writeToFile();
    }

 	public function getValue()
 	{
     	if (!is_file($this->saveFile))
        	 $this->__writeToFile();

     	return @unserialize(@file_get_contents($this->saveFile));
 	}

 	private function __writeToFile()
 	{
  		$fp = @fopen($this->saveFile,'w');

  		if (flock($fp , LOCK_EX | LOCK_NB)) {
  		    @fwrite($fp,$this->appData);
  		    flock($fp , LOCK_UN);
  		}
  		@fclose($fp);
 	}
}