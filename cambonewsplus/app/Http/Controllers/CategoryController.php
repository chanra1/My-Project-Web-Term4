<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Category::all();
        return view('backend.categories.category', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['created_at'] = date('Y-m-d H:i:s');
        $request->validate([
            'title'=> 'required',
            'slug'=> 'required',
            'status' => 'required',
        ]);
        DB::table('categories')->insert($data);
        return redirect()->back()->with('message','Category insert successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $singledata = DB::table('categories')->where('cid', $id)->first();
        if($singledata == null){
            return redirect('/admin/category/index');
        }
        $data = DB::table('categories')->get();
        return view('backend.categories.editcategory',['data' => $data, 'singledata' => $singledata]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = Input::except('_token');
        $tbl = decrypt($data['tbl']);
        unset($data['tbl']);
        $data['updated_at'] = date('Y-m-d H:i:s');
        if (Input::has('social')) {
            $data['social'] = implode(',', $data['social']);
        }
        $request->validate([
            'title'=> 'required',
            'slug'=> 'required',
            'status' => 'required',
        ]);
        DB::table('categories')->where(key($data), reset($data))->update($data);;
        return redirect('/admin/category/index')->with('message','Category update successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect('/admin/category/index')->with('message','Category delete successfully.');
    }
}
