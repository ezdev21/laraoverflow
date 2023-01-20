<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBadgeRequest;
use App\Http\Requests\UpdateBadgeRequest;
use App\Models\Badge;

class BadgeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreBadgeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBadgeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function show(Badge $badge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function edit(Badge $badge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBadgeRequest  $request
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBadgeRequest $request, Badge $badge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Badge  $badge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Badge $badge)
    {
        //
    }
}
