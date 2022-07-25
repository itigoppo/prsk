@php
    /**
     * @var \App\Models\Unit $unit
     */
@endphp

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class="col-form-label text-md-end">ユニット名</label>
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
        <label for="short" class="col-form-label text-md-end">短縮名</label>
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
        <label for="bg_color" class="col-form-label text-md-end">ユニットカラーコード</label>
        <input id="bg_color" type="color"
               class="form-control form-control-color @error('bg_color') is-invalid @enderror" name="bg_color"
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
        <label for="color" class="col-form-label text-md-end">テキストカラーコード</label>
        <input id="color" type="color"
               class="form-control form-control-color @error('color') is-invalid @enderror" name="color"
               value="{{ old('color', $unit->color ?? '') }}" required>

        @error('color')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">

        <div class="form-check form-switch">
            <label class="form-check-label" for="is_active">有効か</label>
            <input id="is_active" class="form-check-input @error('is_active') is-invalid @enderror" type="checkbox"
                   name="is_active" value="1"{{ old('is_active', $unit->is_active ?? '') ? ' checked' : '' }}>
        </div>

        @error('is_active')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
