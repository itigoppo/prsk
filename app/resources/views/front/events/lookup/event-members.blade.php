@php
    /**
     * @var \App\Models\Event $event
     */
    use App\Models\Card;
@endphp

<div class="w-100 border-bottom border-2 border-dark pb-1">
    イベントカード
</div>
<div class="d-flex flex-wrap">
    @foreach($event->eventCards as $eventCard)
        <div class="m-1 py-2 border text-center" style="width: 140px">
            @if($eventCard->card->normal_file)
                <img
                    src="{{ Card::url(route('medias.cards', ['card_id' => $eventCard->card->uuid, 'mode' => 'normal']), 600) }}"
                    alt="{{ $eventCard->card->display_name }}"
                    width="60">
            @endif
            @if($eventCard->card->after_training_file)
                <img
                    src="{{ Card::url(route('medias.cards', ['card_id' => $eventCard->card->uuid, 'mode' => 'after']), 600) }}"
                    alt="{{ $eventCard->card->display_name }}"
                    width="60">
            @endif
        </div>
    @endforeach
</div>
