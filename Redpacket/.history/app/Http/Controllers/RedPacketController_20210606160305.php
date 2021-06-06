<?php

namespace App\Http\Controllers;

use App\Models\RedPacket;
use Illuminate\Http\Request;
use App\Http\Resources\RedpacketResource;

class RedPacketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response([ 'Data' => new RedPacketResource(RedPacket::all()), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = $request->all();

        $validator = Validator::make($data, [
            'amount' => 'required|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'user' => 'required|max:255',
            'quantity' => 'required|boolean',
            'random' => 'required'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }

        $project = Project::create($data);

        return response([ 'Data' => new RedPacketResource(RedPacket::all()), 'message' => 'Retrieved successfully'], 200);
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
        return response([ 'Data' => new RedPacketResource(RedPacket::all()), 'message' => 'Retrieved successfully'], 200);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RedPacket  $redPacket
     * @return \Illuminate\Http\Response
     */
    public function show(RedPacket $redPacket)
    {
        //
        var_dump($redPacket);
        // $redPacket = $redPacket::find($redPacket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RedPacket  $redPacket
     * @return \Illuminate\Http\Response
     */
    public function edit(RedPacket $redPacket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RedPacket  $redPacket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RedPacket $redPacket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RedPacket  $redPacket
     * @return \Illuminate\Http\Response
     */
    public function destroy(RedPacket $redPacket)
    {
        //
    }
}
