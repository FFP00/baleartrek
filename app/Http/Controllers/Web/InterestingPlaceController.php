<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\InterestingPlace;
use App\Models\PlaceType;
use App\Http\Requests\Web\InterestingPlaceRequest;
use Illuminate\Http\Request;

class InterestingPlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $interestingPlaces = InterestingPlace::latest()->paginate(20);

        return view('CRUD.interesting_place_index', compact('interestingPlaces'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $placeTypes = PlaceType::all();
        return view('CRUD.interesting_place_create', compact('placeTypes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'gps' => 'required|unique:interesting_places,gps',
            'place_type_id' => 'required|exists:place_types,id',
        ]);

        InterestingPlace::create($validated);

        return redirect()->route('interesting_places.index')->with('success', 'Lloc creat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(InterestingPlace $interestingPlace)
    {
        return view('CRUD.interesting_place_show', compact('interestingPlace'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(InterestingPlace $interestingPlace)
    {
        $placeTypes = PlaceType::all();
        return view('CRUD.interesting_place_edit', compact('interestingPlace', 'placeTypes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, InterestingPlace $interestingPlace)
    {
        $validated = $request->validate([
            'name' => 'required|max:100',
            'gps' => 'required|unique:interesting_places,gps,' . $interestingPlace->id,
            'place_type_id' => 'required|exists:place_types,id',
        ]);

        $interestingPlace->update($validated);

        return redirect()->route('interesting_places.index')->with('success', 'Lloc actualitzat!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(InterestingPlace $interestingPlace)
    {
        $interestingPlace->deleteOrFail();
        return back()->with('status', 'Lloc eliminat correctament');
    }
}