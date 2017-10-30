<?php
/* An easy way to keep in track of external processes.
* Ever wanted to execute a process in php, but you still wanted to have somewhat controll of the process ? Well.. This is a way of doing it.
* @compability: Linux only. (Windows does not work).
* @author: Peec
*/
class Process{

    private $command;
    private $pid;
	private $status;

    public function __construct($cl=false){
        if ($cl != false){
            $this->command = $cl;
            $this->runCom();
        }
    }
    private function runCom(){
        //Linux only  $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';


        if($_ENV["server"]["os"] == "windows")
        {

	        $output = "hls_".md5($this->command);
            $command="{$this->command} > ".LOG_PATH."/{$output}";
        }
        else
        {

            $command = 'nohup '.$this->command.' > /dev/null 2>&1 & echo $!';
        }

        $resource =proc_open($command,[
		   0 => array("pipe", "r"),  // stdin
    1 => array("pipe", "w"),  // stdout -> we use this
    2 => array("pipe", "w")   // stderr 
	],$pipe);
		

		$this->status= proc_get_status($resource);
        $this->pid = $this->status["pid"];
		

    }

    /**
     * @return mixed
     */
    public function getPid()
    {
        return $this->pid;
    }
	
	 public function getStatus()
    {
		return $this->status;
	}

    static function stop($pid){

        if($_ENV["server"]["os"] == "windows")
        {
            $command = "taskkill /F /T /PID {$pid}";
        }
        else
        {
            $command = 'kill -9 '.$pid;
        }
        exec($command);
    }
}
?>