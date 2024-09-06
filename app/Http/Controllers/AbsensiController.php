<?php

namespace App\Http\Controllers;

use App\Exports\RekapExport;
use App\Models\Absensi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AbsensiController extends Controller
{
    public function index()
    {
        $data = Absensi::where('user_id', auth()->user()->id)->get();
        return view('absensi.index', compact('data'));
    }

    public function create()
    {
        $checkAbsen = Absensi::where('user_id', auth()->user()->id)->whereDate('created_at', \Carbon\Carbon::today())->first();
        return view('absensi.create', compact('checkAbsen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'foto_awal' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $currentTime = Carbon::now();
        $deadlineTime = Carbon::today()->setHour(10)->setMinute(0)->setSecond(0);

        if ($currentTime->lt($deadlineTime)) {
            $path = NULL;
            if ($request->hasFile('foto_awal')) {
                $upload_path = 'public/foto_awal';
                $filename = time() . '_' . $request->file('foto_awal')->getClientOriginalName();
                $path = $request->file('foto_awal')->storeAs(
                    $upload_path,
                    $filename
                );
            }

            $data['user_id'] = auth()->user()->id;
            $data['waktu_awal'] = $currentTime;
            $data['foto_awal'] = $path;
            Absensi::create($data);

            return redirect()->route('absensi.create')->with('status', 'Absen awal berhasil disubmit!');
        } else {
            return redirect()->route('absensi.create')->with('error', 'Maaf, Anda tidak dapat absen setelah jam 8 pagi!');
        }
    }


    public function absenAkhir(Request $request)
    {
        $request->validate([
            'foto_akhir' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = NULL;
        if ($request->hasFile('foto_akhir')) {
            $upload_path = 'public/foto_akhir';
            $filename = time() . '_' . $request->file('foto_akhir')->getClientOriginalName();
            $path = $request->file('foto_akhir')->storeAs(
                $upload_path,
                $filename
            );
        }

        $lastData = Absensi::where('user_id', auth()->user()->id)->whereDate('created_at', \Carbon\Carbon::today())->first();
        $lastData->waktu_akhir = Carbon::now();
        $lastData->foto_akhir = $path;
        $lastData->save();
        return redirect()->route('absensi.create')->with('status', 'Absen akhir berhasil disubmit!');
    }

    public function data()
    {
        $data = User::where('role', 'user')->get();
        return view('absensi.data', compact('data'));
    }

    public function detail(User $user)
    {
        $data = Absensi::where('user_id', $user->id)->get();
        return view('absensi.detail', compact('data', 'user'));
    }

    public function rekap()
    {
        $data = User::where('role', 'user')->get();
        return view('absensi.rekap', compact('data'));
    }

    public function export()
    {
        return Excel::download(new RekapExport, 'Rekap Data.xlsx');
    }
}
