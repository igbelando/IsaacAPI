<?php
namespace Fuel\Migrations;

class canciones
{
	function up()
	{
		\DBUtil::create_table('canciones', array(
			'id' => array('type' => 'int', 'constraint' => 5, 'auto_increment' => true),
			'titutlo' => array('type' => 'varchar', 'constraint' => 50),  
			'artista' => array('type' => 'varchar', 'constraint' => 50),
			'url' => array('type' => 'varchar', 'constraint' => 50),
			'reproducciones' => array('type' => 'int', 'constraint' => 11),
		), array('id'));
}

	function down()
	{
		\DBUtil::drop_table('canciones');
	}

}