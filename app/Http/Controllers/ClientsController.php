<?php

namespace CodeDelivery\Http\Controllers;


use CodeDelivery\Http\Requests\ClientRequest;
use CodeDelivery\Repositories\ClientRepository;
use CodeDelivery\Services\ClientService;

class ClientsController extends Controller
{
    //
    protected $client;
    protected $clientService;

    public function __construct(ClientRepository $repository, ClientService $clientService)
    {
        $this->client = $repository;
        $this->clientService = $clientService;
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
        $data = $request->all();
        $this->clientService->create($data);
        return redirect()->route('admin.clients');
    }

    public function edit($id)
    {

        $client = $this->client->find($id);
        return view('admin.clients.edit', compact('client'));
    }

    public function update(ClientRequest $request, $id)
    {
        $data = $request->all();

        $this->clientService->update($data, $id);
        return redirect()->route('admin.clients');
    }

    public function destroy($id)
    {
        $this->client->find($id)->delete();
        return redirect()->route('admin.clients');
    }
}
