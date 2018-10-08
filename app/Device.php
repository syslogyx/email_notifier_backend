<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Device extends Model {

  protected $table = 'devices';
  protected $guarded = ['id','created_at', 'updated_at'];
  private $rules = array(
      'name' => 'required:unique:devices,name,'
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

}
