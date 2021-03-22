<?php

namespace App\Http\Controllers;

use App\Models\Client as Client;
use App\Models\Title as Title;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * @var array
     */
    private $titles;
    /**
     * @var Client
     */
    private $client;

    public function __construct(Title $titles, Client $client )
    {
        $this->titles = $titles->all();
        $this->client = $client;
    }
    //
    public function index() {
        $data = [];

        $data['clients'] = Client::all();

        return view('client/index', $data);
    }

    public function newClient( Request $request, Client $client) {
        $data = [];

        $data['title'] = $request->input('title');
        $data['name'] = $request->input('name');
        $data['last_name'] = $request->input('last_name');
        $data['address'] = $request->input('address');
        $data['zip_code'] = $request->input('zip_code');
        $data['city'] = $request->input('city');
        $data['state'] = $request->input('state');
        $data['email'] = $request->input('email');


        if( $request->isMethod('post') )
        {
            //dd($data);
            $this->validate(
                $request,
                [
                    'name' => 'required|min:5',
                    'last_name' => 'required',
                    'address' => 'required',
                    'zip_code' => 'required',
                    'city' => 'required',
                    'state' => 'required',
                    'email' => 'required',

                ]
            );

            $client->insert($data);

            return redirect('clients');
        }

        $data['titles'] = $this->titles;
        $data['modify'] = 0;

        return view('client/form', $data);
    }

    public function create() {
        return view('client/create');
    }

    public function show($client_id) {
        $data = [];
        $data['titles'] = $this->titles;
        $data['modify'] = 1;
        $data['client_data'] = Client::where('id', $client_id)->get()->first();
        return view('client/form', $data);
    }
}
