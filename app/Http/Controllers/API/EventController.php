<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     // return Event::all();
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */

    // public function show($role, Event $event)
    // {
    //     if (in_array($role, ['admin', 'client'])) {
    //         return ['role'=>$role,'event' => $event];
    //     } else {
    //         abort(404);
    //     }
    // }

    public function client(Event $event)
    {
        return $event;
    }
    public function admin(Event $event)
    {
        return $event;
    }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \App\Models\Event  $event
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, Event $event)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Event  $event
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Event $event)
    // {
    //     //
    // }
}
