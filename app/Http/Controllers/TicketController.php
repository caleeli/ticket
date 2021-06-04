<?php

namespace App\Http\Controllers;

use App\Event;

class TicketController extends Controller
{
    public function show(Event $event)
    {
        return view('ticket', compact('event'));
    }
}
