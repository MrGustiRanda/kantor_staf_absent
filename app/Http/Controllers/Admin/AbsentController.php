<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Staff;
use App\Models\Absent;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class AbsentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->ajax()) {
            $query = Absent::join('staff', 'staff.id', '=', 'absents.id_staff')
                    ->select('absents.*', 'staff.name as staff_name');

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary" href="' . route('absent.edit', $item->id) . '">
                            Ubah
                        </a>
                        <button class="btn btn-danger delete_modal" type="button" data-id="' . $item->id . '" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                        </button>
                    ';
                })
                ->editColumn('created_at', function ($item) {
                    $formatedDate = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)
                        ->format('d-m-Y');
                    return $formatedDate;
                })
                ->editColumn('note', function ($item) {
                    if($item->note == ''){
                        return '-';
                    }else{
                        return "$item->note"; 
                    }
                })
                ->rawColumns(['action', 'date', 'note'])
                ->addIndexColumn()
                ->make();
        }

        return view('admin.absent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $staff = Staff::all();
        return view('admin.absent.create', compact('staff'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Absent::create($request->all());

        Alert::success('Success', 'Success Created Data!');
        return redirect()->route('absent.index');
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
        $data = Absent::findOrFail($id);
        $data['time_start'] = Carbon::parse($data['time_start'])->format('H:i');
        $data['time_end'] = Carbon::parse($data['time_end'])->format('H:i');

        $staff = Staff::all();
        return view('admin.absent.edit', compact('data', 'staff'));
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
        $find = Absent::findOrFail($id)->update($request->all());

        Alert::success('Success', 'Success Updated Data!');
        return redirect()->route('absent.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Absent::findOrFail($id)->delete();

        return response()->json($data);
    }
}
