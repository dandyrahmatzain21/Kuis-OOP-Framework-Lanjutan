<?php
//Nim 2019102060 Dandy Rahmat Zain
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KegiatanModel;
use Dompdf\Dompdf;  //  load Dompdf tapi ga kepake (Bekas Latihan)
use Dompdf\Options; //  load Dompdf tapi ga kepake
use \PDF;           //  load Dompdf tapi ga kepake

class KegiatanController extends Controller
{
    public function __construct()
    {
        $this->KegiatanModel = new KegiatanModel();
        $this->middleware('auth');
    }

    public function index(){

       $data = [
            'kegiatan' => $this->KegiatanModel->allData(),
       ];

        return view('kegiatan/v_kegiatan',$data);
    }

    public function detail($id_kegiatan)
    {
        if (!$this->KegiatanModel->detailData($id_kegiatan)){
            abort(404);
        }
       $data = [
            'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
       ];
        return view('kegiatan/v_detail_kegiatan',$data);
    }

    public function add(){
        return view('kegiatan/v_add_kegiatan');
    }

    public function insert(){
        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'jam_mulai'     => 'required',
            'jam_akhir'     => 'required',
            'tanggal'       => 'required',
            'ruangan'       => 'required',
            'nama_kegiatan' => 'required',
            'keterangan'    => 'required',
            'foto'          => 'required|mimes:jpg,jpeg,png|max:1024',
        ],[
            'jam_mulai.required'        => 'Wajib Diisi',
            'jam_akhir.required'        => 'Wajib Diisi',
            'tanggal.required'          => 'Wajib Diisi',
            'ruangan.required'          => 'Wajib Diisi',
            'nama_kegiatan.required'    => 'Wajib Diisi',
            'keterangan.required'       => 'Wajib Diisi',
            'foto.required'             => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        $file = Request()->foto;
        $filename = Request()->nama_kegiatan.'.'.$file->extension();
        $file->move(public_path('foto_kegiatan'),$filename);

        $data = [
            'jam_mulai'     => Request()->jam_mulai,
            'jam_akhir'     => Request()->jam_akhir,
            'tanggal'       => Request()->tanggal,
            'ruangan'       => Request()->ruangan,
            'nama_kegiatan' => Request()->nama_kegiatan,
            'keterangan'    => Request()->keterangan,
            'foto'          => $filename,
        ];
        $this->KegiatanModel->addData($data);
        return redirect()->route('kegiatan')->with('Pesan','Data Berhasil Di tambahkan');
    }

    public function edit($id_kegiatan){
        if (!$this->KegiatanModel->detailData($id_kegiatan)){
            abort(404);
        }
        $data = [
        'kegiatan' => $this->KegiatanModel->detailData($id_kegiatan),
   ];
        return view('kegiatan/v_edit_kegiatan',$data);
    }

    public function update($id_kegiatan){

        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'jam_mulai'     => 'required',
            'jam_akhir'     => 'required',
            'tanggal'       => 'required',
            'ruangan'       => 'required',
            'nama_kegiatan' => 'required',
            'keterangan'    => 'required',
            'foto'          => 'mimes:jpg,jpeg,png|max:1024',
        ],[
            'jam_mulai.required'        => 'Wajib Diisi',
            'jam_akhir.required'        => 'Wajib Diisi',
            'tanggal.required'          => 'Wajib Diisi',
            'ruangan.required'          => 'Wajib Diisi',
            'nama_kegiatan.required'    => 'Wajib Diisi',
            'keterangan.required'       => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        if (Request()->foto <> "") {
        //Jika tidak ingin ganti foto
        $file = Request()->foto;
        $filename = Request()->nama_kegiatan.'.'.$file->extension();
        $file->move(public_path('foto_kegiatan'),$filename);

        $data = [
            'jam_mulai'     => Request()->jam_mulai,
            'jam_akhir'     => Request()->jam_akhir,
            'tanggal'       => Request()->tanggal,
            'ruangan'       => Request()->ruangan,
            'nama_kegiatan' => Request()->nama_kegiatan,
            'keterangan'    => Request()->keterangan,
            'foto'          => $filename,
        ];
        $this->KegiatanModel->editData($id_kegiatan,$data);
        }else{
            //Jika tidak ingin ganti foto
            $data = [
            'jam_mulai'     => Request()->jam_mulai,
            'jam_akhir'     => Request()->jam_akhir,
            'tanggal'       => Request()->tanggal,
            'ruangan'       => Request()->ruangan,
            'nama_kegiatan' => Request()->nama_kegiatan,
            'keterangan'    => Request()->keterangan,
            ];
            $this->KegiatanModel->editData($id_kegiatan,$data);
        }

        return redirect()->route('kegiatan')->with('Pesan','Data Berhasil Di Update');
    }

    public function delete($id_kegiatan){
        //Hapus foto
        $kegiatan = $this->KegiatanModel->detailData($id_kegiatan);
        if ($kegiatan->foto <> "") {
            unlink(public_path('foto_kegiatan').'/'.$kegiatan->foto);
        }
        $this->KegiatanModel->deleteData($id_kegiatan);
        return redirect()->route('kegiatan')->with('Pesan','Data Berhasil Di Hapus');
    }

    public function print(){

       $data = [
            'kegiatan' => $this->KegiatanModel->allData(),
       ];

        return view('kegiatan/v_print_kegiatan',$data);
    }


}
