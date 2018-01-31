<?php
namespace Fuel\Migrations;

class siguen
{
	function up()
	{
		\DBUtil::create_table('siguen', array(
			'id_seguido' => array('constraint' => 11, 'type' => 'int'),
			'id_seguidor' => array('constraint' => 11, 'type' => 'int')
		), array('id_seguido', 'id_seguidor'), false, 'InnoDB', 'utf8_unicode_ci',
	array(
		array(
			'constraint' => 'claveAjenaSiguenASeguido',
			'key' => 'id_seguido',
			'reference' => array(
				'table' => 'usuarios',
				'column' => 'id'
			),
			'on_update' => 'CASCADE',
			'on_delete' => 'RESTRICT'
			),
		array(
			'constraint' => 'claveAjenaSiguenASeguidor',
			'key' => 'id_seguidor',
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
		\DBUtil::drop_table('siguen');
	}

}