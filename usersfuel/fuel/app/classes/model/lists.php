<?php 

class Model_Lists extends Orm\Model
{
    protected static $_table_name = 'lists';

    protected static $_primary_key = array('id');
    protected static $_properties = array(
        'id', // both validation & typing observers will ignore the PK
        'listName' => array(
            'data_type' => 'varchar'   
        )
    );
}