<?php

namespace App\Http\Controllers;

use App\Models\Kost;
use Illuminate\Http\Request;

class KostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dbKost = Kost::all();
        return view('index', compact('dbKost'));
    }

    public function admindata()
    {
        //
        $dbKost = Kost::all();
        return view('Admin.Kost.data-kost', compact('dbKost'));
    }


    public function admininput()
    {
        //
        return view('Admin.Kost.input-kost');
    }

    public function simpankost(Request $request){



        $randomize = rand(111111, 999999);
        $extension = $request->file('fotopath')->getClientOriginalExtension();
        $filename = $randomize . '.' . $extension;
        $image = $request->file('fotopath')->move('images/categories/', $filename);


        Kost::create([
            'nama' => $request->nama,
            'foto_path' => $image,
            'cordinat_x' => $request->cordinat_x,
            'cordinat_y' => $request->cordinat_y,
            'harga' => $request->harga,
            'fasilitas' => $request->fasilitas,
        ]);


        return redirect('admininput');
    }


    public function search()
    {
        //
        $dbKost = Kost::all();
        
        return view('Admin.Kost.data-kost', compact('dbKost'));
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
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function show(Kost $kost)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function edit(Kost $kost)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kost $kost)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kost  $kost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kost $kost)
    {
        //
    }
}
