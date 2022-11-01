<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bantuan_model extends Model
{

	protected $table 		= "bantuan";
	protected $primaryKey 	= 'id_bantuan';

    // listing
    public function semua()
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->orderBy('bantuan.id_bantuan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where('bantuan.nama_penerima', 'LIKE', "%{$keywords}%") 
            ->orWhere('bantuan.nik', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // listing
    public function listing()
    {
    	$query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where('status_bantuan','Publish')
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function kategori_bantuan($id_kategori_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.status_bantuan'         => 'Publish',
                            'bantuan.id_kategori_bantuan'    => $id_kategori_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function all_kategori_bantuan($id_kategori_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.id_kategori_bantuan'    => $id_kategori_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function status_bantuan($status_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.status_bantuan'         => $status_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // kategori
    public function detail_kategori_bantuan($id_kategori_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.status_bantuan'         => 'Publish',
                            'bantuan.id_kategori_bantuan'    => $id_kategori_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->first();
        return $query;
    }

    // kategori
    public function detail_slug_kategori_bantuan($slug_kategori_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.status_bantuan'                  => 'Publish',
                            'kategori_bantuan.slug_kategori_bantuan'  => $slug_kategori_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->first();
        return $query;
    }


    // kategori
    public function slug_kategori_bantuan($slug_kategori_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where(array(  'bantuan.status_bantuan'                  => 'Publish',
                            'kategori_bantuan.slug_kategori_bantuan'  => $slug_kategori_bantuan))
            ->orderBy('id_bantuan','DESC')
            ->get();
        return $query;
    }

    // detail
    public function read($slug_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where('bantuan.slug_bantuan',$slug_bantuan)
            ->orderBy('id_bantuan','DESC')
            ->first();
        return $query;
    }

     // detail
    public function detail($id_bantuan)
    {
        $query = DB::table('bantuan')
            ->join('kategori_bantuan', 'kategori_bantuan.id_kategori_bantuan', '=', 'bantuan.id_kategori_bantuan','LEFT')
            ->select('bantuan.*', 'kategori_bantuan.slug_kategori_bantuan', 'kategori_bantuan.rt_kategori_bantuan')
            ->where('bantuan.id_bantuan',$id_bantuan)
            ->orderBy('id_bantuan','DESC')
            ->first();
        return $query;
    }

}
