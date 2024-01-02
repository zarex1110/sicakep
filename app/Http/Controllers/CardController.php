<?php

namespace App\Http\Controllers;

use App\Models\card;
use App\Http\Requests\StorecardRequest;
use App\Http\Requests\UpdatecardRequest;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorecardRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(card $card)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(card $card)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecardRequest $request, card $card)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(card $card)
    {
        //
    }
}
