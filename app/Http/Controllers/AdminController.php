<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Video;
use App\Models\VideoRequest;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Mengambil statistik untuk ditampilkan di kartu dashboard
        $totalCustomer = User::where('role', 'customer')->count();
        $totalVideo = Video::count();
        $pendingRequest = VideoRequest::where('status', 'pending')->count();

        return view('admin.dashboard', compact('totalCustomer', 'totalVideo', 'pendingRequest'));
    }
}
