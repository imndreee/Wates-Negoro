<?php

namespace App\Http\Controllers;

use App\Desa;
use App\Agama;
use App\Darah;
use App\DetailDusun;
use App\Dusun;
use App\Http\Requests\PendudukRequest;
use App\Pekerjaan;
use App\Pendidikan;
use App\Penduduk;
use App\StatusHubunganDalamKeluarga;
use App\StatusPerkawinan;
use Illuminate\Http\Request;
class PelayananDesaController extends Controller
{
    public function index()
    {
        $desa = Desa::find(1);
        return view('pelayanan.index', compact('desa'));
    }

    public function kirimPermintaan(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }
    
    public function ktpIndex()
    {
        $desa = Desa::find(1);
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $darah = Darah::all();
        $darah = Darah::all();
        // $kewarganegaraan = Kewarganegaraan::all();
        $statusperkawinan = StatusPerkawinan::all();
        $pendidikan = Pendidikan::all();
        return view('pelayanan.ktp', compact('desa', 'agama', 'pendidikan', 'pekerjaan', 'darah', 'statusperkawinan'));
    }
    
    
    public function ktpKirim(Request $request)
    {

        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nama = $request->input('nama');
        $tempatlahir = $request->input('tempatlahir');
        $tanggallahir = $request->input('tanggallahir');
        $alamat = $request->input('alamat');
        $agama = $request->input('agama');
        $pendidikan = $request->input('pendidikan');
        $statusperkawinan = $request->input('statusperkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('kewarganegaraan');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama \nTempat Lahir : $tempatlahir\nTanggal Lahir : $tanggallahir\nAlamat :$alamat\nAgama :$agama\nPendidikan : $pendidikan\nStatus Perkawinan : $statusperkawinan\nPekerjaan : $pekerjaan\nKewarganegaraan : $kewarganegaraan";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);

        // redirect()->route('ktp.index')->with('success', 'Data KTP berhasil ditambahkan');

        // Validasi data jika diperlukan
        // $request->validate([
        //     'nomor_ktp' => 'required|unique:data_ktp',
        //     'nama' => 'required',
        //     'tanggal_lahir' => 'required|date',
        //     'tempat_lahir' => 'required',
        //     'alamat' => 'required',
        //     'agama' => 'required',
        //     'status' => 'required',
        //     'pekerjaan' => 'required',
        //     'kewarganegaraan' => 'required',
        //     'created_at' => 'required',
        //     'updated_at' => 'required'
        // ]);

        // Menambahkan data ke database
        // $ktp = DB::insert('insert into penduduk (id, name) values (?, ?)', [1, 'Dayle']);

        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl);


    }
    
    public function kkIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.kk', compact('desa'));
    }

    public function kkKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        // $nik = $request->input('nik');
        $nama = $request->input('nama');
        $tempatlahir = $request->input('tempatlahir');
        $tanggallahir = $request->input('tanggallahir');
        $alamat = $request->input('alamat');
        $agama = $request->input('nama');
        $pendidikan = $request->input('pendidikan');
        $statusperkawinan = $request->input('statusperkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama \n\ndengan agama $agama";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }

        public function warisIndex()
    {
        $desa = Desa::find(1);
        $agama = Agama::all();
        $pekerjaan = Pekerjaan::all();
        $darah = Darah::all();
        $darah = Darah::all();
        // $kewarganegaraan = Kewarganegaraan::all();
        $statusperkawinan = StatusPerkawinan::all();
        $pendidikan = Pendidikan::all();
        return view('pelayanan.waris', compact('desa', 'agama', 'pendidikan', 'pekerjaan', 'darah', 'statusperkawinan'));
    }

    public function warisKirim(Request $request)
    {
         // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nama = $request->input('nama');
        $tempatlahir = $request->input('tempatlahir');
        $tanggallahir = $request->input('tanggallahir');
        $alamat = $request->input('alamat');
        $agama = $request->input('agama');
        $pendidikan = $request->input('pendidikan');
        $statusperkawinan = $request->input('statusperkawinan');
        $pekerjaan = $request->input('pekerjaan');
        $kewarganegaraan = $request->input('kewarganegaraan');
        $layanan = $request->input('layanan');
        $keterangan = $request->input('keterangan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan surat kehilangan dari $nama \nTempat Lahir : $tempatlahir\nTanggal Lahir : $tanggallahir\nAlamat :$alamat\nAgama :$agama\nPendidikan : $pendidikan\nStatus Perkawinan : $statusperkawinan\nPekerjaan : $pekerjaan\nKewarganegaraan : $kewarganegaraan\nketerangan : $keterangan";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6289644797401'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);

        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }

            public function skckIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.skck', compact('desa'));
    }

    public function skckKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }
    
            public function nikahIndex()
    {
       return view('pelayanan.nikah');
    }

    public function showPopupnikah()
    {
        return view('pelayanan.popup');
    }

            public function kematianIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.kematian', compact('desa'));
    }

    public function kematianKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }

            public function sktmIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.sktm', compact('desa'));
    }

    public function sktmKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }

            public function pindahIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.pindah', compact('desa'));
    }

    public function pindahKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }

     public function domisiliIndex()
    {
        $desa = Desa::find(1);
        return view('pelayanan.domisili', compact('desa'));
    }

    public function domisiliKirim(Request $request)
    {
        // Proses pengiriman permintaan ke WhatsApp dapat ditambahkan di sini
        $nik = $request->input('nik');
        $nama = $request->input('nama');
        $layanan = $request->input('layanan');
    
        // Membuat pesan WhatsApp
        $pesan = "Permintaan $layanan dari $nama dengan NIK $nik";
    
        // Nomor WhatsApp yang akan dikirimkan pesan
        $nomorWhatsApp = '6285853368040'; // Ganti dengan nomor yang sesuai
    
        // Membuat URL Scheme untuk membuka WhatsApp dengan pesan
        $whatsappUrl = "https://wa.me/$nomorWhatsApp?text=" . urlencode($pesan);
    
        // Mengarahkan ke URL WhatsApp
        return redirect($whatsappUrl)->with('success', 'Permintaan berhasil dikirim!');
    }
}
