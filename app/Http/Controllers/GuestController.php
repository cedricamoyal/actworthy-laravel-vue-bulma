<?php

namespace App\Http\Controllers;
use App\Guest;
use Illuminate\Http\Request;
class GuestController extends Controller
{
    public function index()
    {
        return Guest::orderBy('id', 'desc')->get();
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'guestEmail' => 'required',
            'guestPassword' => 'required'
        ]);
        return Guest::create(['guestEmail' => request('guestEmail'), 'guestPassword' => request('guestPassword')]);
    }
    public function edit(Request $request)
    {
        $this->validate($request, [
            'guestEmail' => 'required',
            'guestPassword' => 'required'
        ]);
        $guest = Guest::findOrFail($request->id);
        $guest->guestEmail = $request->guestEmail;
        $guest->guestPassword = $request->guestPassword;
        $guest->save();
    }

    public function destroy($id)
    {
        $guest = Guest::findOrFail($id);
        $guest->delete();
    }
}

