<?php
//Nim 2019102060 Dandy Rahmat Zain
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class KegiatanModel extends Model
{
    public function allData(){
        return DB::table('tbl_kegiatan')->get();
    }

    public function detailData($id_kegiatan){
        return DB::table('tbl_kegiatan')->where('id_kegiatan', $id_kegiatan)->first();
    }

    public function addData($data){
        DB::table('tbl_kegiatan')->insert($data);
    }

    public function editData($id_kegiatan,$data){
        DB::table('tbl_kegiatan')->where('id_kegiatan',$id_kegiatan)->update($data);
    }

    public function deleteData($id_kegiatan){
        DB::table('tbl_kegiatan')->where('id_kegiatan',$id_kegiatan)->delete();
    }
}
