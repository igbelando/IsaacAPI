<?php
namespace Fuel\Migrations;

class noticias
{
	function up()
	{
		\DBUtil::create_table('noticias', array(
			'id' => array('type' => 'int', 'constraint' => 11, 'auto_increment' => true),
			'titulo' => array('type' => 'varchar', 'constraint' => 100),  
			'descripcion' => array('type' => 'vachar', 'constraint' => 100), 
			'id_usuario' => array('type' => 'int', 'constraint' => 11), 

		), array('id'), false, 'InnoDB', 'utf8_unicode_ci',
	array(
		array(
			'constraint' => 'claveAjenaNoticiasAUsuario',
			'key' => 'id_usuario',
			'reference' => array(
				'table' => 'usuarios',
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
		\DBUtil::drop_table('noticias');
	}

}