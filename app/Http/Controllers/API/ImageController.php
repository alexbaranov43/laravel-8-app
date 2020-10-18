<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Http\Resources\ImageResource;
use App\Http\Resources\ImageCollection;
use Illuminate\Support\Facades\Auth;
use stdClass;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $image_name = $request->get('image');
        $user_id = $request->get('user_id');
        
        if (!is_numeric($user_id) && $user_id !== Auth::id()) {
            abort(403);
        }
        $image = new Image([
            'image' =>  $request->get('image'),
            'user_id' => $request->get('user_id')
        ]);
        $image->save();

        $data = new stdClass();
        $data->id = $image->id;
        $data->image = $image->image;
        $data->user_id = $image->user_id;

        return new ImageResource($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!is_numeric($id)) {
            abort(403);
        }
        
        $images = Image::select('images.id', 'images.image', 'u.name as user')
            ->join('users as u', 'u.id', '=', 'images.user_id')
            ->where('u.id', $id)
            ->get();
            
            return new ImageCollection($images);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
