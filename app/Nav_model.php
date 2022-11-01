<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Nav_model extends Model
{


    // Main page
    public function nav_profil()
    {
    	$query = DB::table('berita')
            ->join('kategori', 'kategori.id_kategori', '=', 'berita.id_kategori')
            ->select('berita.*', 'kategori.slug_kategori', 'kategori.nama_kategori')
            ->where(array(	'berita.status_berita'	=> 'Publish',
                            'berita.jenis_berita'  => 'Profil'))
            ->groupBy('kategori.id_kategori')
            ->orderBy('berita.id_berita','DESC')
            ->get();
        return $query;
    }
}
