<?php

namespace App\Services;

use App\Services\Services;
use Illuminate\Http\Request;

class ImageUploadService  implements Services
{
    public function store(Request $request, $store)
    {
        if ($request->hasFile('image')) {
            $imgName = $request->file('image')->getClientOriginalName();
            $imgSize = $request->file('image')->getClientSize();
            $request->file('image')->storeAs('public/' . $store, $imgName);
        } else {
            $imgName = 'noimage.jpg';
            $imgSize = 0;
        }

        return collect(['imgName' => $imgName, 'imgSize' => $imgSize]);
    }
}
