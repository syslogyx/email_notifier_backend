<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use Notifiable,
        EntrustUserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password',"name","role_id","mobile"
    ];
    private $rules = array(
        'name' => 'required',
        'email' => 'required|unique:users,email,',
        'password' => 'required',
        'role_id' => 'required'
    );
    protected $table = 'users';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];
    private $errors;

    public function validate($data) {
        
      if ($this->id){
            $this->rules['email'] .= $this->id;
            $this->rules['password'] ='';
        }

        $validator = Validator::make($data, $this->rules);
        if ($validator->fails()) {
            $this->errors = $validator->errors();
            return false;
        }
        return true;
    }

    public function errors() {
        return $this->errors;
    }

    public function role() {
      return $this->belongsTo('App\Role')->select(array('id', 'name'));
    }

    public function Machine() {
      return $this->belongsTo('App\User_Machine_Assoc','user_id')->where('status','ENGAGE');
    }

    public function assignMachineData() {
        return $this->hasMany('App\Machine')->where('status','ENGAGE');    
    }


}
