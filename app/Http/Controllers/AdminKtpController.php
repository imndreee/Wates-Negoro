<?php

namespace App\Http\Controllers;

use App\Models\Ktp; // Pastikan Anda mengganti ini sesuai dengan model KTP Anda
use Illuminate\Http\Request;

class AdminKtpController extends Controller
{
    public function index()
    {
        $ktps = Ktp::all(); // Ambil semua data KTP dari model

        return view('admin.ktpadmin', compact('data_ktp'));
    }

    // public function store(Request $request)
    // {
    //     // Validasi data jika diperlukan
    //     $request->validate([
    //         'nomor_ktp' => 'required|unique:data_ktp',
    //         'nama' => 'required',
    //         'tanggal_lahir' => 'required|date',
    //         'tempat_lahir' => 'required',
    //         'alamat' => 'required',
    //         'agama' => 'required',
    //         'status' => 'required',
    //         'pekerjaan' => 'required',
    //         'kewarganegaraan' => 'required',
    //         'created_at' => 'required',
    //         'updated_at' => 'required'
    //     ]);

    //     // Menambahkan data ke database
    //     $ktp = Ktp::create($request->all());

    //     return redirect()->route('ktp.index')->with('success', 'Data KTP berhasil ditambahkan');
    // }
}
