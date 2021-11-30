<?php

namespace App\Http\Controllers\Api\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{

    /**
     * show
     *
     * @param  mixed $id
     * @return void
     */
    public function show(Request $request)
    {
        $short = Str::slug($request->npm, '_');

        $mahasiswa = Mahasiswa::where('short', $short)->first();

        if ($mahasiswa) {
            return new MahasiswaResource(true, 'Detail Data Mahasiswa!', $mahasiswa);
        }

    }

}
