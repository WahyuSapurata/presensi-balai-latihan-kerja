<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function index()
    {
        $data = Jadwal::all();
        return view('jadwal.index', compact('data'));
    }

    public function create()
    {
        return view('jadwal.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'tanggal' => ['required'],
                'jam' => ['required'],
                'materi' => ['required', 'string'],
                'jurusan' => ['required', 'string'],
            ]
        );

        if (Jadwal::create($request->all())) {
            return redirect()->route('jadwal.index')->with('status', 'Data berhasil di simpan!');
        } else {
            return redirect()->route('jadwal.index')->with('error', 'Data gagal di simpan!');
        }
    }

    public function edit(Jadwal $jadwal)
    {
        return view('jadwal.edit', compact('jadwal'));
    }

    public function update(Request $request, Jadwal $jadwal)
    {
        $request->validate(
            [
                'tanggal' => ['required'],
                'jam' => ['required'],
                'materi' => ['required', 'string'],
                'jurusan' => ['required', 'string'],
            ]
        );

        if ($jadwal->update($request->all())) {
            return redirect()->route('jadwal.index')->with('status', 'Data berhasil di edit!');
        } else {
            return redirect()->route('jadwal.index')->with('error', 'Data gagal di edit!');
        }
    }

    public function destroy(Jadwal $jadwal)
    {
        $jadwal->delete();
        return back()->with('status', 'Data berhasil dihapus!');
    }
}
