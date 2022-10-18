<?php

namespace App\Http\Controllers\Admin;

use App\Models\Staff;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class StaffController extends Controller
{
   /**
     * Dis play a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Staff::all();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    if($item->is_active == 1) {
                        return '
                            <div class="d-flex">
                                <a class="btn btn-primary mr-2" href="' . route('staff.edit', $item->id) . '">
                                    Ubah
                                </a>
                                <button class="btn btn-danger delete_modal mr-2" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                                    Hapus
                                </button>
                                <form action="' . route('update.isactive', $item->id) . '" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                    <input type="hidden" name="is_active" value="0">
                                    <button type="submit" class="btn btn-warning">Non Active</button>
                                </form>
                            </div>
                        ';
                    }else{
                        return '
                            <div class="d-flex">
                                <a class="btn btn-primary mr-2" href="' . route('staff.edit', $item->id) . '">
                                    Ubah
                                </a>
                                <button class="btn btn-danger delete_modal mr-2" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                                    Hapus
                                </button>
                                <form action="' . route('update.isactive', $item->id) . '" method="POST">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="' . csrf_token() . '" />
                                    <input type="hidden" name="is_active" value="1">
                                    <button type="submit" class="btn btn-success">Active</button>
                                </form>
                            </div>
                        ';
                    }
                })
                ->editColumn('is_active', function($item) {
                    if($item->is_active == 1) {
                        return '
                            <span class="badge rounded-pill badge-primary w-100">Active</span>
                        ';
                    }else{
                    return '
                            <span class="badge rounded-pill badge-danger w-100">Non Active</span>
                        ';
                    }
                })
                ->rawColumns(['action', 'is_active'])
                ->addIndexColumn()
                ->make();
        }

        return view('admin.staff.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Staff::create($request->all());

        Alert::success('Success', 'Success Created Data!');
        return redirect()->route('staff.index');
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
        $data = Staff::findOrFail($id);
        return view('admin.staff.edit', compact('data'));
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
        $find = Staff::findOrFail($id)->update($request->all());

        Alert::success('Success', 'Success Updated Data!');
        return redirect()->route('staff.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Staff::findOrFail($id)->delete();
        return response()->json($data);
    }

    public function updateIsActive(Request $request, $id) {
        $data = Staff::findOrFail($id)->update($request->all());

        Alert::success('Success', 'Success Updated Data!');
        return redirect()->route('staff.index');
    }
}
