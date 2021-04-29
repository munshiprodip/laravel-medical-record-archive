<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class DoctorController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:read-doctor|create-doctor|edit-doctor|delete-doctor', ['only' => ['index', 'apiBlodgroup']]);
        $this->middleware('permission:create-doctor', ['only' => ['create']]);
        $this->middleware('permission:edit-doctor', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-doctor', ['only' => ['destroy']]);
    }

    public function apiDoctor()
    {
        $data = DB::table('doctors')->get();

        return Datatables::of($data)->addColumn('action',function ($data){
            return '<div class="btn-group">
                <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Action
                </button>
                <div class="dropdown-menu text-right dropdown-menu-right">
                    <button onclick="editData('.$data->id.')" class="dropdown-item" type="button">Edit</button>
                    <button onclick="deleteData('.$data->id.')" class="dropdown-item" type="button">Delete</button>
                </div>
            </div>';

        })->addIndexColumn()->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('backend.doctor.doctor');
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
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $data = Doctor::create($input);

        if ($data) {
            $success = true;
            $message = "Doctor added successfully";
        } else {
            $success = false;
            $message = "Failed!!";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
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
        $data = Doctor::find($id);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $id)
    {
        $data = Doctor::find($id);
        $input = $request->all();
        $update = $data->fill($input)->save();
        if ($update) {
            $success = true;
            $message = "Doctor updated successfully";
        } else {
            $success = false;
            $message = "Failed!!";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $delete = Doctor::destroy($id);

        if ($delete) {
            $success = true;
            $message = "Doctor deleted successfully";
        } else {
            $success = false;
            $message = "Failed!!";
        }

        //  Return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }
}
