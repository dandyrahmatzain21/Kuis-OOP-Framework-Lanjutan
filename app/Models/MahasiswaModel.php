<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class MahasiswaModel extends Model
{
    public function allData(){
        return DB::table('tbl_mahasiswa')->get();
    }

    public function detailData($id){
        return DB::table('tbl_mahasiswa')->where('id', $id)->first();
    }

    public function addData($data){
        DB::table('tbl_mahasiswa')->insert($data);
    }

    public function editData($id,$data){
        DB::table('tbl_mahasiswa')->where('id',$id)->update($data);
    }

    public function deleteData($id){
        DB::table('tbl_mahasiswa')->where('id',$id)->delete();
    }
}
