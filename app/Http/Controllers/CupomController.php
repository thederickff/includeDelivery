<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Models\Cupom;
use Illuminate\Http\Request;

class CupomController extends Controller
{
    //
    protected $cupom;

    public function __construct(CupomRepository $repository)
    {
        $this->cupom = $repository;
    }


    public function index()
    {

        $cupoms = $this->cupom->paginate(10);
        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(Request $request)
    {

        $this->cupom->create($request->all());
        return redirect()->route('admin.cupoms');
    }

    /*public function edit($id)
    {

        $cupom = $this->cupom->find($id);
        return view('admin.cupoms.edit', compact('cupom'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->cupom->find($id)->update($request->all());
        return redirect()->route('admin.cupoms');
    }

    public function destroy($id)
    {
        $this->cupom->find($id)->delete();
        return redirect()->route('admin.cupoms');
    }
    */
}
