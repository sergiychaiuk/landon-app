<?php

namespace App\Http\Controllers;

class ClientController extends Controller
{
    //
    public function index() {
        return __METHOD__;
    }

    public function newClient() {
        return __METHOD__;
    }

    public function create() {
        return __METHOD__;
    }

    public function show($client_id) {
        return __METHOD__ . ':' . $client_id;
    }
}
