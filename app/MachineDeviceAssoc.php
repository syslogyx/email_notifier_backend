<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class MachineDeviceAssoc extends Model
{
    protected $table = 'machine_device_assocs';
    protected $guarded = ['id', 'created_at', 'updated_at'];
    private $rules = array(
        'machine_id' => 'required',
        'device_id' => 'required'
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
