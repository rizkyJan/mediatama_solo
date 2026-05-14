<?php

namespace App\Http\Controllers;

use App\Models\VideoRequest;
use App\Models\VideoPermission;
use Illuminate\Http\Request;

class AdminVideoRequestController extends Controller
{
    public function index()
    {
        $videoRequests = VideoRequest::with(['user', 'video', 'permission'])->latest()->get();
        return view('admin.requests.index', compact('videoRequests'));
    }

    public function edit($id)
    {
        $videoRequest = VideoRequest::with(['user', 'video', 'permission'])->findOrFail($id);
        return view('admin.requests.edit', compact('videoRequest'));
    }

    public function update(Request $request, $id)
    {
        $videoRequest = VideoRequest::findOrFail($id);

        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'expired_at' => 'required_if:status,approved|nullable|date|after:now',
        ]);

        $videoRequest->update([
            'status' => $request->status,
        ]);

        if ($request->status === 'approved') {
            VideoPermission::updateOrCreate(
                ['video_request_id' => $videoRequest->id],
                ['expired_at' => $request->expired_at]
            );
        } else {
            VideoPermission::where('video_request_id', $videoRequest->id)->delete();
        }

        return redirect()->route('admin.requests.index')->with('success', 'Status perijinan akses berhasil diupdate');
    }
}
