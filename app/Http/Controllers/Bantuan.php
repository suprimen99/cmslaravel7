<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Bantuan_model;

class Bantuan extends Controller
{
    // Main page
    public function index()
    {
        $bantuan = DB::table('bantuan')
                    ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
                    ->select('bantuan.*', 'kategori_bantuan.rt_kategori_bantuan')
                    ->orderBy('bantuan.id_bantuan','DESC')
                    ->paginate(10);

		$data = array(  'title'		=> 'Data Penerima Bantuan',
						'deskripsi'	=> 'Data Penerima Bantuan',
						'keywords'	=> 'Data Penerima Bantuan',
						'bantuans'	=> $bantuan,
                        'content'	=> 'bantuan/index'
                    );
        return view('layout/wrapper',$data);
    }

    public function cari(Request $request)
    {
        $mybantuan          = new Bantuan_model();
        $keywords           = $request->keywords;
        $bantuan            = $mybantuan->cari($keywords);
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Penerima Bantuan',
                        'bantuans'            => $bantuan,
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'bantuan/index'
                    );
        return view('layout/wrapper',$data);
    }


}
