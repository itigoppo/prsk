@php
    /**
     * @var string $label
     * @var \App\Models\Card[]|\App\Repositories\CardsRepository[]|\Illuminate\Database\Eloquent\Collection $cards
     */
    use App\Models\Card;
@endphp


<div class="w-100 border-bottom border-2 border-dark pb-1">
    {{ $label }}
    <span class="badge badge-pill badge-secondary">{{ count($cards) }}枚</span>
    @if($cards->isNotEmpty())
        @php
            /** @var \App\Models\Card $lastCard */
            $lastCard = $cards->last();
            $now = \Illuminate\Support\Carbon::now();
        @endphp
        @if ($lastCard->released_at->diffInDays($now) >= 250)
            <span
                    class="badge badge-pill badge-danger">
                最終実装({{ $lastCard->released_at->format('Y/m/d') }})から{{ $lastCard->released_at->diffInDays($now) }}日経過 <i
                        class="fa-solid fa-bomb"></i>
            </span>
        @else
            <span
                    class="badge badge-pill badge-info">最終実装({{ $lastCard->released_at->format('Y/m/d') }})から{{ $lastCard->released_at->diffInDays($now) }}日経過</span>
        @endif
    @endif
</div>
<div class="d-flex flex-wrap">
    @foreach($cards as $card)
        <div class="m-1">
            <div class=" py-2 border text-center" style="width: 140px">
                @if($card->normal_file)
                    <img
                            src="{{ Card::url(route('medias.cards', ['card_id' => $card->uuid, 'mode' => 'normal']), 600) }}"
                            alt="{{ $card->display_name }}"
                            width="60">
                @endif
                @if($card->after_training_file)
                    <img
                            src="{{ Card::url(route('medias.cards', ['card_id' => $card->uuid, 'mode' => 'after']), 600) }}"
                            alt="{{ $card->display_name }}"
                            width="60">
                @endif
            </div>
            <div class="border border-top-0 text-center">
                {{ $card->released_at->format('Y/m/d') }}
                <span class="badge badge-pill badge-danger">{{$card->getAttribute('diff')}}</span>
            </div>
        </div>
    @endforeach
</div>
