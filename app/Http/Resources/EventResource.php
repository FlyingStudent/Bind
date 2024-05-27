<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Booking;
use App\Models\Status;
class EventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */  
    
    public function toArray($request)
    {
        $status= Status::find($this->status_id);
        $booking= Booking::where("place_id", $this->place_id)->get();           
        return [
            'id'=>$this->id,
            'name'=>$this->name,            
            'status' => $status ? $status->name : null,
            'total_pric'=>$this->price,
            //'date' => $booking ? $booking->end_date : null,
            'picture_url'=>$this->picture_url,
        ];    
    }


}

