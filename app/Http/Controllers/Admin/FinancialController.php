<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFinancialRequest;
use App\Http\Requests\StoreFinancialRequest;
use App\Http\Requests\UpdateFinancialRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FinancialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('financial_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financials.index');
    }

    public function create()
    {
        abort_if(Gate::denies('financial_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financials.create');
    }

    public function store(StoreFinancialRequest $request)
    {
        $financial = Financial::create($request->all());

        return redirect()->route('admin.financials.index');
    }

    public function edit(Financial $financial)
    {
        abort_if(Gate::denies('financial_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financials.edit', compact('financial'));
    }

    public function update(UpdateFinancialRequest $request, Financial $financial)
    {
        $financial->update($request->all());

        return redirect()->route('admin.financials.index');
    }

    public function show(Financial $financial)
    {
        abort_if(Gate::denies('financial_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.financials.show', compact('financial'));
    }

    public function destroy(Financial $financial)
    {
        abort_if(Gate::denies('financial_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $financial->delete();

        return back();
    }

    public function massDestroy(MassDestroyFinancialRequest $request)
    {
        Financial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
