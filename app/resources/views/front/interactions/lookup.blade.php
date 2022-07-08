@php
    /**
     * @var \App\Models\Interaction $interaction
     */
    use App\Models\Icon;
    use App\Models\Interaction;
@endphp

<div class="row">
    @if(!empty($interaction->note))
        <span class="badge rounded-pill bg-success mb-2">
            <i class="fa-regular fa-circle-question"></i>
            {{ $interaction->note }}
        </span>
    @endif

    <div class="balloon left">
        @if(empty($interaction->fromMember))
            <div class="balloon-icon text-center">
                <span class="fa-stack small">
                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-people-group fa-stack-1x"></i>
                </span>
            </div>
            <div class="balloon-member">-</div>
            <div class="balloon-side">
                <div class="balloon-text">-</div>
            </div>
        @else
            <div class="balloon-icon text-center">
                <img
                    src="{{ Icon::url(route('medias.icons', ['icon_id' => $interaction->fromMember->icon->uuid]), 600) }}"
                    alt="{{ $interaction->fromMember->display_short }}">
            </div>
            <div class="balloon-member">{{ $interaction->fromMember->display_short }}</div>
            <div class="balloon-side">
                <div class="balloon-text">{{ $interaction->from_line }}</div>
            </div>
        @endif
    </div>

    <div class="balloon right">
        @if(empty($interaction->toMember))
            <div class="balloon-icon text-center">
                <span class="fa-stack small">
                    <i class="fa-regular fa-circle fa-stack-2x"></i>
                    <i class="fa-solid fa-people-group fa-stack-1x"></i>
                </span>
            </div>
            <div class="balloon-member">-</div>
            <div class="balloon-side">
                <div class="balloon-text">-</div>
            </div>
        @else
            <div class="balloon-icon text-center">
                <img
                    src="{{ Icon::url(route('medias.icons', ['icon_id' => $interaction->toMember->icon->uuid]), 600) }}"
                    alt="{{ $interaction->toMember->display_short }}">
            </div>
            <div class="balloon-member">{{ $interaction->toMember->display_short }}</div>
            <div class="balloon-side">
                <div class="balloon-text">{{ $interaction->to_line }}</div>
            </div>
        @endif
    </div>
</div>

<div class="row mt-2 text-center audio">
    <audio controls="" controlslist="nodownload" id="audio-file">
        <source
            src="{{ Interaction::url(route('medias.interactions', ['interaction_id' => $interaction->uuid]), 10) }}"
            type="audio/mpeg">
    </audio>
</div>

<div class="input-group input-group-sm mt-3">
    <input id="detail-url" type="text" class="form-control" aria-label="detail url" aria-describedby="url-copy" readonly
           value="{{ route('front.interactions.view', ['interaction_id' => $interaction->uuid]) }}">
    <button class="btn btn-primary" type="button" id="url-copy">
        <i class="fa-regular fa-clone"></i>
    </button>
</div>

<div id="copy-tooltip" class="popper-tooltip" role="tooltip">
    Copied!
    <div class="arrow" data-popper-arrow></div>
</div>

