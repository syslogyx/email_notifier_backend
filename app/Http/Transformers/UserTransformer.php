<?php

namespace App\Http\Transformers;

use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract {

    public function transform(\App\User $user) {

        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'role_id'=> $user->role_id
        ];
    }


}
