<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::all();

        return view('posts.index')
            ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all(['id', 'name']);

        return view('posts.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {


        $validated = $request->validate([

            'title' => 'required|min:10',
           'content' => 'required|min:100'
        ]);
//         Auth::id();
//        $post = Post::create($validated);
      $post= Post::create([
            'title'=>$validated['title'],
            'user_id'=>auth()->user()->id,
            'content'=>$validated['content']
        ]);

        return redirect()->route('posts.show',compact('post'))->with('success',' Your Post added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $post = Post::withTrashed()->findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

$post=Post::find($id);
//       $validated = $request->validate([
//           'title' =>'required|min:10',
//           'content' =>'required|min:100'
//       ]);

          if (Auth::id()!=$post->user->id)
            abort('403');

//          $post = Post::update($validated);

          return view('posts.edit', compact('post'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update( Request $request  , $id)
    {
        $post=Post::find($id);

        $validated = $request->validate([

            'title' => 'required|min:10',
            'content' => 'required|min:100'
        ]);



      $post->update([
           'title'=>$validated['title'],
           'content' => $validated['content']
  ]);


       return redirect()->route('posts.index')
           ->with('success','Post updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

      $post= Post::find($id);


        if (Auth::id()!=$post->user->id)
            abort('403');

        Post::find($id)->delete();

        return redirect()
            ->route('posts.index');
    }


    public function forceDelete($id)
    {

        Post::withTrashed()->find($id)->forceDelete();

        return redirect()
            ->route('posts.index');
    }


    public function restore($id)
    {
        Post::withTrashed()->find($id)->restore();

        return back();
    }
}
