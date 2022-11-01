<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Konfigurasi_model;
use Image;
use App\Pemesanan_model;
use App\Produk_model;
use PDF;

class Dasbor extends Controller
{


    // Index
    public function index()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mysite = new Konfigurasi_model();
		$site 	= $mysite->listing();

		$data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'content'   => 'admin/dasbor/index'
                    );
        return view('admin/layout/wrapper',$data);
    }
}
