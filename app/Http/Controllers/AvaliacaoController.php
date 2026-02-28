<?php

namespace App\Http\Controllers;

use App\Models\Session;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::where('user1_id', Auth::id())
            ->orWhere('user2_id', Auth::id())
            ->get();

        return view('sessions.index', compact('sessions'));
    }

    public function conclude($id)
    {
        $session = Session::findOrFail($id);

        // Só participantes podem concluir
        if ($session->user1_id !== Auth::id() && $session->user2_id !== Auth::id()) {
            abort(403);
        }

        $session->update([
            'status' => 'concluida'
        ]);

        return back();
    }
}