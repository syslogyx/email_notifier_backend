<?php

namespace App;
use Validator;

use Illuminate\Database\Eloquent\Model;

class MachineStatus extends Model
{
    protected $table = 'machine_statuses';
	protected $guarded = ['id','created_at', 'updated_at'];
	private $rules = array(
		'machine_id' => 'required',
	    'device_id' => 'required',
	    'status' => 'required',
	    'port' => 'required',
	    'on_time' =>'nullable'
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

	public function device() {
        return $this->belongsTo('App\Device');
    }

    public function machine() {
        return $this->belongsTo('App\Machine');
    }

    public function userEstimation() {
        return $this->hasMany('App\UserEstimation');
    }
}
