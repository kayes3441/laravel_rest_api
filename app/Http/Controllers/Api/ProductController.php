<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;
use App\Models\Product;
use Validator;

class ProductController extends BaseController 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        // return $this->sendResponse($product->toArray(),'Product Retrieved');
        return $this->sendResponse(ProductResource::collection($product),'Product Retrieved');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(),[
            'name'           =>'required',
            'description'    =>'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $product = Product::create($request->all());
        return $this->sendResponse(new ProductResource($product),'Product Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if (is_null($product)){
            return $this->sendError('Product Not found');
        }
        return $this->sendResponse(new ProductResource($product),'Product Is available');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
        // $product = Product::find($id);
        $validator = Validator::make($request->all(),[
            'name'           =>'required',
            'description'    =>'required',
        ]);
        if ($validator->fails()){
            return $this->sendError('Validator Error',$validator->errors());
        }
        $product->update($request->all());
        return $this->sendResponse(new ProductResource($product),'Product Is Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return $this->sendResponse(new ProductResource($product),'Product Is Deleted');
    }
}
