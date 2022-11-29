<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipe;

class TipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipe = Tipe::all();
        return $tipe;
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
        $table= Tipe::create([
            "jenis"=>$request->jenis,
            "tahun"=>$request->tahun,
            "kapasitas"=>$request->kapasitas,
        ]);

        return response()->json([
            'succes' => 201,
            'message' => 'Berhasil',
            'data' => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Tipe=Tipe::find($id);
        if($Tipe){
            return response()->json([
                'status' => 200,
                'data' => $Tipe
            ], 200);
        } else{
            return response()->json([
                'status' => 404,
                'message' => 'id atas' .$id . 'tidak ditemukan'
            ], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Tipe = Tipe::find($id);
        if($Tipe){
            $Tipe->jenis = $request->jenis ? $request->jenis : $Tipe->jenis;
            $Tipe->tahun = $request->tahun ? $request->tahun : $Tipe->tahun;
            $Tipe->kapasitas = $request->kapasitas ? $request->kapasitas : $Tipe->kapasitas;
            $Tipe->save();
            return response()->json([
                'status' => 200,
                'data' => $Tipe
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=> $id. 'Tidak diketahui'
            ],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Tipe = Tipe::where('id', $id)->first();
        if($Tipe){
            $Tipe->delete();
            return response()->json([
                'status' => 200,
                'message' => $id. 'Berhasil dihapus'
            ],200);
        }else{
            return response()->json([
                'status'=>404,
                'message'=>'gagal hapus'
            ],404);
        }
    }
}
