<?php

namespace App\Http\Controllers;

use App\Models\RedPacket;
use Illuminate\Http\Request;

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
        echo  $redPacket;
        $redPacket = $redPacket::find($redPacket);
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
