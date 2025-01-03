<?php

require_once 'config.php';

$page = $_GET['page'];

if (!empty($page)) {
	#http://crud-mvc/index.php?page=insertar
	$data = array(
		'inicio' => array('model' => 'dashboardModel', 'view' => 'inicio', 'controller' => 'dashboardController'),
		'inicioProfile' => array('model' => 'dashboardModel', 'view' => 'inicioProfile', 'controller' => 'dashboardController'),
		'descargarReporteMatriz' => array('model' => 'dashboardModel', 'view' => 'descargarReporteMatriz', 'controller' => 'dashboardController'),

		'inicioUsuario' => array('model' => 'UsuarioModel', 'view' => 'inicioUsuario', 'controller' => 'UsuarioController'),
		'loginUsuario' => array('model' => 'UsuarioModel', 'view' => 'loginUsuario', 'controller' => 'UsuarioController'),
		'logoutUsuario' => array('model' => 'UsuarioModel', 'view' => 'logoutUsuario', 'controller' => 'UsuarioController'),


		/*Url Modulo Usuario*/
		'listarUsuarios' => array('model' => 'UsuarioModel', 'view' => 'listarUsuarios', 'controller' => 'UsuarioController'),
		'ModuloUsuario' => array('model' => 'UsuarioModel', 'view' => 'ModuloUsuario', 'controller' => 'UsuarioController'),
		'registrarUsuario' => array('model' => 'UsuarioModel', 'view' => 'registrarUsuario', 'controller' => 'UsuarioController'),
		'verUsuario' => array('model' => 'UsuarioModel', 'view' => 'verUsuario', 'controller' => 'UsuarioController'),
		'modificarUsuario' => array('model' => 'UsuarioModel', 'view' => 'modificarUsuario', 'controller' => 'UsuarioController'),
		'inactivarUsuario' => array('model' => 'UsuarioModel', 'view' => 'inactivarUsuario', 'controller' => 'UsuarioController'),
		'registrarUsuarioConFoto' => array('model' => 'UsuarioModel', 'view' => 'registrarUsuarioConFoto', 'controller' => 'UsuarioController'),

		/* Modulo Roles */
		'inicioRoles' => array('model' => 'RolesModel', 'view' => 'inicioRoles', 'controller' => 'RolesController'),
		'listarRoles' => array('model' => 'RolesModel', 'view' => 'listarRoles', 'controller' => 'RolesController'),
		'registrarRoles' => array('model' => 'RolesModel', 'view' => 'registrarRoles', 'controller' => 'RolesController'),
		'verRoles' => array('model' => 'RolesModel', 'view' => 'verRoles', 'controller' => 'RolesController'),
		'modificarRoles' => array('model' => 'RolesModel', 'view' => 'modificarRoles', 'controller' => 'RolesController'),
		'inactivarRoles' => array('model' => 'RolesModel', 'view' => 'inactivarRoles', 'controller' => 'RolesController'),

		/* Modulo Auditoria */
		'inicioAuditoria' => array('model' => 'AuditoriaModel', 'view' => 'inicioAuditoria', 'controller' => 'AuditoriaController'),
		'listarAuditoria' => array('model' => 'AuditoriaModel', 'view' => 'listarAuditoria', 'controller' => 'AuditoriaController'),
		'registrarAuditoria' => array('model' => 'AuditoriaModel', 'view' => 'registrarAuditoria', 'controller' => 'AuditoriaController'),
		'registrarAuditoriatemporales' => array('model' => 'AuditoriaModel', 'view' => 'registrarAuditoriatemporales', 'controller' => 'AuditoriaController'),









	);

	foreach ($data as $key => $components) {
		if ($page == $key) {
			$model = $components['model'];
			$view = $components['view'];
			$controller = $components['controller'];
		}
	}

	if (isset($model)) {
		require_once 'controllers/' . $controller . '.php';
		$objeto = new $controller();
		$objeto->$view();
	}
} else {
	header('Location: index.php?page=inicioUsuario');
}
