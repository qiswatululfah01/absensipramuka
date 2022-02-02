<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $datas = Kelas::where('kode_k', 'LIKE', '%' . $keyword . '%')
            ->orwhere('nama_kelas', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(5);
        return view('pages.admin.kelas.index', compact(
            'datas',
            'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $model = new Kelas;
        return view('pages.admin.kelas.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $model = new Kelas;
        $model->kode_k = $request->kode_k;
        $model->nama_kelas = $request->nama_kelas;
        $model->save();


        return redirect('kelas');
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
        $model = Kelas::find($id);
        return view('pages.admin.kelas.edit', compact(
            'model'
        ));
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
        $model = Kelas::find($id);
        $model->kode_k = $request->kode_k;
        $model->nama_kelas = $request->nama_kelas;
        $model->save();

        return redirect('kelas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Kelas::find($id);
        $model->delete();

        return redirect('kelas');
    }

    public function nextKelas()
    {
        $kelas = Kelas::all();
        $count = count($kelas);
        $next = $count < 10 ? "K0" . ($count + 1) : "K" . ($count + 1);

        return response($next);
    }

    public function allKelas()
    {
        $kelas = Kelas::all();

        return response($kelas);
    }
}
