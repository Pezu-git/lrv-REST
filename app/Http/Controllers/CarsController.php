<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Http\Requests\CarsRequest;
use Illuminate\Http\Response;

class CarsController extends Controller
{
    public function index()
    {
        return Cars::paginate(2);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarsRequest $request)
    {
        return Cars::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cars  $cars
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Cars::findOrFail($id);
    }

    public function update(CarsRequest $request, Cars $cars)
    {
        $cars->fill($request->validated());
        return $cars->save();
    }

    public function destroy(Cars $cars)
    {
        if ($cars->delete()) {
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return null;
    }
}
