<?php

namespace App\Http\Controllers;

use App\Profession;
use Illuminate\Http\Request;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $professions = Profession::All();

        return $professions;
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
        $insertpro = $request->all();

        $profession = Profession::create($insertpro);

        return $insertpro;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profession = Profession::find($id);
        return $profession;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function edit(Profession $profession)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $insertpro = $request->all();

        $profession = Profession::find($id);

        if(empty($profession)){
            return response()->json(['message'=>'Data Tidak di Temukan !'],404);
        }

        $profession->update($insertpro);
        return response()->json($profession);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profession  $profession
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::find($id);

        if(empty($profession)){
            return response()->json(['message'=>'Data Tidak ditemukan !']); 
        }

        $profession->delete();
        return response()->json(['message'=>'Data Berhasil dihapus !']);
    }
}
