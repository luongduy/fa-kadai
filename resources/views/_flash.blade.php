@if (Session::has('error'))
    <div class="bs-callout bs-callout-danger">
        <h4>Error</h4>
        <p>{!! session('error') !!}</p>
    </div>
@endif

@if (Session::has('success'))
    <div class="bs-callout bs-callout-success">
        <h5>Success</h5>
        <p>{!! session('success') !!}</p>
    </div>
@endif

@if (Session::has('warning'))
    <div class="bs-callout bs-callout-warning">
        <h5>Warning</h5>
        <p>{!! session('warning') !!}</p>
    </div>
@endif
