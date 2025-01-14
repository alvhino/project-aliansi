<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        // Ambil data feedback dengan paginasi
        $feedback = Feedback::paginate(10);
        
        // Pastikan view feedback/index.blade.php tersedia
        return view('feedback.index', compact('feedback'));
    }
}

