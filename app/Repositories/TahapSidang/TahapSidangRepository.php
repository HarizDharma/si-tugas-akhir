<?php

namespace App\Repositories\TahapSidang;

use App\Models\TahapSidang;
use Illuminate\Http\Request;

class TahapSidangRepository implements TahapSidangRepositoryInterface
{
    public function index($platform = 'api')
    {
        $tahapSidang = TahapSidang::all();

        return $tahapSidang;

    }

    public function update($id, Request $request, $platform = 'api')
    {
        $tahap = TahapSidang::find($id);

        $tahap->update(['tanggal_sidang' => $request->jadwal_sidang]);
        return true;
    }
}
