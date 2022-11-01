<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Bantuan_model;

class Bantuan extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mybantuan 			= new Bantuan_model();
		$bantuan 			= $mybantuan->semua();
		$kategori_bantuan 	= DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

		$data = array(  'title'				=> 'Data Penerima Bantuan',
						'bantuan'			=> $bantuan,
						'kategori_bantuan'	=> $kategori_bantuan,
                        'content'			=> 'admin/bantuan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mybantuan          = new Bantuan_model();
        $keywords           = $request->keywords;
        $bantuan            = $mybantuan->cari($keywords);
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Penerima Bantuan',
                        'bantuan'            => $bantuan,
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'admin/bantuan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_bantuannya       = $request->id_bantuan;
            for($i=0; $i < sizeof($id_bantuannya);$i++) {
                DB::table('bantuan')->where('id_bantuan',$id_bantuannya[$i])->delete();
            }
            return redirect('admin/bantuan')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_bantuannya       = $request->id_bantuan;
            for($i=0; $i < sizeof($id_bantuannya);$i++) {
                DB::table('bantuan')->where('id_bantuan',$id_bantuannya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        'id_kategori_bantuan'    => $request->id_kategori_bantuan
                    ]);
            }
            return redirect('admin/bantuan')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    //Status
    public function status_bantuan($status_bantuan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mybantuan           = new Bantuan_model();
        $bantuan             = $mybantuan->status_bantuan($status_bantuan);
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Penerima Bantuan',
                        'bantuan'            => $bantuan,
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'admin/bantuan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    //Kategori
    public function kategori($id_kategori_bantuan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mybantuan           = new Bantuan_model();
        $bantuan             = $mybantuan->all_kategori_bantuan($id_kategori_bantuan);
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Penerima Bantuan',
                        'bantuan'            => $bantuan,
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'admin/bantuan/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Tambah
    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Data Penerima Bantuan',
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'admin/bantuan/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_bantuan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mybantuan           = new Bantuan_model();
        $bantuan             = $mybantuan->detail($id_bantuan);
        $kategori_bantuan    = DB::table('kategori_bantuan')->orderBy('urutan','ASC')->get();

        $data = array(  'title'             => 'Edit Data Penerima Bantuan',
                        'bantuan'            => $bantuan,
                        'kategori_bantuan'   => $kategori_bantuan,
                        'content'           => 'admin/bantuan/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_penerima'  => 'required|unique:bantuan',
                            ]);
        // UPLOAD START
        
        DB::table('bantuan')->insert([
            'id_kategori_bantuan'  => $request->id_kategori_bantuan,
            'id_user'               => Session()->get('id_user'),
            'nama_penerima'        => $request->nama_penerima,
            'jenis_kelamin'        => $request->jenis_kelamin,
            'nik'                   => $request->nik,
            'umur'               => $request->umur,
            'status'               => $request->status
        ]);
        return redirect('admin/bantuan')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama_penerima'    => 'required',
                            ]);
        // UPLOAD START
        if(!empty($image)) {
            DB::table('bantuan')->where('id_bantuan',$request->id_bantuan)->update([
                'id_kategori_bantuan'  => $request->id_kategori_bantuan,
            'id_user'               => Session()->get('id_user'),
            'nama_penerima'        => $request->nama_penerima,
            'jenis_kelamin'        => $request->jenis_kelamin,
            'nik'                   => $request->nik,
            'umur'               => $request->umur,
            'status'               => $request->status
        ]);
        }else{
            DB::table('bantuan')->where('id_bantuan',$request->id_bantuan)->update([
                'id_kategori_bantuan'  => $request->id_kategori_bantuan,
            'id_user'               => Session()->get('id_user'),
            'nama_penerima'        => $request->nama_penerima,
            'jenis_kelamin'        => $request->jenis_kelamin,
            'nik'                   => $request->nik,
            'umur'               => $request->umur,
            'status'               => $request->status
        
            ]);
        }
        return redirect('admin/bantuan')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_bantuan)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('bantuan')->where('id_bantuan',$id_bantuan)->delete();
        return redirect('admin/bantuan')->with(['sukses' => 'Data telah dihapus']);
    }
}
