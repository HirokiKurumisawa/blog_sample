<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;#Postモデルパスを通す
use App\Http\Requests\StoreRequest;#StoreRequestモデルパス通す

class PostsController extends Controller
{
    protected $posts;

     public function __construct(Post $posts)
     {
         $this->posts = $posts;
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$posts = Post::all();*/
	$posts = $this->posts->all();
        return view('blog.index')->with('posts', $posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = [
         'title' => $request->get('title'),
         'content' => $request->get('content'),
         'cat_id' => $request->get('cat_id')
     ];
     $this->posts->create($data);

     return redirect()->back()
         ->with('message', '投稿が完了しました。');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = $this->posts->find($id);
        return view('blog.single')->with('post', $post);

    }
    
    #<pre><code class="language-php">
    public function showCategory($id)
   {
	$category_posts = $this->posts->where('cat_id', $id)->get();

	return view('blog.category')
		->with('category_posts', $category_posts);
    }
    #</code></pre>

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
