<?php 

class Model_Users extends Orm\Model
{
    protected static $_table_name = 'canciones';

    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK
        'songName' => array(
            'data_type' => 'varchar'   
        ),
        'id_list' => array(
            'data_type' => 'int'   
        )
    );
}