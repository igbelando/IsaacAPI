<?php
namespace Fuel\Migrations;

class users
{
	function up()
	{
	\DBUtil::create_table('IsaacAPI', array(
	'id' => array('type' => 'int', 'constraint' => 5, 'auto_incremental' => true),
	'name' => array('type' => 'varchar', 'constraint' => 50),  
	'password' => array('type' => 'varchar', 'constraint' => 50),

	), array('id'));

	}

	function down()
	{
		\DBUtil::drop_table('IsaacAPI');
	}

}