<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    protected $token;

    public function addToken(string $token) {
        $this->token = $token;

        return $this;
    }

    public function toArray($request)
    {
        return [
            'email' => $this->email,
            'name' => $this->name,
            'token' => $this->when($this->token !== null, $this->token),
        ];
    }
}
