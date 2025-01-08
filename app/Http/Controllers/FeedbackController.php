<?php
namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function index(Request $request)
    {
        // Pagination dengan filter pencarian dan entri
        $entries = $request->get('entries', 10);
        $search = $request->get('search', '');

        $umpanBalik = Feedback::when($search, function ($query) use ($search) {
            return $query->where('judul', 'like', '%' . $search . '%');
        })->paginate($entries);

        return view('feedback.index', compact('umpanBalik'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'respon_mitra' => 'nullable|string',
            'respon_admin' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        Feedback::create($request->all());
        return redirect()->back()->with('success', 'Feedback berhasil ditambahkan.');
    }

    public function update(Request $request, $feedback_id)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'respon_mitra' => 'nullable|string',
            'respon_admin' => 'nullable|string',
            'status' => 'required|in:0,1',
        ]);

        $feedback = Feedback::findOrFail($feedback_id);
        $feedback->update($request->all());
        return redirect()->back()->with('success', 'Feedback berhasil diperbarui.');
    }

    public function destroy($feedback_id)
    {
        $feedback = Feedback::findOrFail($feedback_id);
        $feedback->delete();
        return redirect()->back()->with('success', 'Feedback berhasil dihapus.');
    }
}
