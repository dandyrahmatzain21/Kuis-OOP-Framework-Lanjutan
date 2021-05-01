<?php
//Nim 2019102060 Dandy Rahmat Zain
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DosenModel;
use Dompdf\Dompdf;  //  load Dompdf tapi ga kepake (Bekas Latihan)
use Dompdf\Options; //  load Dompdf tapi ga kepake
use \PDF;           //  load Dompdf tapi ga kepake

class DosenController extends Controller
{
    public function __construct()
    {
        $this->DosenModel = new DosenModel();
        $this->middleware('auth');
    }

    public function index(){
       $data = [
            'dosen' => $this->DosenModel->allData(),
       ];

        return view('dosen/v_dosen',$data);
    }

    public function detail($id_dosen)
    {
        if (!$this->DosenModel->detailData($id_dosen)){
            abort(404);
        }
       $data = [
            'dosen' => $this->DosenModel->detailData($id_dosen),
       ];
        return view('dosen/v_detail_dosen',$data);
    }

    public function add(){
        return view('dosen/v_add_dosen');
    }

    public function insert(){

        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'nidn'          =>'required|unique:tbl_dosen,nidn|max:10',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'hp'            => 'required',
            'email'         => 'required',
            'lulusan'       => 'required',
            'foto'          => 'required|mimes:jpg,jpeg,png|max:1024',
        ],[
            'nidn.required'           =>'Wajib Diisi',
            'nidn.unique'             =>'Nidn Ini Sudah Ada',
            'nidn.max'                =>'Nidn Max 10 Karakter',
            'nama.required'          => 'Wajib Diisi',
            'jenis_kelamin.required' => 'Wajib Diisi',
            'tempat_lahir.required'  => 'Wajib Diisi',
            'tanggal_lahir.required' => 'Wajib Diisi',
            'alamat.required'        => 'Wajib Diisi',
            'hp.required'            => 'Wajib Diisi',
            'email.required'         => 'Wajib Diisi',
            'lulusan.required'       => 'Wajib Diisi',
            'foto.required'          => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        $file = Request()->foto;
        $filename = Request()->nidn.'.'.$file->extension();
        $file->move(public_path('foto_dosen'),$filename);

        $data = [
            'nidn'          => Request()->nidn,
            'nama'          => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'tempat_lahir'  => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'alamat'        => Request()->alamat,
            'hp'            => Request()->hp,
            'email'         => Request()->email,
            'lulusan'       => Request()->lulusan,
            'foto'          => $filename,
        ];
        $this->DosenModel->addData($data);
        return redirect()->route('dosen')->with('Pesan','Data Berhasil Di tambahkan');
    }

    public function edit($id_dosen){
        if (!$this->DosenModel->detailData($id_dosen)){
            abort(404);
        }
        $data = [
        'dosen' => $this->DosenModel->detailData($id_dosen),
   ];
        return view('dosen/v_edit_dosen',$data);
    }

    public function update($id_dosen){

        //Jika ada data yang kosong maka tampilkan error
        Request()->validate([
            'nidn'          => 'required|max:10',
            'nama'          => 'required',
            'jenis_kelamin' => 'required|min:6',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required',
            'alamat'        => 'required',
            'hp'            => 'required',
            'email'         => 'required',
            'lulusan'       => 'required',
            'foto'          => 'mimes:jpg,jpeg,png|max:1024',
        ],[
            'nidn.required'=>'Wajib Diisi',
            'nidn.max'=>'nidn Max 10 Karakter',
            'nama.required'          => 'Wajib Diisi',
            'jenis_kelamin.required' => 'Wajib Diisi',
            'jenis_kelamin.min'      => 'Jenis Kelamin Belum Dipilih',
            'tempat_lahir.required'  => 'Wajib Diisi',
            'tanggal_lahir.required' => 'Wajib Diisi',
            'alamat.required'        => 'Wajib Diisi',
            'hp.required'            => 'Wajib Diisi',
            'email.required'         => 'Wajib Diisi',
            'lulusan.required'       => 'Wajib Diisi',
        ]);

        //Jika validasi tidak ada maka lakukan simpan
        //Upload Gambar
        if (Request()->foto <> "") {
        //Jika tidak ingin ganti foto
        $file = Request()->foto;
        $filename = Request()->nidn.'.'.$file->extension();
        $file->move(public_path('foto_dosen'),$filename);

        $data = [
            'nidn'          => Request()->nidn,
            'nama'          => Request()->nama,
            'jenis_kelamin' => Request()->jenis_kelamin,
            'tempat_lahir'  => Request()->tempat_lahir,
            'tanggal_lahir' => Request()->tanggal_lahir,
            'alamat'        => Request()->alamat,
            'hp'            => Request()->hp,
            'email'         => Request()->email,
            'lulusan'       => Request()->lulusan,
            'foto'          => $filename,
        ];
        $this->DosenModel->editData($id_dosen,$data);
        }else{
            //Jika tidak ingin ganti foto
            $data = [
                'nidn'          => Request()->nidn,
                'nama'          => Request()->nama,
                'jenis_kelamin' => Request()->jenis_kelamin,
                'tempat_lahir'  => Request()->tempat_lahir,
                'tanggal_lahir' => Request()->tanggal_lahir,
                'alamat'        => Request()->alamat,
                'hp'            => Request()->hp,
                'email'         => Request()->email,
                'lulusan'       => Request()->lulusan,
            ];
            $this->DosenModel->editData($id_dosen,$data);
        }

        return redirect()->route('dosen')->with('Pesan','Data Berhasil Di Update');
    }

    public function delete($id_dosen){
        //Hapus foto
        $dosen = $this->DosenModel->detailData($id_dosen);
        if ($dosen->foto <> "") {
            unlink(public_path('foto_dosen').'/'.$dosen->foto);
        }
        $this->DosenModel->deleteData($id_dosen);
        return redirect()->route('dosen')->with('Pesan','Data Berhasil Di Hapus');
    }

    public function print(){

       $data = [
            'dosen' => $this->DosenModel->allData(),
       ];

        return view('dosen/v_print_dosen',$data);
    }
}
