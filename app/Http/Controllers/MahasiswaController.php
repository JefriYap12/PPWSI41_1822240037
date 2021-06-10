<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa;

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
        // dump($result);
        return view('mahasiswa.index', ['all-mahasiswa' => $result]);
    }

    public function delete()
    {
        $result = DB::delete('delete from mahasiswas where npm = ?', ['1822240037']);
        dump($result);
    }
    
    public function select()
    {
        $kampus = "Universitas Multi Data Palembang";
        $result = DB::select('select * from mahasiswas');
        // dump($result);
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertQb()
    {
        $result = DB::table('mahasiswas')->insert(
            [
                'npm' => '1822240040',
                'nama_mahasiswa' => 'didit',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2000-12-11',
                'alamat' => 'Jl_sudirman',
                'created_at' => now()
            ]
        );
        dump($result);
    }

    public function updateQb()
    {
        $result = DB::table('mahasiswas')
        ->where('npm', '1822240037')
        ->update(
            [
                'nama_mahasiswa' => 'Jefri',
                'updated_at' => now()
            ]
        );
        dump($result);
    }

    public function deleteQb()
    {
        $result = DB::table('mahasiswas')
        ->where('npm', '1822240031')
        ->delete();
        dump($result);
    }

    public function selectQb()
    {
        $kampus = "UNIVERSITAS MULTI DATA PALEMBANG";
        $result = DB::table('mahasiswas')->get();
        return view('mahasiswa.index', ['allmahasiswa' => $result, 'kampus' => $kampus]);
    }

    public function insertElq()
    {
        $mahasiswa = new Mahasiswa;
        $mahasiswa->npm = '1822240099';
        $mahasiswa->nama_mahasiswa = 'Zainab';
        $mahasiswa->tempat_lahir = 'Bandung';
        $mahasiswa->tanggal_lahir = '2020-10-6';
        $mahasiswa->alamat = 'Bambang Utoyo';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function updateElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240099')->first();
        $mahasiswa->nama_mahasiswa = 'Khadijah';
        $mahasiswa->save();
        dump($mahasiswa);
    }

    public function deleteElq()
    {
        $mahasiswa = Mahasiswa::where('npm', '1822240037')->first();
        $mahasiswa->delete();
        dump($mahasiswa);
    }

    public function selectElq()
    {
        $kampus = "UNIVERSITAS MULTI DATA PALEMBANG";
        $mahasiswa = Mahasiswa::all();
        return view('mahasiswa.index', ['allmahasiswa' => $mahasiswa, 'kampus' => $kampus]);
    }
}
