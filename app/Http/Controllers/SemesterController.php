<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Semester;

class SemesterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $datas = Semester::where('kode_s', 'LIKE', '%' . $keyword . '%')
            ->orwhere('smtr', 'LIKE', '%' . $keyword . '%')
            ->simplePaginate(5);
        return view('pages.admin.semester.index', compact(
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
        $model = new Semester;
        return view('pages.admin.semester.create', compact(
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
        $model = new Semester;
        $model->kode_s = $request->kode_s;
        $model->smtr = $request->smtr;
        $model->save();

        return redirect('semester');
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
        $model = Semester::find($id);
        return view('pages.admin.semester.edit', compact(
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
        $model = Semester::find($id);
        $model->kode_s = $request->kode_s;
        $model->smtr = $request->smtr;
        $model->save();

        return redirect('semester');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Semester::find($id);
        $model->delete();

        return redirect('semester');
    }

    public function nextSemester()
    {
        $semester = Semester::all();
        $count = count($semester);
        $next = $count < 10 ? "S0" . ($count + 1) : "S" . ($count + 1);
        echo "<pre>";
        print_r($next);
        echo "</pre>";
        exit;

        return response($next);
    }

    public function allSemester()
    {
        $semester = Semester::all();

        return response($semester);
    }
}
