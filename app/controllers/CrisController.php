<?php

class CrisController extends HomeController{

    //function for getting all users
    function getUsers(){
      $users = User::get();

      if(count($users) > 0){
          return Response::json($users);
      }else{
          return Response::json(array('message' => '0 User found!'));
      }
    }

    //function for add a new user
    function postUser(){

        $rules = array(
            'username' => 'required|unique:users',
            'password' => 'required|same:password_confirm',
            'password_confirm' => 'required',
            'email' => 'required|email|unique:users',
            'last_name' => 'required',
            'first_name' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);
        if($validator->fails()){
          return Response::json(array('message' => array('error' => $validator->errors()->all())));
        }else{
            $user_create = User::insert(array(
                  'username' => Input::get('username'),
                  'password' => Hash::make(Input::get('password')),
                  'email' => Input::get('email'),
                  'first_name' => Input::get('first_name'),
                  'last_name' => Input::get('last_name')
            ));

          if($user_create == true){
             return Response::json(array('message' => array('created' => 'New user has been successfully created! With the user ID of '.DB::getPdo()->lastInsertId())));
          }else{
             return Response::json(array('message' => array('error' => 'An Error Occrured! Please try again later')));
          }
        }

    }

    //function for updating user data
    function putUser($id){

        $user = User::where('id', $id)->first();

        if(count($user) > 0){
          if($_GET){
                $rules = array();
				$username = array('username' => (Input::get('username')) ? 'required' : '');
				$email = array('email' => '');
				$password = array('password' => '');
				$password_conf = array('password_confirm' => '');
				$l_name = array('l_name' => '');
				$f_name = array('f_name' => '');

                if(array_key_exists('username', $_GET)){
                   $username = array('username' => 'required');
                }
				if(array_key_exists('email', $_GET)){
                   $email = array('email' => 'required|email');
                }
				if(array_key_exists('password', $_GET)){
                   $password = array('password' => 'required|same:password_confirm');
                }
				if(array_key_exists('password_confirm', $_GET)){
                   $password_conf = array('password_confirm' => 'required');
                }
				if(array_key_exists('first_name', $_GET)){
                   $f_name = array('first_name' => 'required');
                }
				if(array_key_exists('last_name', $_GET)){
                   $l_name = array('last_name' => 'required');
                }

		        $rules = array_merge($username, $password, $password_conf, $email, $l_name, $f_name);

				$validator = Validator::make(Input::all(), $rules);

				if($validator->fails()){
					return Response::json(array('message' => array('error' => $validator->errors()->all())));
				}else{
	               $update_user = User::where('id', $id)
	                            ->update(array(
	                                  'username' => ((Input::get('username')) ? Input::get('username') : $user->username),
	                                  'email' => ((Input::get('email')) ? Input::get('email') : $user->email),
	                                  'password' => ((Input::get('password')) ? Hash::make(Input::get('password')) : $user->password),
	                                  'first_name' => ((Input::get('first_name')) ? Input::get('first_name') : $user->first_name),
	                                  'last_name' => ((Input::get('last_name')) ? Input::get('last_name') : $user->last_name),

	                            ));

	              if($update_user == true){
	                  return Response::json(array('message' => array('updated' => 'User ID '.$id.' has been successfully updated!')));
	              }else{
	                  return Response::json(array('message' => array('error' => 'An error occured! Please try again.')));
	              }
			  }
          }else{
              return Response::json(array('message' => array('error' => 'An error occured! No post data recieve.')));
          }
        }else{
          return Response::json(array('message' => array('error' => 'Invalid user ID!')));
        }

        return Response::json(array('message' => array('error' => 'No data found!')));

    }

    //function for deleting a user
    function deleteUser($id){
      $user_delete = User::where('id', $id)->delete();

      if($user_delete){
         return Response::json(array('message' => array('deleted' => 'User ID '.$id.' has been successfully deleted!')));
      }else{
         return Response::json(array('message' => array('error' => 'User does not exist!')));
      }

      return Response::json(array('message' => array('error' => 'An error occured!')));
    }
}

?>