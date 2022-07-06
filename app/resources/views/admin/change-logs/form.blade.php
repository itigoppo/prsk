@php
    /**
     * @var \App\Models\ChangeLog $changeLog
     * @var \App\Enums\ChangeLogType $changeLogType
     */
@endphp

@section('head')
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="form-group">
        <label for="released-at" class="col-form-label text-md-end">更新日</label>
        <input id="released-at" type="text"
               class="form-control @error('released_at') is-invalid @enderror" name="released_at"
               value="{{ old('released_at', $changeLog->released_at ?? '') }}" required>

        @error('released_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="note" class="col-form-label text-md-end">更新内容</label>
        <textarea id="note"
                  class="form-control @error('note') is-invalid @enderror" name="note" rows="5"
                  required>{{ old('note', $changeLog->note ?? '') }}</textarea>

        @error('note')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<input type="hidden" name="type" value="{{ $changeLogType->value }}">
