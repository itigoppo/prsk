@php
    /**
     * @var \App\Models\Interaction $interaction
     * @var \App\Models\Member[] $members
     */
@endphp

@section('head')
    <script src="{{ asset('js/interactions.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="form-group">
        <label for="from_member_id" class=" col-form-label text-md-end">応メンバー</label>

        <select id="from_member_id" class="form-select @error('from_member_id') is-invalid @enderror"
                name="from_member_id">
            <option value="">選択してください</option>
            @foreach($members as $member)
                <option
                    value="{{ $member->id }}"{{ old('from_member_id', $interaction->from_member_id ?? '') == $member->id ? ' selected' : '' }}>
                    {{ $member->display_short }}
                </option>
            @endforeach
        </select>

        @error('from_member_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="from_line" class=" col-form-label text-md-end">応セリフ</label>
        <input id="from_line" type="text"
               class="form-control @error('from_line') is-invalid @enderror" name="from_line"
               value="{{ old('from_line', $interaction->from_line ?? '') }}">

        @error('from_line')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="to_member_id" class=" col-form-label text-md-end">答メンバー</label>

        <select id="to_member_id" class="form-select @error('to_member_id') is-invalid @enderror" name="to_member_id">
            <option value="">選択してください</option>
            @foreach($members as $member)
                <option
                    value="{{ $member->id }}"{{ old('to_member_id', $interaction->to_member_id ?? '') == $member->id ? ' selected' : '' }}>
                    {{ $member->display_short }}
                </option>
            @endforeach
        </select>

        @error('to_member_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="to_line" class=" col-form-label text-md-end">答セリフ</label>
        <input id="to_line" type="text"
               class="form-control @error('to_line') is-invalid @enderror" name="to_line"
               value="{{ old('to_line', $interaction->to_line ?? '') }}">

        @error('to_line')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

@if ( Request::routeIs('admin.interactions.update') )
    <div class="row mb-3">
        <div class="form-group">
            <label for="change_file" class=" col-form-label text-md-end">ファイル</label>
            @if(!empty($interaction->file))
                <div class="row">
                    <div class="col">
                        <audio controls="" controlslist="nodownload" id="audio-file">
                            <source
                                src="{{ route('admin.interactions.display', ['interaction_id' => $interaction->id]) }}"
                                type="audio/mpeg">
                        </audio>
                    </div>
                    <div class="col">
                        <div class="icheck-primary">
                            <input id="is_file_delete"
                                   class="form-check-input @error('is_file_delete') is-invalid @enderror"
                                   type="checkbox" name="is_file_delete"
                                   value="1"{{ old('is_file_delete') ? ' checked' : '' }} />
                            <label for="is_file_delete">削除する</label>
                        </div>
                    </div>
                </div>
            @endif

            <input id="change_file" type="file"
                   class="form-control @error('change_file') is-invalid @enderror" name="change_file">

            @error('change_file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@else
    <div class="row mb-3">
        <div class="form-group">
            <label for="file" class=" col-form-label text-md-end">ファイル</label>
            <input id="file" type="file"
                   class="form-control @error('file') is-invalid @enderror" name="file">

            @error('file')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
@endif

<div class="row mb-3">
    <div class="form-group">
        <label for="note" class=" col-form-label text-md-end">備考</label>
        <input id="note" type="text"
               class="form-control @error('note') is-invalid @enderror" name="note"
               value="{{ old('note', $interaction->note ?? '') }}">

        @error('note')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

