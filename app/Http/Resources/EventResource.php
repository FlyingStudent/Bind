<?php

namespace App\Http\Resources;

use App\Models\Event;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\BookingModel;
use App\Models\StatusModel;

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
        $status= StatusModel::find($this->status_id);
        $booking= BookingModel::where("place_id", $this->place_id)->get();
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'status' => $status ? $status->name : null,
            'total_price'=>$this->price,
            //'date' => $booking ? $booking->end_date : null,
            'picture_url'=>$this->picture_url,
        ];
    }


}

