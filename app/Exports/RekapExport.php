<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RekapExport implements FromView
{
    public function view(): View
    {
        return view('exports.rekap', [
            'data' => User::where('role', 'user')->get()
        ]);
    }
}
