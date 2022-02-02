<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $datas = Jabatan::where('kode_j', 'LIKE', '%' . $keyword . '%')
            ->orwhere('jenis_jabatan', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(5);
        return view('pages.admin.jabatan.index', compact(
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
        $model = new jabatan;
        return view('pages.admin.jabatan.create', compact(
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
        $model = new Jabatan;
        $model->kode_j = $request->kode_j;
        $model->jenis_jabatan = $request->jenis_jabatan;
        $model->save();


        return redirect('jabatan');
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
        $model = Jabatan::find($id);
        return view('pages.admin.jabatan.edit', compact(
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
        $model = Jabatan::find($id);
        $model->kode_j = $request->kode_j;
        $model->jenis_jabatan = $request->jenis_jabatan;
        $model->save();

        return redirect('jabatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Jabatan::find($id);
        $model->delete();

        return redirect("jabatan");
    }

    public function nextJabatan()
    {
        $jabatan = Jabatan::all();
        $count = count($jabatan);
        $next = $count < 10 ? "J0" . ($count + 1) : "J" . ($count + 1);

        return response($next);
    }

    public function allJabatan()
    {
        $jabatan = Jabatan::all();

        return response($jabatan);
    }
}