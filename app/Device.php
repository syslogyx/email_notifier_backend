<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Device extends Model {

  protected $table = 'devices';
  protected $guarded = ['id','created_at', 'updated_at'];
  private $rules = array(
      'name' => 'required|unique:devices,name,'
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

  public function machine() {
        return $this->belongsToMany('App\Machine', 'machine_device_assocs','device_id','machine_id')->latest();
  }

  public function machineData() {
        return $this->belongsTo('App\Machine','machine_id');
  }

  public function status_reason_port_one_0() {
        return $this->belongsTo('App\Status_Reason','port_1_0_reason')->where('id','<>',1);
  }

  public function status_reason_port_one_1() {
        return $this->belongsTo('App\Status_Reason','port_1_1_reason')->where('id','<>',1);
  }

  public function status_reason_port_two_0() {
        return $this->belongsTo('App\Status_Reason','port_2_0_reason')->where('id','<>',1);
  }

  public function status_reason_port_two_1() {
        return $this->belongsTo('App\Status_Reason','port_2_1_reason')->where('id','<>',1);
  }

}
