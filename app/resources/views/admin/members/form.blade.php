@php
    /**
     * @var \App\Models\Member $member
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Icon[] $icons
     */
@endphp

<div class="row mb-3">
    <div class="form-group">
        <label for="unit_id" class="col-form-label text-md-end">ユニット</label>
        <select id="unit_id" class="form-select @error('unit_id') is-invalid @enderror"
                name="unit_id"{{ empty($member->unit_id ) ? '' : ' disabled' }}>
            <option value="">選択してください</option>
            @foreach($units as $unit)
                <option
                    value="{{ $unit->id }}"{{ old('unit_id', $member->unit_id ?? '') == $unit->id ? ' selected' : '' }}>
                    {{ $unit->name }}
                </option>
            @endforeach
        </select>
        @if(!empty($member->unit_id ))
            <input type="hidden" name="unit_id" value="{{ $member->unit_id  }}">
        @endif

        @error('unit_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="icon_id" class="col-form-label text-md-end">アイコン</label>
        <select id="icon_id" class="form-select @error('icon_id') is-invalid @enderror" name="icon_id">
            <option value="">選択してください</option>
            @foreach($icons as $icon)
                <option
                    value="{{ $icon->id }}"{{ old('icon_id', $member->icon_id ?? '') == $icon->id ? ' selected' : '' }}>
                    {{ $icon->label }}
                </option>
            @endforeach
        </select>

        @error('icon_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="code" class="col-form-label text-md-end">メンバーコード</label>
        <input id="code" type="text"
               class="form-control @error('code') is-invalid @enderror" name="code"
               value="{{ old('code', $member->code ?? '') }}" required>
        @error('code')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class="col-form-label text-md-end">メンバー名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $member->name ?? '') }}" required>
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
               value="{{ old('short', $member->short ?? '') }}" required>

        @error('short')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="bg_color" class="col-form-label text-md-end">メンバーカラーコード</label>
        <input id="bg_color" type="color"
               class="form-control form-control-color @error('bg_color') is-invalid @enderror" name="bg_color"
               value="{{ old('bg_color', $member->bg_color ?? '') }}" required>

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
               value="{{ old('color', $member->color ?? '') }}" required>

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
                   name="is_active" value="1"{{ old('is_active', $member->is_active ?? '') ? ' checked' : '' }}>
        </div>

        @error('is_active')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
