@php
    /**
     * @var \App\Models\Card $card
     * @var array $rarities
     * @var array $attributes
     * @var \App\Models\Member[] $members
     * @var array $skillEffects
     */
@endphp

@section('head')
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="form-group">
        <label for="released-at" class="col-form-label text-md-end">解放日</label>
        <input id="released-at" type="text"
               class="form-control @error('released_at') is-invalid @enderror" name="released_at"
               value="{{ old('released_at', $card->released_at ?? '') }}" required>

        @error('released_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="rarity" class="col-form-label text-md-end">レアリティ</label>
        <select id="rarity" class="form-select @error('rarity') is-invalid @enderror"
                name="rarity">
            <option value="">選択してください</option>
            @foreach($rarities as $key => $value)
                <option
                    value="{{ $key }}"{{ old('rarity', $card->rarity ?? '') == $key ? ' selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('rarity')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="attribute" class="col-form-label text-md-end">属性</label>
        <select id="attribute" class="form-select @error('attribute') is-invalid @enderror"
                name="attribute">
            <option value="">選択してください</option>
            @foreach($attributes as $key => $value)
                <option
                    value="{{ $key }}"{{ old('attribute', $card->attribute ?? '') == $key ? ' selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('attribute')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class="col-form-label text-md-end">カード名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $card->name ?? '') }}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="member-id" class=" col-form-label text-md-end">メンバー</label>

        <select id="member-id" class="form-select @error('member_id') is-invalid @enderror"
                name="member_id">
            <option value="">選択してください</option>
            @foreach($members as $member)
                <option
                    value="{{ $member->id }}"{{ old('member_id', $card->member_id ?? '') == $member->id ? ' selected' : '' }}>
                    {{ $member->display_short }}
                </option>
            @endforeach
        </select>

        @error('member_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="skill-effect" class="col-form-label text-md-end">スキルタイプ</label>
        <select id="skill-effect" class="form-select @error('skill_effect') is-invalid @enderror"
                name="skill_effect">
            <option value="">選択してください</option>
            @foreach($skillEffects as $key => $value)
                <option
                    value="{{ $key }}"{{ old('skill_effect', $card->skill_effect ?? '') == $key ? ' selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('skill_effect')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="skill-name" class="col-form-label text-md-end">スキル名</label>
        <input id="skill-name" type="text"
               class="form-control @error('skill_name') is-invalid @enderror" name="skill_name"
               value="{{ old('skill_name', $card->skill_name ?? '') }}">

        @error('skill_name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="costume" class="col-form-label text-md-end">衣装名</label>
        <input id="costume" type="text"
               class="form-control @error('costume') is-invalid @enderror" name="costume"
               value="{{ old('costume', $card->costume ?? '') }}">

        @error('costume')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">

        <div class="checkbox icheck-primary icheck-inline">
            <input id="has-hair-style" class="form-check-input @error('has_hair_style') is-invalid @enderror"
                   type="checkbox"
                   name="has_hair_style"
                   value="1"{{ old('has_hair_style', $card->has_hair_style ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="has-hair-style">ヘアスタイルあり</label>
        </div>

        <div class="checkbox icheck-primary icheck-inline">
            <input id="has-another-cut" class="form-check-input @error('has_another_cut') is-invalid @enderror"
                   type="checkbox"
                   name="has_another_cut"
                   value="1"{{ old('has_another_cut', $card->has_another_cut ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="has-another-cut">アナザーカットあり</label>
        </div>

        <div class="checkbox icheck-primary icheck-inline">
            <input id="is-limited" class="form-check-input @error('is_limited') is-invalid @enderror"
                   type="checkbox"
                   name="is_limited"
                   value="1"{{ old('is_limited', $card->is_limited ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="is-limited">限定</label>
        </div>

        <div class="checkbox icheck-primary icheck-inline">
            <input id="is-fes" class="form-check-input @error('is_fes') is-invalid @enderror"
                   type="checkbox"
                   name="is_fes"
                   value="1"{{ old('is_fes', $card->is_fes ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="is-fes">フェス限</label>
        </div>

        @error('has_hair_style')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('is_limited')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('is_fes')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <label for="performance" class="col-form-label text-md-end">パフォーマンス</label>
            <input id="performance" type="text"
                   class="form-control @error('performance') is-invalid @enderror" name="performance"
                   value="{{ old('performance', $card->performance ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('performance')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>


@if ( Request::routeIs('admin.cards.update') )
    <div class="row mb-3">
        <div class="form-group">
            <label for="change-file-normal" class=" col-form-label text-md-end">特訓前画像</label>
            @if(!empty($card->normal_file))
                <div class="row mb-2">
                    <div class="col">
                        <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'normal']) }}" width="50">
                    </div>
                    <div class="col">
                        <div class="icheck-primary">
                            <input id="is-normal-file-delete"
                                   class="form-check-input @error('is_normal_file_delete') is-invalid @enderror"
                                   type="checkbox" name="is_normal_file_delete"
                                   value="1"{{ old('is_normal_file_delete') ? ' checked' : '' }} />
                            <label for="is-normal-file-delete">削除する</label>
                        </div>
                    </div>
                </div>
            @endif

            <input id="change-file-normal" type="file"
                   class="form-control @error('change_normal_file') is-invalid @enderror" name="change_normal_file">

            @error('change_normal_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group">
            <label for="change-file-after-training" class=" col-form-label text-md-end">特訓前画像</label>
            @if(!empty($card->after_training_file))
                <div class="row mb-2">
                    <div class="col">
                        <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'after_training']) }}" width="50">
                    </div>
                    <div class="col">
                        <div class="icheck-primary">
                            <input id="is-after-training-file-delete"
                                   class="form-check-input @error('is_after_training_file_delete') is-invalid @enderror"
                                   type="checkbox" name="is_after_training_file_delete"
                                   value="1"{{ old('is_after_training_file_delete') ? ' checked' : '' }} />
                            <label for="is-after-training-file-delete">削除する</label>
                        </div>
                    </div>
                </div>
            @endif

            <input id="change-after-training-file" type="file"
                   class="form-control @error('change_after_training_file') is-invalid @enderror" name="change_after_training_file">

            @error('change_after_training_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@else
    <div class="row mb-3">
        <div class="form-group">
            <label for="normal-file" class=" col-form-label text-md-end">特訓前画像</label>
            <input id="normal-file" type="file"
                   class="form-control @error('normal_file') is-invalid @enderror" name="normal_file">

            @error('normal_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="form-group">
            <label for="after-training-file" class=" col-form-label text-md-end">特訓後画像</label>
            <input id="after-training-file" type="file"
                   class="form-control @error('after_training_file') is-invalid @enderror" name="after_training_file">

            @error('after_training_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@endif
