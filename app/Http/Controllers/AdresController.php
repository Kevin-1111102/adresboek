<?php

namespace App\Http\Controllers;

use App\Models\Adres;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdresController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $adressen = Auth::user()->adressen()->get();
        return view('adressen.index', compact('adressen'));
    }

    public function create()
    {
        return view('adressen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255|unique:adressen,naam,NULL,id,user_id,' . Auth::id(),
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => ['required', 'string', 'regex:/^\d{4}\s?[A-Za-z]{2}$/'],
            'stad' => 'required|string|max:255',
        ]);

        Auth::user()->adressen()->create($request->only('naam', 'straat', 'huisnummer', 'postcode', 'stad'));

        return redirect()->route('adressen.index')->with('success', 'Adres toegevoegd!');
    }


    public function edit($id)
    {
        $adres = Adres::findOrFail($id);
        return view('adressen.edit', compact('adres'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'straat' => 'required|string|max:255',
            'huisnummer' => 'required|string|max:10',
            'postcode' => 'required|string|max:10',
            'stad' => 'required|string|max:255',
        ]);

        $adres = Adres::findOrFail($id);
        $adres->update($request->all());

        return redirect()->route('adressen.index')->with('success', 'Adres bijgewerkt!');
    }

    public function destroy($id)
    {
        $adres = Adres::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $adres->delete();
        return response()->json(['success' => true]);
    }

}
