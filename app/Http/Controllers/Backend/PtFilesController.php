<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Doctor;
use App\Models\IssuedFiles;
use App\Models\Locker;
use App\Models\PtFiles;
use App\Models\Speciality;
use App\Models\Wards;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;


class PtFilesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:read-files|create-files|edit-files|delete-files', ['only' => ['index', 'apiBlodgroup']]);
        $this->middleware('permission:create-files', ['only' => ['create']]);
        $this->middleware('permission:edit-files', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-files', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $i = 0;
        $files = PtFiles::orderBy('id', 'desc')->get();
        return view('backend/files/index', compact('files', 'i'));
    }

    public function death()
    {
        $i = 0;
        $files = PtFiles::where('is_dead', 1)->orderBy('id', 'desc')->get();
        return view('backend/files/dead', compact('files', 'i'));
    }

    public function inArchive()
    {
        $i = 0;
        $files = PtFiles::where('active_status', 1)->orderBy('id', 'desc')->get();
        return view('backend/files/inArchive', compact('files', 'i'));
    }
    public function issued()
    {
        $i = 0;
        $files = PtFiles::where('active_status', 0)->orderBy('id', 'desc')->get();
        return view('backend/files/issued', compact('files', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        $wards = Wards::all();
        $lockers = Locker::all();
        $departments = Department::all();
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        return view('backend/files/create', compact('wards', 'lockers', 'specialities', 'doctors', 'departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        PtFiles::create($request->all());
        return redirect()->route('files.index')->with('toast_success', 'Data inserted Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function show($id)
    {
        $i = 0;
        $data = PtFiles::find($id);
        $issueHistory = IssuedFiles::where('file_id', $id)->get();
        return view('backend/files/details', compact('data', 'issueHistory', 'i'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $wards = Wards::all();
        $lockers = Locker::all();
        $departments = Department::all();
        $doctors = Doctor::all();
        $specialities = Speciality::all();
        $data = PtFiles::find($id);
        return view('backend/files/edit', compact('data','wards', 'lockers', 'specialities', 'doctors', 'departments'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $row = PtFiles::find($id);
        $row->fill($request->all())->save();
        return redirect('files')->with('toast_success', 'Data updated Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Application|RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        PtFiles::destroy($id);
        return redirect('files')->with('toast_success', 'Data deleted Successfully!');
    }
}
