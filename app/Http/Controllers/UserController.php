<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_Machine_Assoc;
use App\Machine;
use DB;
use App\Http\Transformers\UserTransformer;
use DateTime;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;
use Excel;
use Config;
use Illuminate\Support\Collection;


class UserController extends BaseController {
  /**
  * API to create new user
  */
  public function createUser() {
      $posted_data = Input::all();
      $object = new User();
      if ($object->validate($posted_data)) {
          $posted_data['password']=Hash::make($posted_data['password']);
          $model = User::create($posted_data);
          return response()->json(['status_code' => 200, 'message' => 'User created successfully', 'data' => $model]);
      } else {
          throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to create user.', $object->errors());
      }
  }

  /**
  * API to update users
  */
  public function updateUser() {
      $posted_data = Input::all();
      
      $res = User::find($posted_data['id']);

      if ($res->validate($posted_data)) {
          if($posted_data['password'] == '') {
              unset($posted_data['password']);
          }else{
              $posted_data['password']=Hash::check('plain-text', $posted_data['password'])?$posted_data['password']:Hash::make($posted_data['password']);
          }
          $user = User::where('id',$posted_data['id'])->update($posted_data);
          if ($user){
              $user = User::where('id',$posted_data['id'])->first();
              return response()->json(['status_code' => 200, 'message' => 'User updated successfully', 'data' => $user]);
          }else{
              return response()->json(['status_code' => 404, 'message' => 'User not found']);
          }
      } else {
          throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to update user.', $res->errors());
      }
  }

  /**
  * API to get users list with pagination
  */
  public function getUsers(Request $request) {
    $page = $request->page;
    $limit = $request->limit;
    if(($page == null|| $limit == null) || ($page == -1 || $limit == -1)){
        $users = User::with('role')->paginate(200);
    }
    else{
        $users = User::with('role')->paginate($limit);
    }
    if($users && count($users) > 0){
        foreach ($users as $user_entry ) {
            $machine_data = Machine::where("user_id",$user_entry->id)->first();
            if($machine_data){
                if($machine_data->status =='ENGAGE'){
                    $machine['id'] = $machine_data->id;
                      $machine['machine_name'] =$machine_data->name;
                }
                else{
                    $machine = NULL;
                }

                $user_entry->machine = $machine;  
            }else{
                $user_entry->machine = NULL;
            }   
        }
    }
    if ($users){
        return response()->json(['status_code' => 200, 'message' => 'User list', 'data' => $users]);
    }else{
        return response()->json(['status_code' => 404, 'message' => 'Users not found']);
    }
  }

  /**
  * API to import users (Not in Used)
  */
  public function importUsers(Request $request) {
    try {
      $path = $request->file('csv_file')->getRealPath();
      $datas = Excel::load($path, function($reader) {

      })->get()->toArray();

      $array = array();
      foreach($datas as $data) {
        if($data['name']!=null && $data['email'] != null && $data['password'] != null && $data['role_id'] != null){
          unset($data["0"]);
          $data['password']=Hash::make($data['password']);
          $array[] =implode(', ', ['"' .$data['name'] .'"' , '"' .$data['email'].'"' ,'"' .$data['password'].'"' ,'"' .$data['role_id'].'"']);
        }
      }
      if(count($array)>0){
        $array = Collection::make($array);
        $insertString = '';
        foreach ($array as $ch) {
          $insertString .= '(' . $ch . '), ';
        }
        $insertString = rtrim($insertString, ", ");
        $model =  DB::insert("INSERT INTO users (`name`, `email`,`password`, `role_id`) VALUES $insertString ON DUPLICATE KEY UPDATE `name`=VALUES(`name`),`email`=VALUES(`email`),`password`=VALUES(`password`),`role_id`=VALUES(`role_id`) ");
              return response()->json(['status_code' => 200, 'message' => 'User Imported successfully', 'data' => $model]);
      } else {
        throw new \Dingo\Api\Exception\StoreResourceFailedException('Unable to import empty.');
      }
    } catch (\Exception $e) {
      throw new \Dingo\Api\Exception\StoreResourceFailedException('Data already enter/in valid data in file',[$e->getMessage()]);
    }
  }

  /**
  * API to get user data by ID
  */
  public function getUserById($id) {
    $user = User::where("id",$id)->first();
    if ($user){
      return response()->json(['status_code' => 200, 'message' => 'User info', 'data' => $user]);
    }else{
      return response()->json(['status_code' => 404, 'message' => 'User not found']);
    }
  }
}
