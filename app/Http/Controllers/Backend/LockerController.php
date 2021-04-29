<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Locker;
use App\Models\Rack;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class LockerController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read-locker|create-locker|edit-locker|delete-locker', ['only' => ['index', 'apiBlodgroup']]);
        $this->middleware('permission:create-locker', ['only' => ['create']]);
        $this->middleware('permission:edit-locker', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-locker', ['only' => ['destroy']]);
    }

    public function apiLocker()
    {
        $data = Locker::all();

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

        })->addColumn('rack',function ($data){
            return $data->rack->name;
        })->addIndexColumn()->toJson();
    }
    /**
     * Display a listing of the resource.
     *
     * @return string
     */
    public function index()
    {
        $racks = Rack::all();
        return view('backend/locker/locker', compact('racks'));
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
        $data = Locker::create($input);

        if ($data) {
            $success = true;
            $message = "Locker added successfully";
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
        $data = Locker::find($id);
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
        $data = Locker::find($id);
        $input = $request->all();
        $update = $data->fill($input)->save();
        if ($update) {
            $success = true;
            $message = "Locker updated successfully";
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
        $delete = Locker::destroy($id);

        if ($delete) {
            $success = true;
            $message = "Rack Deleted successfully";
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
