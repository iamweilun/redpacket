<?php

namespace App\Http\Controllers;

use App\Models\RedPacket;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
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
        $data = $request->all();
        $validator = Validator::make($data, [
            'amount' => 'required|gt:0|regex:/^\d{1,13}(\.\d{1,4})?$/',
            'user' => 'required|max:255',
            'quantity' => 'required|integer',
            'random' => 'required|boolean'
        ]);


        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        
        $user = User::find($data['user']);
        if(empty($user)){
            return response(['error' => "Invalid User", 'Error']);
        }

        $redPacketData = [
            'user_id' => $user->id,
            'amount' => $data['amount'],
            'total_quantity' => $data['quantity'],
            'random' => $data['random'],
        ];

        $RedPacket = RedPacket::create($redPacketData);

        return response([ 'Data' => new RedPacketResource($RedPacket), 'message' => 'Create Redpacket successfully'], 200);

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
        $data = $request->all();
        $validator = Validator::make($data, [
            'user' => 'required|max:255',
            'redpacket' => 'required|integer'
        ]);

        if ($validator->fails()) {
            return response(['error' => $validator->errors(), 'Validation Error']);
        }
        
        $user = User::find($data['user']);
        $redPacket = RedPacket::find($data['redpacket']);

        if(empty($user)|| empty($redPacket)){
            return response(['error' => "Invalid User or Redpacket", 'Error'], 200);
        }

        if( $redPacket->amount <= 0 ){
            return response(['message' => "Redpacket is empty"], 200);
        }

        if( $redPacket->random ){
            $amount = number_format(rand(0.1,$redPacket->amount), 2, '.', '');
        } else {
            $amount = number_format($redPacket->amount / $redPacket->total_quantity, 2, '.', '');
        }

        $user_arr = !empty(json_decode($redPacket->random,true)) ? json_decode($redPacket->random,true):[];
        if(in_array($user->id, $user_arr)) {
            return response([ 'message' => "User ".$user->id." have taken this red packet"], 200); 
        } else {
            array_push($user_arr,$user->id);
        }

        $redPacket->amount = $redPacket->amount - $amount;
        $redPacket->total_quantity = $redPacket->total_quantity - 1;
        $redPacket->total_quantity = $redPacket->total_quantity - 1;
        $redPacket->save();
        
        return response([ 'message' => "User ".$user->id." receive ".$amount], 200);
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
