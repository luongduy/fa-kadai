@if (!empty($receipts))
<div class="panel panel-default">
    <div class="panel-heading">@lang('List of receipts')</div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>@lang('Image')</th>
                    <th>@lang('Receipt Info')</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($receipts as $receipt)
                    <tr>
                        <td>
                            <img src="@if (!empty($images[$loop->index])) {{ $images[$loop->index] }} @endif" height="300">
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
@endif