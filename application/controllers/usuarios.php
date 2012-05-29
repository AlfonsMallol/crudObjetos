<?php
/**
 * Usuarios controller
 *
 * Controller for application usuarios.
 * 
 * @uses       none
 * @package    Usuarios
 * @subpackage Controller
 */
/**
 * Incluir librerias
 */
class usuariosController
{
	public $db = '';
	public $usuario = '';
	public $content = '';
	public $route = '';
	public $datos = '';
	public $config = '';
	
	public function __construct($config) {
		$this->config = $config;
		require_once ($this->config ['models'] . "/usuarios.php");

		$this->db = new dbConnect ( $this->config );
		$this->route = mvc::route ( 'usuarios', 'select' );
		
		$this->_init ();
	}
	
	public function __destruct() {
	
	}
	
	/**
	 * Inicializacion de variables
	 */
	protected function _init() {
		$this->datos = usuariosModel::initUserData ();
		echo $this->route['controller'].$this->route['action']."Action()";
		$this->{$this->route['action']."Action"}();
	}
	
	public function selectAction() {
		$usuarios = usuariosModel::readUsers ( $this->db );
		$viewVar = array (
				'usuarios' => $usuarios,
				'helper' => $this->config ['helpers'] 
		);
	}
	
	public function insertAction() {
		if (isset ( $_POST ['usuario'] )) {
			// Procesar formulario de insert
			usuariosModel::procesar ( $this->config ['usersUploadDirectory'] . "/images", $this->config );
			header ( "Location: ?controller=usuarios&action=select" );
		} else {
			// Mostrar formulario
			$viewVar = array (
					'usuario' => '',
					'datos' => $this->datos,
					'db' => $this->db,
					'helper' => $this->config ['helpers'] 
			);
		}
	}
	
	public function updateAction() {
		if (isset ( $_POST ['usuario'] )) {
			// Procesar formulario de insert
			usuariosModel::procesarUpdate ( $this->db, $this->config ['usersUploadDirectory'] . "/images", $this->config );
			header ( "Location: ?controller=usuarios&action=select" );
			break;
		} else {
			$this->datos = usuariosModel::readUserData ( $this->db, $this->config ['usersUploadDirectory'] . "/images" );
		}
	}
	
	public function deleteAction() {
		if (isset ( $_POST ['usuario'] )) {
			// Procesar formulario de insert
			if ($_POST ['delete'] == 'Si')
				usuariosModel::procesarDelete ( $this->db, $this->config ['usersUploadDirectory'] . "/images", $this->config );
			header ( "Location: ?controller=usuarios&action=select" );
			break;
		} else {
			$usuarios = usuariosModel::readUserById ( $this->db, $_GET ['usuario'] );
			$viewVar = array (
					'usuarios' => $usuarios,
					'helper' => $this->config ['helpers'] 
			);
		}
	}
	
	/**
	 * Mostrar
	 */
	public function render() {
		$content = views::view ( $viewVar, $this->config ['views'] . '/' . $route ['controller'] . '/' . $route ['action'] . '.phtml' );
		$this->db->disconnectDBServer ();
	}
}

?>