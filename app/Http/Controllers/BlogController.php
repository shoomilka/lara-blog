<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Blog;

use Image;
use Validator;
use Redirect;
use Storage;
use File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::paginate(25);

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();

        $validator = Validator::make($requestData, Blog::getValidationRules());
        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validator = Validator::make($requestData, [
            'pic' => 'required|image'
        ]);

        if($validator->fails()) return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        
        do{
            $pathToFile = 'img/'.str_random(20).'.jpg';
        } while (Storage::disk('local')->exists($pathToFile));

        Image::make($requestData['pic']->path())
            ->save($pathToFile);

        $requestData['photo'] = $pathToFile;
        $requestData['body'] = nl2br($requestData['body']);

        Blog::create($requestData);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.edit', compact('blog'));
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
        $requestData = $request->all();

        $validator = Validator::make($requestData, Blog::getValidationRules());
        if ($validator->fails()) {
            return redirect::back()
                        ->withErrors($validator)
                        ->withInput();
        }

        $validator = Validator::make($requestData, [
            'pic' => 'required|image'
        ]);

        $blog = Blog::findOrFail($id);

        if(!$validator->fails()) Image::make($requestData['pic']->path())
                                            ->save($blog->photo);

        $blog->title = $requestData['title'];
        $blog->body = nl2br($requestData['body']);
        $blog->posted_at = $requestData['posted_at'];
        $blog->save();

        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        File::delete($blog->photo);
        $blog->delete();
        return redirect('/');
    }
}
