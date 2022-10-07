@php
    /**
     * @var \App\Models\VirtualLive $virtualLive
     * @var \App\Models\Tune[] $tunes
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     * @var \App\Models\Event[] $events
     */
@endphp

@section('head')
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
    <script src="{{ asset('js/virtual-lives.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <label for="starts-at" class="col-form-label text-md-end">バーチャルライブ開始日</label>
            <input id="starts-at" type="text"
                   class="form-control @error('starts_at') is-invalid @enderror" name="starts_at"
                   value="{{ old('starts_at', $virtualLive->starts_at ?? '') }}">

            @error('starts_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="ends-at" class="col-form-label text-md-end">バーチャルライブ終了日</label>
            <input id="ends-at" type="text"
                   class="form-control @error('ends_at') is-invalid @enderror" name="ends_at"
                   value="{{ old('ends_at', $virtualLive->ends_at ?? '') }}">

            @error('ends_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="name" class="col-form-label text-md-end">バーチャルライブ名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $virtualLive->name ?? '') }}">

        @error('name')
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
            if (!empty($virtualLive->virtualLiveMembers)) {
                foreach ($virtualLive->virtualLiveMembers as $virtualLiveMember) {
                    $memberIds[] = $virtualLiveMember->member_id;
                }
            }
        @endphp
        <label for="virtual-live-members-member-ids" class="col-form-label text-md-end">参加メンバー</label>
        <select id="virtual-live-members-member-ids"
                class="form-select @error('virtual_live_members') is-invalid @enderror"
                name="virtual_live_members[]"
                multiple="multiple">
            @foreach($units as $unit)
                <optgroup label="{{ $unit->name }}">
                    @foreach($unit->members as $member)
                        <option
                            value="{{ $member->id }}"
                            {{ (in_array($member->id, old('virtual_live_members', $memberIds))) ? ' selected' : '' }}
                            data-color="{{ $member->color }}"
                            data-bg-color="{{ $member->bg_color }}"
                            data-name="{{ $member->display_short }}"
                        >{{ $member->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        @error('virtual_live_members')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label class="col-form-label text-md-end">セトリ</label>
    </div>
    @error('virtual_live_tunes')
    <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
@php
    $tuneIndex = old('tune_index', empty($virtualLive->virtualLiveTunes) ? 0 : $virtualLive->virtualLiveTunes->count());
@endphp

@for ($i = 0; $i <= $tuneIndex; $i++)
    @php
        $inputName = 'virtual_live_tunes.' . $i;
        $tuneId = '';
        if (!empty($virtualLive->virtualLiveTunes[$i])) {
            $tuneId = $virtualLive->virtualLiveTunes[$i]->tune_id;
        }
    @endphp
    <div class="row mb-3 live-tune">
        <div class="form-group">
            <select id="virtual-live-tune-id-{{ $i }}" class="form-select @error($inputName) is-invalid @enderror"
                    name="virtual_live_tunes[{{ $i }}][tune_id]">
                <option value="">演奏曲選択</option>
                @foreach($tunes as $tune)
                    <option
                        value="{{ $tune->id }}"{{ old($inputName . '.tune_id', $tuneId ?? '') == $tune->id ? ' selected' : '' }}>
                        {{ $tune->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
@endfor

<div class="row mb-3" id="add-tune">
    <div class="form-group">
        <input type="hidden" name="tune_index" value="{{ old('tune_index', $tuneIndex ?? 0) }}">
        <button type="button" class="btn btn-info">演奏曲を追加する</button>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="event-id" class=" col-form-label text-md-end">イベント</label>

        <select id="event-id" class="form-select @error('event_id') is-invalid @enderror" name="event_id">
            <option value="">選択してください</option>
            @foreach($events as $event)
                <option
                    value="{{ $event->id }}"{{ old('event_id', $virtualLive->event_id ?? '') == $event->id ? ' selected' : '' }}>
                    {{ $event->name }}
                </option>
            @endforeach
        </select>

        @error('event_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
