<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Berita_model;
use PDF;

class Home extends Controller
{
    // Homepage
    public function index()
    {
    	$site 	= DB::table('konfigurasi')->first();
    	$slider = DB::table('berita')->where('jenis_berita','Homepage')->limit(5)->orderBy('id_berita', 'DESC')->get();
        $news   = new Berita_model();
        $berita = $news->home();

        $data = array(  'title'     => $site->namaweb.' - '.$site->tagline,
                        'deskripsi' => $site->namaweb.' - '.$site->tagline,
                        'keywords'  => $site->namaweb.' - '.$site->tagline,
                        'slider'    => $slider,
                        'site'		=> $site,
                        'berita'    => $berita,
                        'content'   => 'home/index'
                    );
        return view('layout/wrapper',$data);
    }

    // kontak
    public function kontak()
    {
        $site   = DB::table('konfigurasi')->first();

        $data = array(  'title'     => 'Kontak Kami: '.$site->namaweb.' - '.$site->tagline,
                        'deskripsi' => 'Kontak '.$site->namaweb,
                        'keywords'  => 'Kontak '.$site->namaweb,
                        'site'      => $site,
                        'content'   => 'home/kontak'
                    );
        return view('layout/wrapper',$data);
    }

}