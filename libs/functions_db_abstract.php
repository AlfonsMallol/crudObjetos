<?php
/*
 *
 */

abstract class dbConnectAbstract {
	
	public $link = '';
	
	public function __construct($config) {
		$this->link = $this->connectDBServer ( $config );
		$this->name = "dbConnect";
	}
	
	public function __destruct() {
		print "Destroying " . $this->name . "\n";
	}

	abstract public function connectDBServer($config);
	
	abstract protected  function selectDB($config);
	
	abstract public function queryInsert($sql);
		
	abstract public function query($sql);
	
	abstract public function disconnectDBServer();
}
?>

