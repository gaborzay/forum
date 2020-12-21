<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use Illuminate\Http\RedirectResponse;

class ReplyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Thread  $thread
     * @return RedirectResponse
     */
    public function store(Thread $thread): RedirectResponse
    {
        $thread->addReply([
            'body' => request('body'),
            'user_id' => auth()->id()
        ]);

        return back();
    }
}
