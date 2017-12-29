<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Barang;
use Yajra\Datatables\Html\Builder;
use Yajra\Datatables\Datatables;
use DB;

class BarangsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = DB::table('barangs')
            ->join('jenis', 'jenis.id','=','barangs.id_jenis')
            ->select('barangs.*','jenis.nama')->get();
        return view('barangs.index')->with(compact('barang'));
    }

    public function lab()
    {
        //
        $barang = DB::table('barangs')
            ->join('jenis', 'jenis.id','=','barangs.id_jenis')
            ->select('barangs.*','jenis.nama')
            ->where('barangs.id_jenis',1)->get();
        return view('barangs.index')->with(compact('barang'));
    }

    public function bengkel()
    {
        //
        $barang = DB::table('barangs')
            ->join('jenis', 'jenis.id','=','barangs.id_jenis')
            ->select('barangs.*','jenis.nama')
            ->where('barangs.id_jenis',2)->get();
        return view('barangs.index')->with(compact('barang'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     *ll()
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
            $this->validate($request, [
            'id_jenis'     =>'required',
            'nama_barang'     =>'required|unique:barangs,nama_barang',
            'amount'    =>'required|numeric']);

        $barang = new Barang;
        $barang->id_jenis = $request->id_jenis;
        $barang->nama_barang = $request->nama_barang;
        $barang->amount = $request->amount;
        $barang->save();


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);

        return redirect()->route('barangs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
       
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
         $barang = Barang::find($id);
        return view('barangs.edit')->with(compact('barang'));
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
        //
        $this->validate($request, [
            'id_jenis'     =>'required',
            'nama_barang'     =>'required',
            'amount'    =>'required|numeric']);

        $barang = Barang::find($id);
        $barang->update($request->all());


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);

        return redirect()->route('barangs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menghapus Barang"]);

        return redirect()->route('barangs.index');
    }
}
