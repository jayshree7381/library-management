<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Membership;


class MembershipController extends Controller
{
    public function index()
    {
        $memberships = Membership::all();
        return view('membership.index', compact('memberships'));


    }

    public function create(){
        return view('membership.create');
    }
    public function store(Request $request)
    {
        Membership::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);
        return redirect()->route('membership.index')->with('success', 'Membership created sucessfully');
    }


    public function edit(Membership $membership)
    {
        return view('membership.edit', compact('membership'));
    }

    public function update(Request $request, Membership $membership)
    {
        $membership->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),

        ]);
        return redirect()->route('membership.index')->with('success', 'Members updated successfully');
    }

    public function destroy(Membership $membership)
    {
        $membership->delete();
        return redirect()->route('membership.index')->with('success', 'Member deleted successfully');
    }
}
