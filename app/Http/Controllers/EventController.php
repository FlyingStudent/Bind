<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddEventRequest;
use App\Http\Requests\DeleteEventRequest;
use App\Http\Requests\EditEventRequest;
use App\Http\Resources\EventResource;
use App\Models\EventModel;

class EventController extends BaseController
{
    // show all events

    public function  all()
    {
        $events = EventModel::all();
        $eventResources = EventResource::collection($events);
        $modifiedEvents = [];
        foreach ($events as $event) {
            $parts = $event->parts()->get();
            $totalPrice = 0;
            foreach ($parts as $part) {
                $part_price = $part->price;
                $part_number = $part->pivot->number;
                $totalPrice += $part_price * $part_number;
            }
            $event->price = $totalPrice;
            $modifiedEvents[] = $event;
        }

        $eventResources = EventResource::collection($modifiedEvents);

        return $this->sendResponse($eventResources, "Events:");
    }

    // show event
    public function show(EditEventRequest $request)
    {
        $event = EventModel::find($request->event_id);
        $event['part'] = $event->parts()->get();
        return $this->sendResponse($event, "done");
    }

    //add
    public function add(AddEventRequest $request)
    {
        $event = EventModel::create([
            'user_id' => $request->user_id,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'place_id' => $request->place_id,
            'name' => $request->name,
            'additions' => $request->additions,
            'nameOnTheCard' => $request->nameOnTheCard,
            'music' => $request->music,
        ]);
        $event->save();

        foreach ($request['parts'] as $part) {
            $event->parts()->attach($part['id'], ['number' => $part['number']]);
        }
        return $this->sendResponse($event, "done");
    }

    //delete
    public function delete(DeleteEventRequest $request)
    {
        $event = EventModel::where('id', $request->id)->first();
        if (!$event) {
            return "Event not found";
        }
        $event->delete();
        return $this->sendResponse(null, "delete done");
    }

    //edit
    public function edit(EditEventRequest $request)
    {
        EventModel::where('id', $request->event_id)->update([
            'user_id' => $request->user_id,
            'type_id' => $request->type_id,
            'status_id' => $request->status_id,
            'place_id' => $request->place_id,
            'name' => $request->name,
            'additions' => $request->additions,
            'nameOnTheCard' => $request->nameOnTheCard,
            'music' => $request->music,
        ]);

        return $this->sendResponse(null, "Edited successfully");
    }

    // addImage
    public function addImage(EditEventRequest $request)
    {
        if ($request->hasFile("picture_url")) {
            $image = $request->file('picture_url');
            $imagePath = public_path('images');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move($imagePath, $imageName);
            $thisImage = 'images/' . $imageName;

            EventModel::where('id', $request->event_id)->update([
                'picture_url' => $thisImage,
            ]);

            $event = EventModel::find($request->event_id);
            return $this->sendResponse($event, "Added successfully");
        } else
            return $this->sendError("not found img");
    }
}
