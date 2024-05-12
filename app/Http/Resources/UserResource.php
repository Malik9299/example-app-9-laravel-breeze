<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'isAdmin' => $this->is_admin,
            // 'password' => $this->password,
            // 'lastName' => $this->last_name,
            // 'phoneNumber' => $this->phone_number,
            // 'userAddress' => $this->user_address,
            // 'userBlodGroup' => $this->user_blod_group,
            'extraInfoAboutUser' => [
                'rememberToker' => $this->remember_token,
                'emailVerifiedAt' => $this->email_verified_at,
            ],

            // 'stratSessionToken' => $this->when(
            //     request()->has('stratSessionToken'),
            //     fn () => request()->get('stratSessionToken')
            // ),
        ];
    }
}
