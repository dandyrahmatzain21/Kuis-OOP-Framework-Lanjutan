<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MahasiswaModel;
use Dompdf\Dompdf;  //  load Dompdf tapi ga kepake (Bekas Latihan)
use Dompdf\Options; //  load Dompdf tapi ga kepake
use \PDF;           //  load Dompdf tapi ga kepake

class MahasiswaController extends Controller
{
    public function __construct()
    {
        $this->MahasiswaModel = new MahasiswaModel();
        $this->middleware('auth');
    }

    public function index(){

        //latihan passing data ke tampilan
       // $data = [
       //     'nama' => 'Dandy R Zain',
       //     'alamat' => 'Kuningan'
       // ];

       $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
       ];

        return view('mahasiswa/v_mahasiswa',$data);
    }

    //public function latihan_ambil_data($id)
    //{
        //latihan passing data dari id
    //    return 'latihan ambil id <br/>' . $id;
        // Untuk mencoba http://127.0.0.1:8000/mahasiswa/latihan_ambil_data/1%20Dandy%20Rahmat%20Zain
    //}

    public function detail($id)
    {
        if (!$this->MahasiswaModel->detailData($id)){
            abort(404);
        }
       $data = [
            'mahasiswa' => $this->MahasiswaModel->detailData($id),
       ];
        return view('mahasiswa/v_detail_mahasiswa',$data);
    }

    public function add(){
        return view('mahasiswa/v_add_mahasiswa');
    }

    public function insert(){

        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'nim'           =>'required|unique:tbl_mahasiswa,nim|max:10',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'hp'            => 'required',
            'foto'          => 'required|mimes:jpg,jpeg,png|max:1024',
        ],[
            'nim.required'=>'Wajib Diisi',
            'nim.unique'=>'Nim Ini Sudah Ada',
            'nim.max'=>'Nim Max 10 Karakter',
            'nama.required'          => 'Wajib Diisi',
            'jenis_kelamin.required' => 'Wajib Diisi',
            'tempat_lahir.required'  => 'Wajib Diisi',
            'tanggal_lahir.required' => 'Wajib Diisi',
            'alamat.required'        => 'Wajib Diisi',
            'hp.required'            => 'Wajib Diisi',
            'foto.required'          => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        $file = Request()->foto;
        $filename = Request()->nim.'.'.$file->extension();
        $file->move(public_path('foto'),$filename);

        $data = [
            'nim'           => Request()->nim,
            'nama'          => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'tempat_lahir'  => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'alamat'        => Request()->alamat,
            'hp'            => Request()->hp,
            'foto'          => $filename,
        ];
        $this->MahasiswaModel->addData($data);
        return redirect()->route('mahasiswa')->with('Pesan','Data Berhasil Di tambahkan');
    }

    public function edit($id){
        if (!$this->MahasiswaModel->detailData($id)){
            abort(404);
        }
        $data = [
        'mahasiswa' => $this->MahasiswaModel->detailData($id),
   ];
        return view('mahasiswa/v_edit_mahasiswa',$data);
    }

    public function update($id){

        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'nim'           => 'required|max:10',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'hp'            => 'required',
            'foto'          => 'mimes:jpg,jpeg,png|max:1024',
        ],[
            'nim.required'=>'Wajib Diisi',
            'nim.max'=>'Nim Max 10 Karakter',
            'nama.required'          => 'Wajib Diisi',
            'jenis_kelamin.required' => 'Wajib Diisi',
            'tempat_lahir.required'  => 'Wajib Diisi',
            'tanggal_lahir.required' => 'Wajib Diisi',
            'alamat.required'        => 'Wajib Diisi',
            'hp.required'            => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        if (Request()->foto <> "") {
        //Jika tidak ingin ganti foto
        $file = Request()->foto;
        $filename = Request()->nim.'.'.$file->extension();
        $file->move(public_path('foto'),$filename);

        $data = [
            'nim'           => Request()->nim,
            'nama'          => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'tempat_lahir'  => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'alamat'        => Request()->alamat,
            'hp'            => Request()->hp,
            'foto'          => $filename,
        ];
        $this->MahasiswaModel->editData($id,$data);
        }else{
            //Jika tidak ingin ganti foto
            $data = [
                'nim'           => Request()->nim,
                'nama'          => Request()->nama,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'tempat_lahir'  => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'alamat'        => Request()->alamat,
                'hp'            => Request()->hp,
            ];
            $this->MahasiswaModel->editData($id,$data);
        }

        return redirect()->route('mahasiswa')->with('Pesan','Data Berhasil Di Update');
    }

    public function delete($id){
        //Hapus foto
        $mahasiswa = $this->MahasiswaModel->detailData($id);
        if ($mahasiswa->foto <> "") {
            unlink(public_path('foto').'/'.$mahasiswa->foto);
        }
        $this->MahasiswaModel->deleteData($id);
        return redirect()->route('mahasiswa')->with('Pesan','Data Berhasil Di Hapus');
    }

    public function print(){

       $data = [
            'mahasiswa' => $this->MahasiswaModel->allData(),
       ];

        return view('mahasiswa/v_print_mahasiswa',$data);
    }

    // public function printpdf(){
    //    $data = [
    //         'mahasiswa' => $this->MahasiswaModel->allData(),
    //    ];
    //        $pdf = PDF::loadview('mahasiswa/v_printpdf_mahasiswa',$data)->setPaper('A4','potrait');
    //       return $pdf->stream();
    // }


}
