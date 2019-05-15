<?php

namespace App\Http\Controllers;

use Auth;
use App\OfferingType;
use Illuminate\Http\Request;
use App\Http\Requests\OfferingTypeRequest;

class OfferingTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(OfferingType $model)
    {
        return view('offering_types.index', ['offering_types' => $model->paginate(15)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('offering_types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OfferingTypeRequest $request, OfferingType $model)
    {
        $offeringType = new OfferingType;
        $offeringType->name = $request->name;
        $offeringType->description = $request->description;
        $offeringType->user_id = Auth::user()->id;
        $offeringType->status_id = 1;
        $offeringType->save();
        return redirect()->route('offering_type.index')->withStatus(__('OfferingType successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OfferingType  $offeringType
     * @return \Illuminate\Http\Response
     */
    public function show(OfferingType $offeringType)
    {
        $offeringType = OfferingType::find($offeringType->id);
        return view('offering_types.edit')->with('offering_type', $offeringType);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OfferingType  $offeringType
     * @return \Illuminate\Http\Response
     */
    public function edit(OfferingType $offeringType)
    {
        $offeringType = OfferingType::find($offeringType->id);
        return view('offering_types.edit', compact('offering_type'))->with('offering_type', $offeringType);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OfferingType  $offeringType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfferingType $offeringType)
    {
        $offeringType = OfferingType::find($offeringType->id);
        $offeringType->name = $request->name;
        $offeringType->description = $request->description;
        $offeringType->save();
        return redirect()->route('offering_type.index')->withStatus(__('OfferingType successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OfferingType  $offeringType
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfferingType $offeringType)
    {
        $offeringType->delete();
        return redirect()->route('offering_type.index')->withStatus(__('OfferingType successfully deleted.'));
    }
}
