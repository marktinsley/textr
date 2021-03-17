<?php

namespace App\Http\Controllers;

use App\Models\TextMessage;
use App\Rules\PhoneNumber;
use Illuminate\Http\Request;

class TextingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'to' => ['required', new PhoneNumber()],
            'body' => ['required'],
        ]);

        TextMessage::createAndSend($request->input('to'), $request->input('body'));

        return redirect()->to('dashboard')
            ->with('success', 'Text message sent!');
    }
}
