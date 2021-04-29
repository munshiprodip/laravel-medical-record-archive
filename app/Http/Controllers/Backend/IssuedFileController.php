<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\IssuedFiles;
use App\Models\PtFiles;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IssuedFileController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read-issued|create-issued|edit-issued|delete-issued', ['only' => ['index', 'apiBlodgroup']]);
        $this->middleware('permission:create-issued', ['only' => ['create']]);
        $this->middleware('permission:edit-issued', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-issued', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $i = 0;
        $files = IssuedFiles::where('is_received', 0)->get();
        return view('backend/issued_files/index', compact('files', 'i'));
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $date = Carbon::now()->format('Y-m-d');
        $input['issue_date'] = $date;
        $file_id = $input['file_id'];
        PtFiles::find($file_id)->update(['active_status' => 0]);
        IssuedFiles::create($input);
        return redirect()->route('files.present')->with('toast_success', 'Data inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $file_id = $request->all()['file_id'];
        PtFiles::find($file_id)->update(['active_status' => 1]);
        $date = Carbon::now()->format('Y-m-d');
        IssuedFiles::find($id)->update(['is_received' => 1, 'receive_date' => $date]);
        return redirect()->route('issued-files.index')->with('toast_success', 'File received Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
