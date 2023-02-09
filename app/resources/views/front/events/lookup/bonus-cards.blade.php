@php
    /**
     * @var \App\Models\Event $event
     */
    use App\Models\Card;
@endphp

<div class="w-100 border-bottom border-2 border-dark pb-1">
    ボーナスカード
</div>
<div class="d-flex flex-wrap">
    @foreach($event->bonus_cards as $bonusCard)
        <div class="m-1 py-2 border text-center" style="width: 120px">
            @if($bonusCard->normal_file)
                <img
                    src="{{ Card::url(route('medias.cards', ['card_id' => $bonusCard->uuid, 'mode' => 'normal']), 600) }}"
                    alt="{{ $bonusCard->display_name }}"
                    width="50">
            @endif
            @if($bonusCard->after_training_file)
                <img
                    src="{{ Card::url(route('medias.cards', ['card_id' => $bonusCard->uuid, 'mode' => 'after']), 600) }}"
                    alt="{{ $bonusCard->display_name }}"
                    width="50">
            @endif
        </div>
    @endforeach
</div>
