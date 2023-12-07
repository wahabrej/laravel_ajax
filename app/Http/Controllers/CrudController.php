<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if(Auth::id())
        {
            
            if(Auth::user()->usertype =="user")
            {
                $data=Post::latest()->get();
              
                return view("user.home",compact("data"));
            }
            else if(Auth::user()->usertype == "admin")
            {
                return view("admin.home");
            }
        }
        else
        {
           return redirect()->back();
        }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post=new Post;
      
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        return redirect("crud");
    }

    /**
     * Display the specified resource.
     */
  

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Post::find($id);
        return view("update",compact("data"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post=Post::find($id);
      
        $post->title=$request->title;
        $post->body=$request->body;
        $post->save();

        return redirect("crud");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data=Post::find($id);
        $data->delete();
        return redirect("crud");
    }
}
