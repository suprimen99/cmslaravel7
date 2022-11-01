<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Warga_model extends Model
{

	protected $table 		= "warga";
	protected $primaryKey 	= 'id_warga';

    public function semua()
    {
            $query = DB::table('warga')
               ->select('*')
               ->orderBy('id_warga','DESC')
               ->get();
           return $query;
    }

    // listing
    public function cari($keywords)
    {
        $query = DB::table('warga')
            ->select('*')
            ->where('warga.nama', 'LIKE', "%{$keywords}%") 
            ->orWhere('warga.nik', 'LIKE', "%{$keywords}%") 
            ->orderBy('id_warga','DESC')
            ->get();
        return $query;
    }

    public function detail($id_warga)
    {
        $query = DB::table('warga')
        ->select('*')
        ->where ('id_warga',$id_warga)
        ->orderBy('id_warga','DESC')
        ->first();
        return $query;
    }
    
}
