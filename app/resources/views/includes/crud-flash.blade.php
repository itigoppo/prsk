@if (session('success'))
    <div class="alert alert-success crud-flash" role="alert">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger crud-flash" role="alert">
        {{ session('error') }}
    </div>
@endif
