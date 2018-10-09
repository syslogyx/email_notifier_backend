<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Validator;


class Status_Reason extends Model
{
  protected $fillable = [
      'status', 'reason'
  ];
  private $rules = array(
      'status' => 'required',
      'reason' => 'required'
  );
  protected $table = 'status__reasons';
  protected $guarded = ['id', 'created_at', 'updated_at'];
  protected $hidden = ['created_at', 'updated_at','created_by','updated_by'];
  private $errors;

  public function validate($data) {
    return $data;
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

  // public function device() {
  //       return $this->hasOne('App\Device');
  // }
}
