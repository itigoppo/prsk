@php
    /**
     * @var \App\Models\Card[]|\Illuminate\Contracts\Pagination\LengthAwarePaginator $cards
     */
    use App\Enums\Attribute;
@endphp

@extends('layouts.admin')
@section('title', 'カード管理')
@section('pageTitle', 'カード一覧')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.cards.create') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 新規作成
                </a>
                <a href="{{ route('admin.cards.bulk') }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-file-csv"></i> CSVインポート
                </a>
            </div>

            <div class="row">

                <table class="table table-hover table-striped">
                    <thead>
                    <tr>
                        <th style="width: 150px">イラスト</th>
                        <th>レア</th>
                        <th>属性</th>
                        <th>カード名</th>
                        <th>スキル</th>
                        <th style="width: 120px"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($cards as $card)
                        <tr>
                            <td>

                                @if($card->normal_file)
                                    <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'normal']) }}" width="60">
                                @endif
                                @if($card->after_training_file)
                                    <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'after_training']) }}" width="60">
                                @endif
                            </td>
                            <td>
                                {{ $card->rarity->description }}
                            </td>
                            <td>
                                <span class="badge"
                                      style="background-color: {{ Attribute::getColor($card->attribute->value) }};">{{ mb_substr($card->attribute->description, 0, 1) }}</span>
                            </td>
                            <td>
                                [{{ $card->name}}]<br>
                                {{ $card->member->display_name }}
                            </td>
                            <td>
                                {{ $card->skill_effect->description }}
                            </td>
                            <td class="text-end">
                                <a href="{{ route('admin.cards.view', ['card_id' => $card->id]) }}"
                                   class="btn btn-sm btn-outline-dark">詳細</a>
                                <a href="{{ route('admin.cards.update', ['card_id' => $card->id]) }}"
                                   class="btn btn-sm btn-outline-primary">編集</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

            {{ $cards->links() }}
        </div>
    </div>
@endsection

