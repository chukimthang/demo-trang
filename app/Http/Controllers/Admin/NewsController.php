<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\NewsAddRequest;
use App\Http\Controllers\Controller;
use App\News;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news = News::all();

        return view('admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NewsAddRequest $request)
    {
        $data = $request->only('title', 'content');

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/images');
        $image->move($destinationPath, $name);
        $data['image'] = $name;
        
        News::create($data);

        return redirect()->route('news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm tin tức thành công'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news = News::find($id);
        if (!$news) {
            return redirect()->route('news.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy tin tức'
            ]);
        }
    
        return view('admin.news.edit', compact('news'));
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
        $news = News::find($id);
        if (!$news) {
            return redirect()->route('news.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy tin tức'
            ]);
        }

        $this->validate($request, [
            'title' => 'required|unique:news,title,' . $news->id,
            'content' => 'required'
        ],
        [
            'title.required' => 'Tiêu đề trống',
            'title.unique' => 'Tiêu đề trùng',
            'content.required' => 'Nội dung trống'
        ]);
        
        $data = $request->only('title', 'content');

        if ($request->file('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/images');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        } else {
            $data['image'] = $news['image'];
        }

        $news->update($data);

        return redirect()->route('news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Sửa tin tức thành công'
        ]);
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