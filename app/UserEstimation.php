<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class UserEstimation extends Model
{
    protected $table = 'user_estimations';
	protected $guarded = ['id','created_at', 'updated_at'];
	private $rules = array(
	    'user_id' => 'required',
	    'machine_status_id' => 'required',
	    'reason' => 'required',
	    'msg' => 'nullable',
	    'hour'=> 'nullable'
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

	public function machineStatus() {
        return $this->belongsTo('App\MachineStatus');
    }

    public function reasonData() {
        return $this->belongsTo('App\Status_Reason','reason');
    }
}
