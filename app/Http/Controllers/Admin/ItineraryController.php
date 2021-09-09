<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyItineraryRequest;
use App\Http\Requests\StoreItineraryRequest;
use App\Http\Requests\UpdateItineraryRequest;
use App\Models\Itinerary;
use App\Models\User;
use App\Models\Vehicle;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ItineraryController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('itinerary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itineraries = Itinerary::with(['user', 'vehicle'])->get();

        return view('admin.itineraries.index', compact('itineraries'));
    }

    public function create()
    {
        abort_if(Gate::denies('itinerary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicles = Vehicle::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.itineraries.create', compact('users', 'vehicles'));
    }

    public function store(StoreItineraryRequest $request)
    {
        $itinerary = Itinerary::create($request->all());

        return redirect()->route('admin.itineraries.index');
    }

    public function edit(Itinerary $itinerary)
    {
        abort_if(Gate::denies('itinerary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $users = User::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $vehicles = Vehicle::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $itinerary->load('user', 'vehicle');

        return view('admin.itineraries.edit', compact('users', 'vehicles', 'itinerary'));
    }

    public function update(UpdateItineraryRequest $request, Itinerary $itinerary)
    {
        $itinerary->update($request->all());

        return redirect()->route('admin.itineraries.index');
    }

    public function show(Itinerary $itinerary)
    {
        abort_if(Gate::denies('itinerary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itinerary->load('user', 'vehicle');

        return view('admin.itineraries.show', compact('itinerary'));
    }

    public function destroy(Itinerary $itinerary)
    {
        abort_if(Gate::denies('itinerary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $itinerary->delete();

        return back();
    }

    public function massDestroy(MassDestroyItineraryRequest $request)
    {
        Itinerary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
