<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Generator;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // memngambil data siswa
        $siswa = optional(auth()->user());

        $QrcodeSiswa = implode(',' ,[
            $siswa->nis,
            $siswa->kelas_id,
            $siswa->jurusan_id,
        ]);

        $qrcode = QrCode::size(100)->generate($QrcodeSiswa);
        return view('dashboard.index', [
            'absens' => Absen::with(['siswa', 'mapels', 'gurus', 'jurusan', 'kelas'])->get(),
            'qrcode' => $qrcode,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // cek data apakah siswa sudah absen hari ini
        $cek = Absen::where([
            'nis_id' => $request->nis_id,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'tanggal' => date('y-m-d')
        ])->first();


        // if (!$cek) {
        //     return redirect('/')->with('gagal', 'anda sudah absen');
        // }

        if ($cek) {
            return redirect('/absen')->with('gagal', 'anda sudah absen');
        }


        Absen::create([
            'nis_id' => $request->nis_id,
            'kelas_id' => $request->kelas_id,
            'jurusan_id' => $request->jurusan_id,
            'tanggal' => date('y-m-d')
        ]);

        return redirect('/absen')->with('success', 'berhasil masuk');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absen $absen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absen $absen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absen $absen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absen $absen)
    {
        Absen::destroy($absen->id);
        return redirect('/absen')->with('delete', 'Berhasil Delete');
    }

    // public function search(Request $request)
    // {
    //     $optionKelas = Absen::pluck('kelas_id')->unique();

    //     $filterKelas = $request->input('kelas_id');
    // }
}
