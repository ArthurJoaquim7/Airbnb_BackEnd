<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservaStoreRequest;
use App\Http\Requests\ReservaUpdateRequest;
use App\Models\Reserva;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $reservas = Reserva::latest()->paginate(5);

        return view('reservas.index', compact('reservas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReservaStoreRequest $request): RedirectResponse
    {
        Reserva::create($request->validated());

        return redirect()->route('reservas.index')->with('success', 'Reserva criada!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Reserva $reserva): View
    {
        return view('reservas.show', compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reserva $reserva): View
    {
        return view('reservas.edit', compact('reserva'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ReservaUpdateRequest $request, Reserva $reserva): RedirectResponse
    {
        $reserva->update($request->validated());

        return redirect()->route('reservas.index')->with('success', 'Reserva atualizada!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reserva $reserva): RedirectResponse
    {
        $reserva->delete();

        return redirect()->route('reservas.index')->with('success', 'Reserva deletada!');
    }
}
