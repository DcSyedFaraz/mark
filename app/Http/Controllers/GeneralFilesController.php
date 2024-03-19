<?php

namespace App\Http\Controllers;

use App\Imports\ExcelImport;
use App\Imports\UsersImport;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Facades\Excel;

class GeneralFilesController extends Controller
{
    public function file(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|mimes:xls,xlsx'
        ]);
        // // dd($request->all());
        try {

            $import = Excel::import(new UsersImport, request()->file('file'));
            return redirect()->back()->with('success', 'Excel Data Imported successfully.');
        } catch (ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
        // $import = new ExcelImport();
        // $array = Excel::import($import, request()->file('file'));
        // dd($import);
        // die;
        // return redirect()->back()->with('success', 'Excel Data Imported successfully.');

    }
    public function Asm()
    {
        $data['file'] = 'general';
        return view('admin.structure.general', $data);

    }
    public function abl()
    {
        $data['file'] = 'abl';
        return view('admin.structure.general', $data);

    }
    public function wtr()
    {
        $data['file'] = 'wtr';
        return view('admin.structure.general', $data);

    }
    public function br()
    {
        $data['file'] = 'br';
        return view('admin.structure.general', $data);

    }
    public function bml()
    {
        $data['file'] = 'bml';
        return view('admin.structure.general', $data);

    }
    public function ci()
    {
        $data['file'] = 'ci';
        return view('admin.structure.general', $data);

    }
    public function sm()
    {
        $data['file'] = 'sm';
        return view('admin.structure.general', $data);

    }
    public function ccr()
    {
        $data['file'] = 'ccr';
        return view('admin.structure.general', $data);

    }
    public function aoi()
    {
        $data['file'] = 'aoi';
        return view('admin.structure.general', $data);

    }
}
