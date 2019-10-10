<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class BlogControllerAPI extends Controller
{
    protected $blogService;
    public function __construct(\App\Http\Services\BlogService $blogService)
    {
        $this->blogService = $blogService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blog = $this->blogService->getAll();
        return response()->json($blog,200);
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
        $dataCustomer = $this->blogService->create($request->all());
        return response()->json($dataCustomer['blogs'],$dataCustomer['statusCode']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dataBlog = $this->blogService->findById($id);
        return response()->json($dataBlog['blogs'],$dataBlog['statusCode']);
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
    public function update(Request $request, $id)
    {
        $dataBlog = $this->blogService->update($request->all(),$id);
        return response()->json($dataBlog['blogs'], $dataBlog['statusCode']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataBlog = $this->blogService->destroy($id);

        return response()->json($dataBlog['message'], $dataBlog['statusCode']);
    }
}
