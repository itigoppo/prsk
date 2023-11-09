@php
    /**
     * @var \App\Models\Tune $tune
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     * @var array $tuneTypes
     * @var array $vocalTypes
     */
@endphp

@section('head')
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
    <script src="{{ asset('js/tunes.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="form-group">
        <label for="released-at" class="col-form-label text-md-end">配信日</label>
        <input id="released-at" type="text"
               class="form-control @error('released_at') is-invalid @enderror" name="released_at"
               value="{{ old('released_at', $tune->released_at ?? '') }}" required>

        @error('released_at')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class="col-form-label text-md-end">楽曲名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $tune->name ?? '') }}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="type" class="col-form-label text-md-end">種別</label>
        <select id="type" class="form-select @error('type') is-invalid @enderror"
                name="type">
            <option value="">選択してください</option>
            @foreach($tuneTypes as $key => $value)
                <option
                        value="{{ $key }}"{{ old('type', $tune->type ?? '') == $key ? ' selected' : '' }}>
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('type')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="unit-id" class="col-form-label text-md-end">ユニット</label>
        <select id="unit-id" class="form-select @error('unit_id') is-invalid @enderror"
                name="unit_id">
            <option value="">選択してください</option>
            @foreach($units as $unit)
                <option
                        value="{{ $unit->id }}"{{ old('unit_id', $tune->unit_id ?? '') == $unit->id ? ' selected' : '' }}>
                    {{ $unit->name }}
                </option>
            @endforeach
        </select>

        @error('unit_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <div class="checkbox icheck-primary icheck-inline">
            <input id="has-3d-mv" class="form-check-input @error('has_3d_mv') is-invalid @enderror" type="checkbox"
                   name="has_3d_mv" value="1"{{ old('has_3d_mv', $tune->has_3d_mv ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="has-3d-mv">3D MV</label>
        </div>
        <div class="checkbox icheck-primary icheck-inline">
            <input id="has-2d-mv" class="form-check-input @error('has_2d_mv') is-invalid @enderror" type="checkbox"
                   name="has_2d_mv" value="1"{{ old('has_2d_mv', $tune->has_2d_mv ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="has-2d-mv">2D MV</label>
        </div>
        <div class="checkbox icheck-primary icheck-inline">
            <input id="has-original-mv" class="form-check-input @error('has_original_mv') is-invalid @enderror"
                   type="checkbox"
                   name="has_original_mv"
                   value="1"{{ old('has_original_mv', $tune->has_original_mv ?? '') ? ' checked' : '' }}>
            <label class="form-check-label" for="has-original-mv">原曲MV</label>
        </div>

        @error('has_3d_mv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('has_2d_mv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
        @error('has_original_mv')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        @php
            $memberIds = [];
            if (!empty($tune->dancers)) {
                foreach ($tune->dancers as $dancer) {
                    $memberIds[] = $dancer->member_id;
                }
            }
        @endphp
        <label for="dancers-member-ids" class="col-form-label text-md-end">MV参加メンバー</label>
        <select id="dancers-member-ids"
                class="form-select @error('dancers') is-invalid @enderror"
                name="dancers[]"
                multiple="multiple">
            @foreach($units as $unit)
                <optgroup label="{{ $unit->name }}">
                    @foreach($unit->members as $member)
                        <option
                                value="{{ $member->id }}"
                                {{ (in_array($member->id, old('dancers', $memberIds))) ? ' selected' : '' }}
                                data-color="{{ $member->color }}"
                                data-bg-color="{{ $member->bg_color }}"
                                data-name="{{ $member->display_short }}"
                        >{{ $member->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        @error('dancers')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <label for="easy-level" class="col-form-label text-md-end">EASY Lv</label>
            <input id="easy-level" type="text"
                   class="form-control @error('easy_level') is-invalid @enderror" name="easy_level"
                   value="{{ old('easy_level', $tune->easy_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('easy_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="normal-level" class="col-form-label text-md-end">NORMAL Lv</label>
            <input id="normal-level" type="text"
                   class="form-control @error('normal_level') is-invalid @enderror" name="normal_level"
                   value="{{ old('normal_level', $tune->normal_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('normal_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="hard-level" class="col-form-label text-md-end">HARD Lv</label>
            <input id="hard-level" type="text"
                   class="form-control @error('hard_level') is-invalid @enderror" name="hard_level"
                   value="{{ old('hard_level', $tune->hard_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('hard_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="expert-level" class="col-form-label text-md-end">EXPERT Lv</label>
            <input id="expert-level" type="text"
                   class="form-control @error('expert_level') is-invalid @enderror" name="expert_level"
                   value="{{ old('expert_level', $tune->expert_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('expert_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="master-level" class="col-form-label text-md-end">MASTER Lv</label>
            <input id="master-level" type="text"
                   class="form-control @error('master_level') is-invalid @enderror" name="master_level"
                   value="{{ old('master_level', $tune->master_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('master_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="append-level" class="col-form-label text-md-end">APPEND Lv</label>
            <input id="append-level" type="text"
                   class="form-control @error('append_level') is-invalid @enderror" name="append_level"
                   value="{{ old('append_level', $tune->append_level ?? '') }}" inputmode="numeric" pattern="\d*">

            @error('append_level')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

@php
    $vocalIndex = old('vocal_index', empty($tune->singers_by_type) ? 0 : count($tune->singers_by_type));
@endphp

@for ($i = 0; $i <= $vocalIndex; $i++)
    @php
        $singers = empty($tune->singers_by_type) ? [] : array_slice($tune->singers_by_type, $i, 1, true);
        $type = \Illuminate\Support\Str::before(key($singers), '-');
        $vocalKey = \Illuminate\Support\Str::after(key($singers), '-');
        $memberIds = [];
        if (!empty($singers)) {
            foreach (current($singers) as $singer) {
                $memberIds[] = $singer->member_id;
            }
        }
        $inputName = 'singers.' . $i;
    @endphp
    <div class="row mb-3 singer">
        <div class="col">
            <div class="form-group">
                <label for="singers-type-{{ $i }}" class="col-form-label text-md-end">ボーカル種別</label>
                <select id="singers-type-{{ $i }}"
                        class="form-select @error($inputName) is-invalid @enderror"
                        name="singers[{{ $i }}][type]">
                    <option value="">選択してください</option>
                    @foreach($vocalTypes as $key => $value)
                        <option
                                value="{{ $key }}"{{ old($inputName . '.type', $type ?? '') == $key ? ' selected' : '' }}>
                            {{ $value }}
                        </option>
                    @endforeach
                </select>

                @error($inputName)
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="singers-vocal-keys-{{ $i }}" class="col-form-label text-md-end">キー</label>
                <input id="singers-vocal-keys-{{ $i }}" type="text"
                       class="form-control  @error($inputName) is-invalid @enderror"
                       name="singers[{{ $i }}][key]"
                       value="{{ old($inputName . '.key', $vocalKey ?? '') }}" inputmode="numeric" pattern="\d*">
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <label for="singers-member-ids-{{ $i }}" class="col-form-label text-md-end">ボーカルメンバー</label>
                <select id="singers-member-ids-{{ $i }}"
                        class="form-select singers-member @error($inputName) is-invalid @enderror"
                        name="singers[{{ $i }}][members][]"
                        multiple="multiple">
                    @foreach($units as $unit)
                        <optgroup label="{{ $unit->name }}">
                            @foreach($unit->members as $member)
                                <option
                                        value="{{ $member->id }}"
                                        {{ (in_array($member->id, old($inputName . '.members', $memberIds))) ? ' selected' : '' }}
                                        data-color="{{ $member->color }}"
                                        data-bg-color="{{ $member->bg_color }}"
                                        data-name="{{ $member->display_short }}"
                                >{{ $member->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>
        </div>

    </div>
@endfor

<div class="row mb-3" id="add-vocal">
    <div class="form-group">
        <input type="hidden" name="vocal_index" value="{{ old('vocal_index', $vocalIndex ?? 0) }}">
        <button type="button" class="btn btn-info">ボーカルを追加する</button>
    </div>
</div>
