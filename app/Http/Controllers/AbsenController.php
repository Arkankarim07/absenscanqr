<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.index', [
            'absens' => Absen::with(['siswa', 'mapels', 'gurus', 'jurusan', 'kelas'])->get()
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
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
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
            'mapel_id' => $request->mapel_id,
            'guru_id' => $request->guru_id,
            'jurusan_id' => $request->jurusan_id,
            'kelas_id' => $request->kelas_id,
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
}
