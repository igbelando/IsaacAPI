<?php 

class Controller_Lists extends Controller_Rest
{

	public function post_create()
    {
        try {
            if ( ! isset($_POST['listName'])) 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'parametro incorrecto, se necesita que el parametro se llame listName'
                ));

                return $json;
            }

            $input = $_POST;
            $list = new Model_Lists();
            $list->listName = $input['listName'];

            $list->save();

            $json = $this->response(array(
                'code' => 200,
                'message' => 'lista creada',
                'data' => ['nombreLista' => $input['listName']]
            ));

            return $json;

        } 
        catch (Exception $e) 
        {
            $json = $this->response(array(
                'code' => 500,
                'message' => $e->getMessage(),

            ));

            return $json;
        }        
    }

    public function get_lists()
    {
    	$lists = Model_Lists::find('all');

    	return $this->response(Arr::reindex($lists));

    }
}
