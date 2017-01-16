<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Repositories\ClientRepository;

class ClientsController extends Controller
{
    //
    protected $client;

    public function __construct(ClientRepository $repository)
    {
        $this->client = $repository;
    }


    public function index()
    {

        $clients = $this->client->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(ClientRequest $request)
    {

        $this->client->create($request->all());
        return redirect()->route('admin.clients');
    }

    public function edit($id)
    {

        $client = $this->client->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $this->client->find($id)->update($request->all());
        return redirect()->route('admin.clients');
    }

    public function destroy($id)
    {
        $this->client->find($id)->delete();
        return redirect()->route('admin.clients');
    }
}
