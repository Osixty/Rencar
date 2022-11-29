<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Owner = Owner::all();
        return $Owner;
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
        $table= owner::create([
            "nama_mobil"=>$request->nama_mobil,
            "no_pol"=>$request->no_pol,
            "kapasitas"=>$request->kapasitas,
            "stok"=>$request->stok,
            "harga"=>$request->harga,
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
        $Owner=owner::find($id);
        if($Owner){
            return response()->json([
                'status' => 200,
                'data' => $Owner
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
        $Owner = owner::find($id);
        if($Owner){
            $Owner->nama_mobil = $request->nama_mobil ? $request->nama_mobil : $Owner->nama_mobil;
            $Owner->no_pol = $request->no_pol ? $request->no_pol : $Owner->no_pol;
            $Owner->kapasitas = $request->kapasitas ? $request->kapasitas : $Owner->kapasitas;
            $Owner->stok = $request->stok ? $request->stok : $Owner->stok;
            $Owner->harga = $request->harga ? $request->harga : $Owner->harga;
            $Owner->save();
            return response()->json([
                'status' => 200,
                'data' => $Owner
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
        $Owner = owner::where('id', $id)->first();
        if($Owner){
            $Owner->delete();
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
