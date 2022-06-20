<?php

namespace App\Http\Controllers;

use App\Http\Requests\EcritureRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EcritureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $ecritures = DB::select("select * from ecritures where compte_uuid='" .$uuid."'");
        return response()->json([
            'ecritures' => $ecritures
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($uuid, EcritureRequest $request)
    {
        DB::insert("insert into ecritures (uuid, compte_uuid, label, date, type, amount) values (?, ?, ?, ?, ?, ?)", [
            $request->uuid,
            $uuid,
            $request->label,
            $request->date,
            $request->type,
            $request->amount
        ]);
        return response()->json([
            'uuid' => $request->uuid
        ], 201);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($uuid, $uuid_ecriture, EcritureRequest $request)
    {
        DB::update("update ecritures set label=?, date=?, type=?, amount=? where compte_uuid=? and uuid=?", [
            $request->label,
            $request->date,
            $request->type,
            $request->amount,
            $uuid,
            $uuid_ecriture
        ]);
        return response()->json([
            'uuid' => $uuid
        ], 204);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($uuid, $uuid_ecriture)
    {
        DB::delete("delete from ecritures where uuid=?", [$uuid_ecriture]);
        return response()->json([
            'uuid' => $uuid_ecriture
        ], 204);
    }
}
