<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVideoController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.videos.index', compact('videos'));
    }

    public function create()
    {
        return view('admin.videos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_file' => 'required|mimes:mp4,mov,ogg,qt|max:102400',
        ]);

        $path = $request->file('video_file')->store('videos', 'public');

        Video::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
        ]);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diupload');
    }

    public function edit(Video $video)
    {
        return view('admin.videos.edit', compact('video'));
    }

    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_file' => 'nullable|mimes:mp4,mov,ogg,qt|max:102400',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('video_file')) {
            Storage::disk('public')->delete($video->file_path);
            $data['file_path'] = $request->file('video_file')->store('videos', 'public');
        }

        $video->update($data);

        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil diupdate');
    }

    public function destroy(Video $video)
    {
        Storage::disk('public')->delete($video->file_path);
        $video->delete();
        return redirect()->route('admin.videos.index')->with('success', 'Video berhasil dihapus');
    }
}
