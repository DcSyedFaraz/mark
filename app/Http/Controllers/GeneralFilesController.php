<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralFilesController extends Controller
{
    public function Asm()
    {
        $data['file'] = 'general';
        return view('admin.structure.general',$data);

    }
    public function abl()
    {
        $data['file'] = 'abl';
        return view('admin.structure.general',$data);

    }
    public function wtr()
    {
        $data['file'] = 'wtr';
        return view('admin.structure.general',$data);

    }
    public function br()
    {
        $data['file'] = 'br';
        return view('admin.structure.general',$data);

    }
    public function bml()
    {
        $data['file'] = 'bml';
        return view('admin.structure.general',$data);

    }
    public function ci()
    {
        $data['file'] = 'ci';
        return view('admin.structure.general',$data);

    }
    public function sm()
    {
        $data['file'] = 'sm';
        return view('admin.structure.general',$data);

    }
    public function ccr()
    {
        $data['file'] = 'ccr';
        return view('admin.structure.general',$data);

    }
    public function aoi()
    {
        $data['file'] = 'aoi';
        return view('admin.structure.general',$data);

    }
}
