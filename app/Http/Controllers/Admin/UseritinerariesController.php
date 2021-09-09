<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyUseritineraryRequest;
use App\Http\Requests\StoreUseritineraryRequest;
use App\Http\Requests\UpdateUseritineraryRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UseritinerariesController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('useritinerary_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useritineraries.index');
    }

    public function create()
    {
        abort_if(Gate::denies('useritinerary_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useritineraries.create');
    }

    public function store(StoreUseritineraryRequest $request)
    {
        $useritinerary = Useritinerary::create($request->all());

        return redirect()->route('admin.useritineraries.index');
    }

    public function edit(Useritinerary $useritinerary)
    {
        abort_if(Gate::denies('useritinerary_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useritineraries.edit', compact('useritinerary'));
    }

    public function update(UpdateUseritineraryRequest $request, Useritinerary $useritinerary)
    {
        $useritinerary->update($request->all());

        return redirect()->route('admin.useritineraries.index');
    }

    public function show(Useritinerary $useritinerary)
    {
        abort_if(Gate::denies('useritinerary_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.useritineraries.show', compact('useritinerary'));
    }

    public function destroy(Useritinerary $useritinerary)
    {
        abort_if(Gate::denies('useritinerary_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $useritinerary->delete();

        return back();
    }

    public function massDestroy(MassDestroyUseritineraryRequest $request)
    {
        Useritinerary::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
