<?php

namespace App\Http\Controllers;

use App\Http\Requests\DossierRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DossierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($uuid)
    {
        $dossiers = DB::select("select * from dossiers where uuid='" .$uuid."'");
        return response()->json([
            'dossiers' => $dossiers
        ], 200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DossierRequest $request)
    {
        DB::insert("insert into dossiers (uuid, login, password, name) values (?, ?, ?, ?)", [
            $request->uuid,
            $request->login,
            $request->password,
            $request->name
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
    public function update(DossierRequest $request, $uuid)
    {
        DB::update("update dossiers set password=?, name=? where uuid=?", [
            $request->password,
            $request->name,
            $uuid
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
    public function destroy($uuid)
    {
        DB::delete("delete from dossiers where uuid=?", [$uuid]);
        return response()->json([
            'uuid' => $uuid
        ], 204);
    }
}
