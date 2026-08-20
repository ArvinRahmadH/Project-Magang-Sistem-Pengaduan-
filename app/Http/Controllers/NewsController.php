<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('admin.notes.index', compact('news'));
    }

    public function create()
    {
        return view('admin.notes.news');
    }   

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required',
            'image' => 'required|image',
            'link'  => 'required|url',
        ]);

        $data['image_path'] = $request->file('image')->store('news', 'public');

        News::create($data);

        return redirect()->back()->with('success', 'Berita berhasil ditambahkan');
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.notes.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $data = $request->validate([
            'title' => 'required',
            'link'  => 'required|url',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')
            ->with('success', 'Berita berhasil diperbarui');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);

       if ($news->image_path) {
            \Storage::disk('public')->delete($news->image_path);
        }


        $news->delete();

        return redirect('/admin/news')->with('success', 'Berita berhasil dihapus');
    }


    
}
