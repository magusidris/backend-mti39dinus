<?php

namespace App\Http\Controllers\Api\Web;

use App\Models\KtmPhoto as Photo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Resources\KtmResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KtmPhotoController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2000',
            'npm'           => 'required',
            'name'          => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // upload image
        $image = $request->file('image');

        $slugnpm = Str::slug($request->npm, '_');
        $slugname = Str::slug($request->name, '_');
        $extname = $image->getClientOriginalExtension();
        $imgname = $slugnpm.'_'.$slugname.'.'.$extname;

        $image->storeAs('public/ktmphotos', $imgname);

        // create Photo
        $photo = Photo::create([
            'image'     => $imgname,
            'npm'       => $request->npm,
            'name'      => $request->name
        ]);

        if ($photo) {
            // return success with Api Resource
            return new KtmResource(true, 'Photo KTM Berhasil Disimpan!', $photo);
        }

        // return failed with Api Resource
        return new KtmResource(false, 'Photo KTM Gagal Disimpan!', null);
    }
}
