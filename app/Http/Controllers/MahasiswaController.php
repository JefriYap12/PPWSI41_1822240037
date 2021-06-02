<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MahasiswaController extends Controller
{
    public function insert()
    {
        $result = DB::insert('insert into mahasiswas (npm, nama_mahasiswa, tempat_lahir, tanggal_lahir, alamat, created_at) 
        values (?, ?, ?, ?, ?, ?)', ['1822240031', 'Andre', 'Palembang', '2000-10-12', 'Papera', now()]);
        dump($result);
    }

    public function update()
    {
        $result = DB::update('update mahasiswas set nama_mahasiswa = "Andry", updated_at = now() where npm = ?', ['1822240037']);
        dump($result);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240037']);
        dump($result);
    }
    
    public function select()
    {
        $result = DB::select("select * from mahasiswas");
        dump($result);
    }
}
