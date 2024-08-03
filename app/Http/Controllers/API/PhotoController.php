<?php

namespace App\Http\Controllers\API;

use App\Models\photo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif|max:2048',
        ]);
        try {

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

            $image = new photo();
            $image->image = 'images/'.$imageName;
            $image->user_id = Auth::id();
            $image->save();
    
            return response()->json(['message'=>'saved'], 201);

        } catch (\Exception $e) {
            \Log::error('Image upload failed: ' . $e->getMessage());

            return response()->json([
                'message'=>'failed to upload image',
                'error' => $e->getMessage()
            ],500);
        }
    }

    public function delete($id)
    {
        try{
        $image = Photo::findOrFail($id);
       if(Storage::disk('public')->exists($image->image)){
        Storage::disk('public')->delete($image->image);
       }
        $image->delete();

        return response()->json(['message' => 'Photo deleted successfully.'],200);
    }catch(\Exception $e){
        return response()->json([
            'message' => 'failed to delete photo'
        ],500);
    }
}

public function fetch()
{
    $image = Photo::all();
    return response()->json(['photos' => $image]);
}

}
