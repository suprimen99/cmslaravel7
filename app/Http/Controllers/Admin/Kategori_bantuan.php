<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Kategori_bantuan extends Controller
{
    // Index
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
		$kategori_bantuan 	= DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'             => 'Kategori RT/RW',
						'kategori_bantuan'	=> $kategori_bantuan,
                        'content'           => 'admin/kategori_bantuan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'rt_kategori_bantuan' => 'required|unique:kategori_bantuan',
					        'urutan' 		       => 'required',
					        ]);
    	$slug_kategori_bantuan = str_slug($request->rt_kategori_bantuan, '-');
        DB::table('kategori_bantuan')->insert([
            'rt_kategori_bantuan'  => $request->rt_kategori_bantuan,
            'slug_kategori_bantuan'	=> $slug_kategori_bantuan,
            'urutan'   		        => $request->urutan
        ]);
        return redirect('admin/kategori_bantuan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit(Request $request)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	request()->validate([
					        'rt_kategori_bantuan' => 'required',
					        'urutan'               => 'required',
					        ]);
    	$slug_kategori_bantuan = str_slug($request->rt_kategori_bantuan, '-');
        DB::table('kategori_bantuan')->where('id_kategori_bantuan',$request->id_kategori_bantuan)->update([
            'rt_kategori_bantuan'  => $request->rt_kategori_bantuan,
            'slug_kategori_bantuan'	=> $slug_kategori_bantuan,
            'urutan'                => $request->urutan
        ]);
        return redirect('admin/kategori_bantuan')->with(['sukses' => 'Data telah diupdate']);
    }

    // Delete
    public function delete($id_kategori_bantuan)
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	DB::table('kategori_bantuan')->where('id_kategori_bantuan',$id_kategori_bantuan)->delete();
    	return redirect('admin/kategori_bantuan')->with(['sukses' => 'Data telah dihapus']);
    }
}
