<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    // automatic image
    public function getRandomImage() {
        // $filename = 'file.jpg';
        // $tempfile = tempnam(sys_get_temp_dir(), $filename);
        // copy('https://picsum.photos/400/300', $tempfile);
        // return response()->download($tempfile, $filename);

        $url = 'https://picsum.photos/400/300';
        return file_get_contents($url);

        // return redirect('https://picsum.photos/400/300');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', [
            // 'posts' => Post::latest()->paginate(6)
            'posts' => Post::where('status', 'published')->latest()->paginate(6)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
            'title' => 'required|string',
            'body' => 'required|string',
            'image' => 'image|mimes:jpg,jpeg,png|max:4096'
        ]);

        if ($request->excerpt) {
            $request->validate([
                'excerpt' => 'required|string'
            ]);
        }

        if (!$request->image) {
            $image = $this->getRandomImage();
        } else {
            $image = $request->image;
        };

        // immagine - nuovo nome connesso al post e salva l'immagine in public/img/posts
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
        $request->image->move(public_path('img/posts'), $newImageName);

        // dd($request->validate);
        $slug = Str::slug($request->title);

        Post::create([
            // 'title' => $request->input('title'),
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'body' => $request->body,
            'slug' => $slug,
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return view('posts.show')->with('post', Post::where('slug', $slug)->first())->with('success', 'Nuovo post creato con successo!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return view('posts.show')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('posts.edit')->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        Post::where('slug', $slug)
            ->update([
                'title' => $request->title,
                'excerpt' => $request->excerpt,
                'body' => $request->body,
                'slug' => Str::slug($request->title),
                // 'image_path' => $newImageName,
                'user_id' => auth()->user()->id
            ]);

        // se l'immagine viene sostituita copiarla in public.
        // cancellare quella vecchia?

        return redirect('/posts')->with('success', 'Post modificato con successo!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // Il post NON viene cancellato dal database, ma solo rimosso dalla visione...
        // Quindi serve forse uno stato del post (valore booleano attivo?)
        // Magari anche possibilità di bozza prima di renderlo visibile...
        Post::where('slug', $slug)
            ->update([
                'status' => 'deleted'
            ]);

        return redirect('/posts')->with('success', 'Post cancellato!');
    }

}
