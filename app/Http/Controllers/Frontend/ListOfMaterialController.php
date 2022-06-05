<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListOfMaterialRequest;
use App\Http\Requests\StoreListOfMaterialRequest;
use App\Http\Requests\UpdateListOfMaterialRequest;
use App\Models\ListOfMaterial;
use App\Models\ProductionPlan;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListOfMaterialController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('list_of_material_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterials = ListOfMaterial::with(['production_plan'])->get();

        return view('frontend.listOfMaterials.index', compact('listOfMaterials'));
    }

    public function create()
    {
        abort_if(Gate::denies('list_of_material_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.listOfMaterials.create', compact('production_plans'));
    }

    public function store(StoreListOfMaterialRequest $request)
    {
        $listOfMaterial = ListOfMaterial::create($request->all());

        return redirect()->route('frontend.list-of-materials.index');
    }

    public function edit(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $production_plans = ProductionPlan::pluck('tugas', 'id')->prepend(trans('global.pleaseSelect'), '');

        $listOfMaterial->load('production_plan');

        return view('frontend.listOfMaterials.edit', compact('listOfMaterial', 'production_plans'));
    }

    public function update(UpdateListOfMaterialRequest $request, ListOfMaterial $listOfMaterial)
    {
        $listOfMaterial->update($request->all());

        return redirect()->route('frontend.list-of-materials.index');
    }

    public function show(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->load('production_plan');

        return view('frontend.listOfMaterials.show', compact('listOfMaterial'));
    }

    public function destroy(ListOfMaterial $listOfMaterial)
    {
        abort_if(Gate::denies('list_of_material_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listOfMaterial->delete();

        return back();
    }

    public function massDestroy(MassDestroyListOfMaterialRequest $request)
    {
        ListOfMaterial::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
