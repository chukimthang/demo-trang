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
        $news = News::orderBy('created_at', 'DESC')->get();

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
        $data = $request->only('title', 'description', 'content');

        $image = $request->file('image');
        $name = time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('upload/images/news');
        $image->move($destinationPath, $name);
        $data['image'] = $name;
        
        News::create($data);

        return redirect()->route('admin.news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Thêm bài viết thành công'
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
                'flash_message' => 'Không tìm thấy bài viết'
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
                'flash_message' => 'Không tìm thấy bài viết'
            ]);
        }

        $this->validate($request, 
            [
                'title' => 'required|unique:news,title,' . $news->id,
                'description' => 'required',
                'content' => 'required'
            ],
            [
                'title.required' => 'Tiêu đề trống',
                'title.unique' => 'Tiêu đề trùng',
                'description.required' => 'Mô tả trống',
                'content.required' => 'Nội dung trống'
            ]
        );
        
        $data = $request->only('title', 'description', 'content');

        if ($request->file('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('upload/images/news');
            $image->move($destinationPath, $name);
            $data['image'] = $name;
        } else {
            $data['image'] = $news['image'];
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Sửa bài viết thành công'
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
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('admin.news.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Xóa thành công'
            ]);
        }

        $name_image = $news->image;
        $destinationPath = public_path("upload/images/news/$name_image");

        if(file_exists($destinationPath)){
            @unlink($destinationPath);
        }
        
        $news->delete();
        
        return redirect()->route('admin.news.index')->with([
            'flash_level' => 'success',
            'flash_message' => 'Xóa bài viết thành công'
        ]);
    }
}
