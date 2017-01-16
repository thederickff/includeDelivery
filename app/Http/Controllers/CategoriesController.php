<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\CategoryRequest;
use CodeDelivery\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    protected $category;

    public function __construct(CategoryRepository $repository)
    {
        $this->category = $repository;
    }


    public function index()
    {

        $categories = $this->category->paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(CategoryRequest $request)
    {

        $this->category->create($request->all());
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {

        $category = $this->category->find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, $id)
    {
        $this->category->find($id)->update($request->all());
        return redirect()->route('admin.categories');
    }

    public function destroy($id)
    {
        $this->category->find($id)->delete();
        return redirect()->route('admin.categories');
    }
}
