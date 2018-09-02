@extends('layouts.app')

@section('content')

<div class="container">
    @include('_flash')
    
    <div class="panel panel-default">
        <div class="panel-heading">@lang('Upload pdf receipt to start scanning')</div>
        <div class="panel-body">
            <div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
                    
            <form method="post" action="{{ route('receipt.scan-post') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">@lang('Upload pdf file'):</label>
                    <input type="file" name="file" accept="application/pdf" required>
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>

    @include('_receipt_list')
</div>
@endsection