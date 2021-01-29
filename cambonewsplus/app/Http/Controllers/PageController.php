<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages= DB::table('pages')->orderby('pageid','DESC')->get();
        $publish = DB::table('pages')->where('status','publish')->count();
        $allpages = DB::table('pages')->count();
        return view('backend.page.allPage', ['pages' => $pages, 'publish'=>$publish, 'allpages' => $allpages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.page.addPage');
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
            'title' => 'required',
            'slug'=> 'required',
            'description' =>'required',
            'status' => 'required',
        ]);
        DB::table('pages')->insert($data);
        return redirect('/admin/pages/index')->with('message','Posts insert successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pages = DB::table('pages')->where('pageid',$id)->first();
        return view('backend.page.editPage', ['pages'=>$pages]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $pages = Input::except('_token');
        $tbl = decrypt($pages['tbl']);
        unset($pages['tbl']);
        $pages['updated_at'] = date('Y-m-d H:i:s');
        $request->validate([
            'title' => 'required',
            'slug'=> 'required',
            'description' =>'required',
            'status' => 'required',
        ]);
        DB::table('pages')->where(key($pages), reset($pages))->update($pages);
        return redirect('/admin/pages/index')->with('message','Data update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect('/admin/pages/index')->with('message', 'Page delete successful.');
    }
}
