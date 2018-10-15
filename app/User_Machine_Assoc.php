<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class User_Machine_Assoc extends Model
{
    protected $table = 'user__machine__assocs';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    private $rules = array(
        'machine_id' => 'required',
        'user_id' => 'required'
    );
    private $errors;

    public function validate($data) {

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

    public function machine() {
      return $this->belongsTo('App\Machine' , 'machine_id');
    }
}
