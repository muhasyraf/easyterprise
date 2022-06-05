@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.transaksiKeuangan.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksi-keuangans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.id') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.kas_bank') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->kas_bank->jumlah ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.tanggal') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->tanggal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.desc') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->desc }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.nominal') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->nominal }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.jenis_pembayaran') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->jenis_pembayaran }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.produk') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->produk->nama_produk ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.qty') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->qty }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.harga_unit') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->harga_unit }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.transaksiKeuangan.fields.total') }}
                        </th>
                        <td>
                            {{ $transaksiKeuangan->total }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.transaksi-keuangans.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection