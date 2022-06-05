<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySalesOrderRequest;
use App\Http\Requests\StoreSalesOrderRequest;
use App\Http\Requests\UpdateSalesOrderRequest;
use App\Models\CrmCustomer;
use App\Models\SalesOrder;
use App\Models\SalesQuotation;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SalesOrderController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('sales_order_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesOrders = SalesOrder::with(['customer', 'sales_quotation'])->get();

        return view('admin.salesOrders.index', compact('salesOrders'));
    }

    public function create()
    {
        abort_if(Gate::denies('sales_order_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_quotations = SalesQuotation::pluck('harga', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.salesOrders.create', compact('customers', 'sales_quotations'));
    }

    public function store(StoreSalesOrderRequest $request)
    {
        $salesOrder = SalesOrder::create($request->all());

        return redirect()->route('admin.sales-orders.index');
    }

    public function edit(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $customers = CrmCustomer::pluck('first_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $sales_quotations = SalesQuotation::pluck('harga', 'id')->prepend(trans('global.pleaseSelect'), '');

        $salesOrder->load('customer', 'sales_quotation');

        return view('admin.salesOrders.edit', compact('customers', 'salesOrder', 'sales_quotations'));
    }

    public function update(UpdateSalesOrderRequest $request, SalesOrder $salesOrder)
    {
        $salesOrder->update($request->all());

        return redirect()->route('admin.sales-orders.index');
    }

    public function show(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesOrder->load('customer', 'sales_quotation');

        return view('admin.salesOrders.show', compact('salesOrder'));
    }

    public function destroy(SalesOrder $salesOrder)
    {
        abort_if(Gate::denies('sales_order_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $salesOrder->delete();

        return back();
    }

    public function massDestroy(MassDestroySalesOrderRequest $request)
    {
        SalesOrder::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
