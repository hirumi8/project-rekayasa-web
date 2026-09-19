<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    //
    public function index()
    {
        $mahasiswa = [
            'nim' => '251011701273',
            'nama' => 'Ivan Hilmi Hersony',
            'prodi' => 'Sistem Informasi',
            'email' => 'ivanhilson@gmail.com',
            'kampus' => 'Universitas Pamulang',
            'status' => 'Aktif',
        ];

        return view('mahasiswa', compact('mahasiswa'));
    }
}