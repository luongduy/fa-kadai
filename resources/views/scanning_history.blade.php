@extends('layouts.app')

@section('content')

<div class="container">
@if (!empty($receipts))    
    <h3>@lang('There is :number of record(s).', ['number' => count($receipts)])</h3>

    <div class="panel panel-default">
        <div class="panel-heading">@lang('List of receipts')</div>
        <div class="panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('Created At')</th>
                        <th>@lang('Image')</th>
                        <th>@lang('Receipt Info')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($receipts as $receipt)
                        <tr>
                            <td> {{ $loop->index + 1 }}</td>
                            <td> {{ $records[$loop->index]->created_at }}</td>
                            <td>
                                <img src="{{ $images[$loop->index] }}" height="300">
                            </td>
                            <td>
                                @include('_receipt', [
                                    'receipt' => $receipt
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@else
    <h3>@lang('There is no record to show.')</h3>
@endif
</div>

@endsection