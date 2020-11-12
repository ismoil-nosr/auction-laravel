<?php

namespace App\Http\Controllers;

use App\Http\Requests\LotStoreRequest;
use App\Models\Lot;
use Illuminate\Http\Request;

class LotController extends Controller
{
    public function index()
    {
        $lots = Lot::activeLots()->latest()->paginate(9);
        return view('lot.list', compact('lots'));
    }

    /**
     * Show the form for creating a new model.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lot.add');
    }

    /**
     * Store a newly created model in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LotStoreRequest $request)
    {
        $lot = Lot::create($request->validated());
        return redirect('/' . $lot->slug);
    }

    /**
     * Display the specified model.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function show(Lot $lot)
    {
        $bids = $lot->bids()->latest()->get();
        return view('lot.view', compact('lot', 'bids'));
    }

    /**
     * Show the form for editing the specified model.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function edit(Lot $lot)
    {
        return view('lot.edit', compact('lot'));
    }

    /**
     * Update the specified model in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function update(LotStoreRequest $request, Lot $lot)
    {
        return $lot->update($request->validated());
    }

    /**
     * Remove the specified model from storage.
     *
     * @param  \App\Models\Lot  $lot
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lot $lot)
    {
        return $lot->delete();
    }
}
