<?php

namespace App\Http\Controllers;

use App\Models\inbox;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response('No inbox id given', 404);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $inbox = Inbox::create(
            ['user_id' => Auth::id()]
        );
        return response()->json($inbox, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function show(inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function edit(inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inbox  $inbox
     * @return \Illuminate\Http\Response
     */
    public function destroy(inbox $inbox)
    {
        $inbox->delete();
    }
}
