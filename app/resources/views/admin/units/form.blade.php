@php
    /**
     * @var \App\Models\Unit $unit
     */
@endphp

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class=" col-form-label text-md-end">ユニット名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $unit->name ?? '') }}" required>

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="short" class=" col-form-label text-md-end">短縮名</label>
        <input id="short" type="text"
               class="form-control @error('short') is-invalid @enderror" name="short"
               value="{{ old('short', $unit->short ?? '') }}" required>

        @error('short')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="bg_color" class=" col-form-label text-md-end">ユニットカラーコード</label>
        <input id="bg_color" type="text"
               class="form-control @error('bg_color') is-invalid @enderror" name="bg_color"
               value="{{ old('bg_color', $unit->bg_color ?? '') }}" required>

        @error('bg_color')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="color" class=" col-form-label text-md-end">テキストカラーコード</label>
        <input id="color" type="text"
               class="form-control @error('color') is-invalid @enderror" name="color"
               value="{{ old('color', $unit->color ?? '') }}" required>

        @error('color')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
