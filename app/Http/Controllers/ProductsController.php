<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\ProductsRequest;
use CodeDelivery\Repositories\CategoryRepository;
use CodeDelivery\Repositories\ProductRepository;


class ProductsController extends Controller
{
    //
    protected $repository;
    protected $repositoryCategory;

    public function __construct(ProductRepository $repository,CategoryRepository $categoryRepository)
    {
       $this->repository = $repository;
       $this->repositoryCategory = $categoryRepository;
    }


    public function index()
    {

        $products = $this->repository->paginate(10);
        return view('admin.products.index', compact('products'));
        
    }
    public function create()
    {
        $category = $this->repositoryCategory->listStyle();
        return view('admin.products.create', compact('category'));
    }

    public function store(ProductsRequest $request)
    {

        $this->repository->create($request->all());
        return redirect()->route('admin.products');
    }

    public function edit($id)
    {

        $product = $this->repository->find($id);
        $category = $this->repositoryCategory->listStyle();
        return view('admin.products.edit', compact('product', 'category'));
    }

    public function update(ProductsRequest $request, $id)
    {
        $this->repository->find($id)->update($request->all());
        return redirect()->route('admin.products');
    }

    public function destroy($id)
    {
        $this->repository->find($id)->delete();
        return redirect()->route('admin.products');
    }


}
