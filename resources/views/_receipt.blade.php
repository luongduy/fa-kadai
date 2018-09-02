<table class="table table-bordered">
    <thead>
        <tr>
            <th></th>
            <th>@lang('Value')</th>
            <th>@lang('Confidence')</th>
            <th>@lang('Position')</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>@lang('Amount')</th>
            <td>{{ $receipt->getAmount() }}</td>
            <td>{{ $receipt->getAmountConfidence() }}</td>
            <td>{{ !empty($receipt->getAmountPosition()) ? json_encode($receipt->getAmountPosition()) : null }}</td>
        </tr>
        <tr>
            <th>@lang('Note')</th>
            <td>{{ $receipt->getNote() }}</td>
            <td>{{ $receipt->getNoteConfidence() }}</td>
            <td>{{ !empty($receipt->getNotePosition()) ? json_encode($receipt->getNotePosition()) : null }}</td>
        </tr>
        <tr>
            <th>@lang('Date')</th>
            <td>{{ $receipt->getDate() }}</td>
            <td>{{ $receipt->getDateConfidence() }}</td>
            <td>{{ !empty($receipt->getDatePosition()) ? json_encode($receipt->getDatePosition()) : null }}</td>
        </tr>
        <tr>
            <th>@lang('Tel')</th>
            <td>{{ $receipt->getTel() }}</td>
            <td>{{ $receipt->getTelConfidence() }}</td>
            <td>{{ !empty($receipt->getTelPosition()) ? json_encode($receipt->getTelPosition()) : null }}</td>
        </tr>
    </tbody>
</table>