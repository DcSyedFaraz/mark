<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\VeriantSize;
use App\Models\PageCategory;
use App\Models\PageSections;
use App\Models\VeriantColor;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        // Artisan::call("storage:link");
        return view('home');

    }

    public function login(){
        // $this->middleware('auth')->except('logout');
        return view('auth.login');
    }

    public function product_detail($id)
    {
        $data['product'] = Product::find($id);
        $data['size'] = VeriantSize::where('product_id',$id)->first();
        // return json_decode($size->name);
        $data['color'] = VeriantColor::where('product_id',$id)->first();
        return view('admin.product_detail',$data);
    }
}
