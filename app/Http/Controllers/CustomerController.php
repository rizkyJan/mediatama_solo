<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\VideoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    public function index()
    {
        $videos = Video::with(['requests' => function ($query) {
            $query->where('user_id', Auth::id());
        }, 'requests.permission'])->latest()->get();

        return view('customer.dashboard', compact('videos'));
    }

    public function requestVideo($videoId)
    {
        VideoRequest::updateOrCreate(
            ['user_id' => Auth::id(), 'video_id' => $videoId],
            ['status' => 'pending']
        );

        return back()->with('success', 'Permintaan akses video telah dikirim.');
    }

    public function watchVideo($videoId)
    {
        $request = VideoRequest::where('user_id', Auth::id())
            ->where('video_id', $videoId)
            ->where('status', 'approved')
            ->firstOrFail();

        if ($request->permission->expired_at < now()) {
            return redirect()->route('customer.dashboard')->with('error', 'Masa akses video telah habis.');
        }

        $video = Video::findOrFail($videoId);
        return view('customer.watch', compact('video'));
    }
}
