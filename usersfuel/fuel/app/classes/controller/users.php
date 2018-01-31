<?php 

class Controller_Users extends Controller_Rest
{

    private $key = "EstonoeslallaveNOTECATASniAUnqueLoMiresNaNoN40y42058923";

    public function post_create()
    {
        try {
            if ( ! isset($_POST['name']) && ! isset($_POST['password'])) 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'parametro incorrecto, se necesita que el parametro se llame name'
                ));

                return $json;
            }

            $input = $_POST;
            $user = new Model_Users();
            $user->name = $input['name'];
            $user->password = $input['password'];
            $user->save();

            $json = $this->response(array(
                'code' => 200,
                'message' => 'usuario creado',
                'data' => ['username' => $input['name']]
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

    public function post_changePassword()
    {
        $change = $_POST;
        $user = new Model_Users();
        $user = Model_Users::find($_POST['id']);

        $user->password = $change['password'];

        $user->save();

        $json = $this->response(array(
            'code' => 200,
            'mesaage' => 'Contraseña cambiada con exito',
            'data' => ['password' => $change['password']]
        ));

        return $json;
    }


    public function get_users()
    {
    	$users = Model_Users::find('all');

    	return $this->response(Arr::reindex($users));

    }

    public function post_delete()
    {
        $user = Model_Users::find($_POST['id']);
        $userName = $user->name;
        $user->delete();

        $json = $this->response(array(
            'code' => 200,
            'message' => 'usuario borrado',
            'name' => $userName
        ));

        return $json;
    }

    public function get_login()
    {
        try {
            $input = $_GET;
            $user = Model_Users::find('all', array(
                'where' => array(
                    array('name', $input['username']),
                )
            ));

            if ( ! empty($user) )
            {
                foreach ($user as $key => $value)
                {
                    $id = $user[$key]->id;
                    $username = $user[$key]->name;
                    $password = $password[$key]->password;
                }
            }
            else
            {
                return $this->response(array('Error de Autentificacion' => 401));
            }

            if ($username == $input['username'] and $password == $input['password'])
            {
                $dataToken = array(
                    "id" => $id,
                    "username" => $username,
                    "password" => $password
                );
                $token = JWT::encode($dataToken, $this->key);
                return $this->response(array('Login Correcto' => 220), ['token' => $token, 'username' => $username]);
            }
            else
            {
                return $this->response(array('Error de Autenticacion' => 401));
            }
        }
        catch (Exception $e)
        {
            return $this->response(array('Error interno del servidor' => 500));
        }
    }
}