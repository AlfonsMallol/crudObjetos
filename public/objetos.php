<?php

// Crear una clase

class miClase {
	// Propiedades
	public $mipropiedad = 'variable pública';
	
	// Metodos
	public function miMetodo() {
		echo "hola mundo";
		return NULL;
	}
}

$miObjeto = new miClase();
$miObjeto->miMetodo();

echo "<br/>";
echo $miObjeto -> mipropiedad;

echo "<br/>";
$miObjeto -> mipropiedad = "otra cosa";
echo $miObjeto -> mipropiedad;

$miObjeto2 = new miClase;
echo "<br/>";
$miObjeto2->miMetodo();

class SimpleClass
{
	// valid member declarations:
	public $pi = 3.1416;
	public $var6 = myConstant;
// 	public $var7 = self::pi;
	public $var8 = array(true, false);
	
	function displayVar(){
		echo "Simple class\n";
		return;
	}
}

$objeto2 = new SimpleClass();
echo $objeto2->pi;
echo "<br/>";
// echo $objeto2->var7;

class ExtendClass extends SimpleClass
{
	// Redefine the parent method
	function displayVar()
	{
		echo "Extending class\n";
		parent::displayVar();
	}
}
$extended = new ExtendClass();
$extended->displayVar();

class MyDestructableClass {
	function __construct() {
		print "In constructor\n";
		$this->name = "MyDestructableClass";
	}
	function __destruct() {
		print "Destroying " . $this->name . "\n";
	}
}
$obj = new MyDestructableClass();

?>