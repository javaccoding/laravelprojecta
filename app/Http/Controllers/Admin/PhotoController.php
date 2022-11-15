<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Photo;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $photos = Photo::orderBy('id','asc')
             ->paginate(5);
         return view('admin.photo.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation gareko
        $request->validate([
            'alt_text' =>'required',
            'main_photo' =>'required',
    ]);
//        dd($request ->all());
        if($request->hasFile('main_photo')){
            //if thyo create vanne form ma main_photto aayo
            $file = $request->main_photo;

            //getcli.... photo ko name nai taneko
            $file_name = $file->getClientOriginalName();

            ///pub ma images vanne folder banaa vaneko
            if (!file_exists(public_path('images')))
                @mkdir(public_path('images'));

            //move photo to public images
            $file->move(public_path('images'),$file_name);

            //photo ko name date
            $request->merge([
                'photo'=>$file_name
            ]);
        }
        Photo::create($request->post());
        return redirect()->route('photo.index')->with('sucess','created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Admin\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show(Photo $photo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Admin\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=[];
        $data['row']=Photo::find($id);
        return view('admin.photo.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Admin\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Photo $photo)
    {
        //validation gareko
        $request->validate([
            'alt_text' =>'required',
            'main_photo' =>'required',
        ]);
//        dd($request ->all());
        if($request->hasFile('main_photo')){
            //if thyo create vanne form ma main_photto aayo
            $file = $request->main_photo;

            //getcli.... photo ko name nai taneko
            $file_name = $file->getClientOriginalName();

            ///pub ma images vanne folder banaa vaneko
            if (!file_exists(public_path('images')))
                @mkdir(public_path('images'));

            //move photo to public images
            $file->move(public_path('images'),$file_name);

            //photo ko name date
            $request->merge([
                'photo'=>$file_name
            ]);

            if (file_exists(public_path('images/'. $photo->photo))){
                @unlink(public_path('images/'.$photo->photo));
            }
        }
        $photo->fill($request->all())
            ->save();
        return redirect()->route('photo.index')->with('sucess','updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Admin\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Photo $photo)
    {
        if (file_exists(public_path('images/'. $photo->photo))){
            @unlink(public_path('images/'.$photo->photo));
        }
       $photo->delete();
        return redirect()->route('photo.index')->with('sucess','updated successfully');
    }
}
