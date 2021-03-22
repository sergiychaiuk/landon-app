<?php

namespace App\Http\Controllers;


use App\Models\Client;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomsController extends Controller
{
    //
    public function checkAvailableRooms($client_id, Request $request) {
        $dateFrom = $request->input('dateFrom');
        $dateTo = $request->input('dateTo');
        $client = new Client();
        $room = new Room();

        $date = [];
        $date['dateFrom'] = $dateFrom;
        $date['dateTo'] = $dateTo;
        $date['rooms'] = $room->getAvailableRooms($dateFrom, $dateTo);
        $date['client'] = $client->find($client_id);
        return view('rooms/checkAvailableRooms', $date);
    }
}
