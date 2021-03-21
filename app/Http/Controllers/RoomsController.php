<?php

namespace App\Http\Controllers;

class RoomsController extends Controller
{
    //
    public function checkAvailableRooms() {
        return view('rooms/checkAvailableRooms');
    }
}
