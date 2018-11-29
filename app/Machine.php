<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Machine extends Model
{
    protected $table = 'machines';
	protected $guarded = ['id','created_at', 'updated_at'];
	private $rules = array(
	    'name' => 'required|unique:machines,name,',
	    'email_ids' => 'required'
	);

	private $errors;

	public function validate($data) {
		if ($this->id)
            $this->rules['name'] .= $this->id;
        
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

	public function devices() {
        return $this->belongsToMany('App\Device', 'machine_device_assocs','machine_id','device_id')->where('machine_device_assocs.status','ENGAGE')->latest()->first();
    }

    public function user() {
        return $this->belongsTo('App\User','user_id');
    }

   

}
