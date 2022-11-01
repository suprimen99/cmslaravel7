<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;
use App\Warga_model;

class Warga extends Controller
{
    // Main page
    public function index()
    {
    	if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
    	$mywarga 			= new Warga_model();
		$warga 			    = $mywarga->semua();
		$data = array(  'title'				=> 'Data Warga',
						'warga'			    => $warga,
                        'content'			=> 'admin/warga/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Cari
    public function cari(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mywarga          = new Warga_model();
        $keywords           = $request->keywords;
        $warga            = $mywarga->cari($keywords);
        $data = array(  'title'             => 'Data Warga',
                        'warga'            => $warga,
                        'content'           => 'admin/warga/index'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // Proses
    public function proses(Request $request)
    {
        $site   = DB::table('konfigurasi')->first();
        // PROSES HAPUS MULTIPLE
        if(isset($_POST['hapus'])) {
            $id_warganya       = $request->id_warga;
            for($i=0; $i < sizeof($id_warganya);$i++) {
                DB::table('warga')->where('id_warga',$id_warganya[$i])->delete();
            }
            return redirect('admin/warga')->with(['sukses' => 'Data telah dihapus']);
        // PROSES SETTING DRAFT
        }elseif(isset($_POST['update'])) {
            $id_warganya       = $request->id_warga;
            for($i=0; $i < sizeof($id_warganya);$i++) {
                DB::table('warga')->where('id_warga',$id_warganya[$i])->update([
                        'id_user'               => Session()->get('id_user'),
                        ]);
            }
            return redirect('admin/warga')->with(['sukses' => 'Data kategori telah diubah']);
        }
    }

    public function cetak()
    {
     $cetak = Warga::cetak('semua')->get();
     return view('admin/warga/cetakWarga',compact('cetak'));
    }
    // Tambah

    public function tambah()
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $data = array(  'title'             => 'Tambah Data Warga',
                        'content'           => 'admin/warga/tambah'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // edit
    public function edit($id_warga)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        $mywarga           = new Warga_model();
        $warga             = $mywarga->detail($id_warga);
        $data = array(  'title'             => 'Edit Data Warga',
                        'warga'            => $warga,
                        'content'           => 'admin/warga/edit'
                    );
        return view('admin/layout/wrapper',$data);
    }

    // tambah
    public function tambah_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama'  => 'required|unique:warga',
                            ]);
        // UPLOAD START

        DB::table('warga')->insert([
                'id_user'                 => Session()->get('id_user'),
                'nama'                    => $request->nama,
                'nik'                     => $request->nik,
                'jenis_kelamin'           => $request->jenis_kelamin,
                'tempat_lahir'            => $request->tempat_lahir,
                'tanggal_lahir'           => $request->tanggal_lahir,
                'agama'                   => $request->agama,
                'pendidikan'              => $request->pendidikan,
                'jenis_pekerjaan'         => $request->jenis_pekerjaan,
                'gol_darah'               => $request->gol_darah
            ]);
        return redirect('admin/warga')->with(['sukses' => 'Data telah ditambah']);
    }

    // edit
    public function edit_proses(Request $request)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        request()->validate([
                            'nama'    => 'required',
                            ]);
        // UPLOAD START
        if(!empty($image)) {
            DB::table('warga')->where('id_warga',$request->id_warga)->update([
                'id_user'                 => Session()->get('id_user'),
                'nama'                    => $request->nama,
                'nik'                     => $request->nik,
                'jenis_kelamin'           => $request->jenis_kelamin,
                'tempat_lahir'            => $request->tempat_lahir,
                'tanggal_lahir'           => $request->tanggal_lahir,
                'agama'                   => $request->agama,
                'pendidikan'              => $request->pendidikan,
                'jenis_pekerjaan'         => $request->jenis_pekerjaan,
                'gol_darah'               => $request->gol_darah
            ]);
        }else{
            DB::table('warga')->where('id_warga',$request->id_warga)->update([
                'id_user'                 => Session()->get('id_user'),
                'nama'                    => $request->nama,
                'nik'                     => $request->nik,
                'jenis_kelamin'           => $request->jenis_kelamin,
                'tempat_lahir'            => $request->tempat_lahir,
                'tanggal_lahir'           => $request->tanggal_lahir,
                'agama'                   => $request->agama,
                'pendidikan'              => $request->pendidikan,
                'jenis_pekerjaan'         => $request->jenis_pekerjaan,
                'gol_darah'               => $request->gol_darah
            ]);
        }
        return redirect('admin/warga')->with(['sukses' => 'Data telah ditambah']);
    }

    // Delete
    public function delete($id_warga)
    {
        if(Session()->get('username')=="") { return redirect('login')->with(['warning' => 'Mohon maaf, Anda belum login']);}
        DB::table('warga')->where('id_warga',$id_warga)->delete();
        return redirect('admin/warga')->with(['sukses' => 'Data telah dihapus']);
    }
}