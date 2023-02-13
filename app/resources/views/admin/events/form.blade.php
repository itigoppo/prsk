@php
    /**
     * @var \App\Models\Event $event
     * @var array $eventTypes
     * @var array $attributes
     * @var \App\Models\Tune[] $tunes
     * @var \App\Models\Card[] $cards
     * @var \App\Models\Unit[] $units
     * @var \App\Models\Member[] $members
     */
@endphp

@section('head')
    <script src="{{ asset('js/flatpickrs.js') }}"></script>
    <script src="{{ asset('js/events.js') }}"></script>
@endsection

<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <label for="starts-at" class="col-form-label text-md-end">イベント開始日</label>
            <input id="starts-at" type="text"
                   class="form-control @error('starts_at') is-invalid @enderror" name="starts_at"
                   value="{{ old('starts_at', $event->starts_at ?? '') }}">

            @error('starts_at')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <label for="ends-at" class="col-form-label text-md-end">イベント終了日</label>
            <input id="ends-at" type="text"
                   class="form-control @error('ends_at') is-invalid @enderror" name="ends_at"
                   value="{{ old('ends_at', $event->ends_at ?? '') }}">

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
        <label for="name" class="col-form-label text-md-end">イベント名</label>
        <input id="name" type="text"
               class="form-control @error('name') is-invalid @enderror" name="name"
               value="{{ old('name', $event->name ?? '') }}">

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        <label for="type" class="col-form-label text-md-end">タイプ</label>
        <select id="type" class="form-select @error('type') is-invalid @enderror"
                name="type">
            <option value="">選択してください</option>
            @foreach($eventTypes as $key => $value)
                <option
                    value="{{ $key }}"{{ old('type', $event->type ?? '') == $key ? ' selected' : '' }}>
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
        <label for="attribute" class="col-form-label text-md-end">属性</label>
        <select id="attribute" class="form-select @error('attribute') is-invalid @enderror"
                name="attribute">
            <option value="">選択してください</option>
            @foreach($attributes as $key => $value)
                <option
                    value="{{ $key }}"{{ old('attribute', $event->attribute ?? '') == $key ? ' selected' : '' }}>
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
        <label for="tune-id" class=" col-form-label text-md-end">書き下ろし楽曲</label>
        <select id="tune-id" class="form-select @error('tune_id') is-invalid @enderror"
                name="tune_id">
            <option value="">選択してください</option>
            @foreach($tunes as $tune)
                <option
                    value="{{ $tune->id }}"{{ old('tune_id', $event->tune_id ?? '') == $tune->id ? ' selected' : '' }}>

                    {{ $tune->name }}({{ $tune->unit->name }})
                </option>
            @endforeach
        </select>

        @error('tune_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <div class="form-group">
            <div class="checkbox icheck-primary icheck-inline">
                <input id="is-key-story" class="form-check-input @error('is_key_story') is-invalid @enderror"
                       type="checkbox"
                       name="is_key_story"
                       value="1"{{ old('is_key_story', $event->is_key_story ?? '') ? ' checked' : '' }}>
                <label class="form-check-label" for="is-key-story">キーストーリーか</label>
            </div>

            @error('is_key_story')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            <div class="input-group mb-3">
                <input id="story-chapter" type="text"
                       class="form-control @error('story_chapter') is-invalid @enderror" name="story_chapter"
                       value="{{ old('story_chapter', $event->story_chapter ?? '') }}" inputmode="numeric"
                       pattern="\d*">
                <span class="input-group-text">章</span>
            </div>

            @error('story_chapter')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>

<div class="row">
    <div class="form-group">
        <label class="col-form-label text-md-end">イベントカード</label>
    </div>
</div>
@php
    $cardIndex = old('card_index', (empty($event->eventCards) || $event->eventCards->count() === 0) ? 4 : $event->eventCards->count());
@endphp

@for ($i = 0; $i <= $cardIndex; $i++)
    @php
        $inputName = 'event_cards.' . $i;
        $isBanner = false;
        $cardId = '';
        if (!empty($event->eventCards[$i])) {
            $isBanner = $event->eventCards[$i]->is_banner;
            $cardId = $event->eventCards[$i]->card_id;
        }
    @endphp
    <div class="row mb-3 event-card">

        <div class="col">

            <div class="form-group">
                <select id="event-cards-id-{{ $i }}" class="form-select @error($inputName) is-invalid @enderror"
                        name="event_cards[{{ $i }}][card_id]">
                    <option value="">イベントカード選択</option>
                    @foreach($cards as $card)
                        <option
                            value="{{ $card->id }}"{{ old($inputName . '.card_id', $cardId ?? '') == $card->id ? ' selected' : '' }}>

                            {{ $card->display_name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col">
            <div class="form-group">
                <div class="checkbox icheck-primary icheck-inline">
                    <input id="event-cards-is-banner-{{ $i }}" class="form-check-input @error($inputName) is-invalid @enderror"
                           type="checkbox"
                           name="event_cards[{{ $i }}][is_banner]"
                           value="1"{{ old($inputName . '.is_banner', $isBanner ?? '') ? ' checked' : '' }}>
                    <label class="form-check-label" for="event-cards-is-banner-{{ $i }}">バナー</label>
                </div>
            </div>
        </div>
    </div>
@endfor

<div class="row mb-3" id="add-event-card">
    <div class="form-group">
        <input type="hidden" name="card_index" value="{{ old('card_index', $cardIndex ?? 0) }}">
        <button type="button" class="btn btn-info">イベントカードを追加する</button>
    </div>
</div>

<div class="row mb-3">
    <div class="form-group">
        @php
            $memberIds = [];
            if (!empty($event->eventMembers)) {
                foreach ($event->eventMembers as $eventMember) {
                    $memberIds[] = $eventMember->member_id;
                }
            }
        @endphp
        <label for="event-members-member-ids" class="col-form-label text-md-end">ボーナスメンバー</label>
        <select id="event-members-member-ids"
                class="form-select @error('event_members') is-invalid @enderror"
                name="event_members[]"
                multiple="multiple">
            @foreach($units as $unit)
                <optgroup label="{{ $unit->name }}">
                    @foreach($unit->members as $member)
                        <option
                            value="{{ $member->id }}"
                            {{ (in_array($member->id, old('event_members', $memberIds))) ? ' selected' : '' }}
                            data-color="{{ $member->color }}"
                            data-bg-color="{{ $member->bg_color }}"
                            data-name="{{ $member->display_short }}"
                        >{{ $member->name }}</option>
                    @endforeach
                </optgroup>
            @endforeach
        </select>

        @error('event_members')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
