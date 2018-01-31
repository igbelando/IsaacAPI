<?php
namespace Fuel\Migrations;

class usuarios
{
	function up()
	{
	\DBUtil::create_table('usuarios', array(
	'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
	'nombre' => array('type' => 'varchar', 'constraint' => 50),  
	'email' => array('type' => 'varchar', 'constraint' => 50),
	'password' => array('type' => 'varchar', 'constraint' => 50),
	'id_dispositivo' => array('type' => 'varchar', 'constraint' => 50),
	'fotoperfil' => array('type' => 'varchar', 'constraint' => 50),
	'coordenada_x' => array('type' => 'float', 'constraint' => 50),
	'coordenada_y' => array('type' => 'float', 'constraint' => 50),
	'cumple' => array('type' => 'varchar', 'constraint' => 50),
	'descripcion' => array('type' => 'varchar', 'constraint' => 50),
	'id_rol' => array('type' => 'int', 'constraint' => 11),
	'id_privacidad' => array('type' => 'int', 'constraint' => 11),

	), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
	array(
		array(
			'constraint' => 'claveAjenaUsuariosARoles',
			'key' => 'id_rol',
			'reference' => array(
				'table' => 'roles',
				'column' => 'id'
			),
			'on_update' => 'CASCADE',
			'on_delete' => 'RESTRICT'
			),
		array(
			'constraint' => 'claveAjenaUsuariosAPrivacidad',
			'key' => 'id_privacidad',
			'reference' => array(
				'table' => 'privacidad',
				'column' => 'id'
			),
			'on_update' => 'CASCADE',
			'on_delete' => 'RESTRICT'
			)
		)
	);

	}

	function down()
	{
		\DBUtil::drop_table('usuarios');
	}

}