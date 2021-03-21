<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    //
    public function index() {
        return view('client/index');
    }

    public function newClient() {
        return view('client/newClient');
    }

    public function create() {
        return view('client/create');
    }

    public function show($client_id) {
        return view('client/show');
    }
}
