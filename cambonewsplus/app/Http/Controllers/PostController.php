<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = DB::table('posts')->orderby('pid','DESC')->paginate(10);
        foreach($posts as $post){
            $categories = explode(',',$post->category_id);
            foreach($categories as $cat){
                $postcat = DB::table('categories')->where('cid',$cat)->value('title');
                $postcategories[] = $postcat;
                $postcat=implode(',',$postcategories);
            }
            $post->category_id = $postcat;
            $postcategories = [];
        }
        $publish = DB::table('posts')->where('status','publish')->count();
        $allpost = DB::table('posts')->count();
        return view('backend.posts.all-post', ['posts' => $posts, 'publish'=>$publish, 'allpost' => $allpost]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.posts.add-post',['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');
        if (Input::has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }
        $request->validate([
            'title' => 'required',
            'slug'=> 'required',
            'description' =>'required',
            'category_id'=> 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        DB::table('posts')->insert($data);
        return redirect('/admin/posts/index')->with('message','Posts insert successful');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('posts')->where('pid',$id)->first();
        $postcat = explode(',',$data->category_id);
        $categories = DB::table('categories')->get();
        return view('backend.posts.editPost', ['data' => $data, 'categories' =>$categories, 'postcat'=>$postcat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        if (Input::has('category_id')) {
            $data['category_id'] = implode(',', $data['category_id']);
        }
        $request->validate([
            'title' => 'required',
            'slug'=> 'required',
            'description' =>'required',
            'category_id'=> 'required',
            'status' => 'required',
        ]);
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        DB::table('posts')->where(key($data), reset($data))->update($data);
        return redirect('/admin/posts/index')->with('message','Posts Update successful.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect('/admin/posts/index')->with('message','Post delete successfully.');
    }
}
