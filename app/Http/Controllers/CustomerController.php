<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customer = Customer::all();
        return $Customer;
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
        $table= Customer::create([
            "nama"=>$request->nama,
            "alamat"=>$request->alamat,
            "no_hp"=>$request->no_hp,
            "email"=>$request->email,
            "pesanan"=>$request->pesanan,
            "lama_pinjam"=>$request->lama_pinjam,
            "methode_pembayaran"=>$request->methode_pembayaran,
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
        $Customer=Customer::find($id);
        if($Customer){
            return response()->json([
                'status' => 200,
                'data' => $Customer
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
        $Customer = Customer::find($id);
        if($Customer){
            $Customer->nama = $request->nama ? $request->nama : $Customer->nama;
            $Customer->alamat = $request->alamat ? $request->alamat : $Customer->alamat;
            $Customer->no_hp = $request->no_hp ? $request->no_hp : $Customer->no_hp;
            $Customer->email = $request->email ? $request->email : $Customer->email;
            $Customer->pesanan = $request->pesanan ? $request->pesanan : $Customer->pesanan;
            $Customer->lama_pinjam = $request->lama_pinjam ? $request->lama_pinjam : $Customer->lama_pinjam;
            $Customer->methode_pembayaran = $request->methode_pembayaran ? $request->methode_pembayaran : $Customer->methode_pembayaran;
            $Customer->save();
            return response()->json([
                'status' => 200,
                'data' => $Customer
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
        $Customer = Customer::where('id', $id)->first();
        if($Customer){
            $Customer->delete();
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
