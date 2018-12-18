<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class OldDeviceRecordAssoc extends Model
{
  protected $table = 'old_device_record_assocs';
  protected $guarded = ['id','created_at', 'updated_at'];
  private $rules = array(
      'name' => 'required'
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

}
