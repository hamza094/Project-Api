<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;


class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
           'name'=>$this->name,

        $this->mergeWhen($this->status == 'OFF', [
            'decription'=>Str::of($this->description)->limit(20),
        ]), 

        $this->mergeWhen($this->status == 'ON', [
            'description' => $this->description,
            
        ]), 

           'created_at'=>$this->created_at->diffForHumans()
        ];
    }
}
