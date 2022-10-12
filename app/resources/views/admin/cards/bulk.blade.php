@extends('layouts.admin')
@section('title', 'カード作成(一括)')
@section('pageTitle', 'カード作成(一括)')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.cards.bulk') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <div class="form-group">
                                <label for="import-csv" class=" col-form-label text-md-end">CSV</label>
                                <input id="import-csv" type="file"
                                       class="form-control @error('import_csv') is-invalid @enderror" name="import_csv" accept="text/csv">

                                @error('import_csv')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 mx-5">
                            <button type="submit" class="btn btn-primary">
                                登録
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
