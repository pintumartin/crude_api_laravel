<?php
  
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
class Customer extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=>$this->name ,
            'email'=> $this->email,
            'gend'=>$this->gender,
            'address'=>$this->address,
            'state'=>$this->state,
            'country'=>$this->country,
            'dob'=>$this->dob,
            'password'=>$this->password,
            'city'=>$this->city,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
    
}