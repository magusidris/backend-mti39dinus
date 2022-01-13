<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\KumpulDm as Datming;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Resources\KumpulDMResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KumpulDMController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'doc'           => 'required|mimes:doc,docx,pdf|max:3000',
            'npm'           => 'required',
            'name'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload doc
        $image = $request->file('image');

        $slugnpm = Str::slug($request->npm, '_');
        $slugname = Str::slug($request->name, '_');
        $extname = $image->getClientOriginalExtension();
        $docname = $slugnpm.'_'.$slugname.'.'.$extname;

        $image->storeAs('public/kumpuldms', $docname);

        // create Photo
        $tugas = Datming::create([
            'doc'     => $docname,
            'npm'       => $request->npm,
            'name'      => $request->name
        ]);

        if ($tugas) {
            // return success with Api Resource
            return new KumpulDMResource(true, 'Tugas Berhasil Disimpan!', $tugas);
        }

        // return failed with Api Resource
        return new KumpulDMResource(false, 'Tugas Gagal Disimpan!', null);
    }
}
