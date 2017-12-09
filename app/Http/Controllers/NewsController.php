<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy("created_at", "desc")->paginate(6);

        $count = News::count();

        return view('news.index', compact('news', 'count'));
    }

    public function show($id)
    {
        $news = News::find($id);

        if (!$news) {
            return redirect()->route('news.index')->with([
                'flash_level' => 'danger',
                'flash_message' => 'Không tìm thấy tin tức'
            ]);
        }

        $news_lastest = News::orderBy('created_at','DESC')->take(4)->get();

        return view('news.show', compact('news', 'news_lastest'));
    }
}
