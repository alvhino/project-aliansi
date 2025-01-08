<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\UmpanBalik;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index()
    {
        $umpanBalik = Feedback::paginate(10);
        return view('umpan_balik.index', compact('umpanBalik'));
    }
}
?>
