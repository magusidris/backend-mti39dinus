<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\KumpulIr as Infer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Resources\KumpulDMResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\KumpulIRResource;
use Illuminate\Http\Request;

class KumpulIRController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'           => 'required|mimes:doc,docx,pdf|max:3000',
            'npm'           => 'required',
            'name'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload doc
        $image = $request->file('image');

        $nim = strtoupper($request->npm);
        $extname = $image->getClientOriginalExtension();
        $docname = 'IR_'.$nim.'_Reg-39'.'.'.$extname;

        $image->storeAs('public/kumpulirs', $docname);

        // create Photo
        $tugas = Infer::create([
            'image'     => $docname,
            'npm'       => $request->npm,
            'name'      => $request->name
        ]);

        if ($tugas) {
            // return success with Api Resource
            return new KumpulIRResource(true, 'Tugas Berhasil Disimpan!', $tugas);
        }

        // return failed with Api Resource
        return new KumpulIRResource(false, 'Tugas Gagal Disimpan!', null);
    }
}
