<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Photo;

class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dashboards = User::all();
        $gender = User::where('id','=',Auth::user()->id)->first();
        $contents = Content::where('user_id',auth()->user()->id)->get();
        return view('dashboard',compact('dashboards','contents','gender'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('addcontent');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'date' => 'required',
            'image' => 'required',
        ]);

        $image = $request->image;
        if($image!=null){
            $namafileasli = md5($image->getClientOriginalName());
            $ekstensi = $image->getClientOriginalExtension();
            $namaBaru = '/image/'.time().'-'.$namafileasli.'.'.$ekstensi;
            $path = $image->storeAs('', $namaBaru);
        }
        else{
            $namabaru = null;
        }
    
        $content = Content::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'deskripsi'=> $request->deskripsi,
            'image' => $namaBaru,
            'date'=> $request->date, 
        ]);
    
        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $content = Content::where('id',$id)->first();
        $photos = Photo::where('content_id',$id)->get();
        return view('content',['content'=>$content], ['photos'=>$photos]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = Content::where('id',$id)->first();
        return view('editcontent', ['content'=>$content]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'deskripsi' => 'required',
            'date' => 'required',
        ]);

        $content = Content::where('id',$id)->first();
        $content->update([
            'name' => $request->name,
            'deskripsi'=> $request->deskripsi,
            'date'=> $request->date, 
        ]);
        return redirect()->route('dashboard.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Content  $content
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $content = Content::where('id',$id);
        $content->delete();
        return redirect()->route('dashboard.index');
    }
}
