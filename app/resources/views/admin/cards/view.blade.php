@php
    /**
     * @var \App\Models\Card $card
     */
@endphp

@extends('layouts.admin')
@section('title', 'カード詳細: [' . $card->name . ']' . $card->member->display_name)
@section('pageTitle', 'カード詳細')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-10">
            @include('includes.crud-flash')

            <div class="text-end mb-2">
                <a href="{{ route('admin.cards.view', ['card_id' => $card->id]) }}"
                   class="btn btn-sm btn-outline-danger delete-button"
                   data-delete-form="delete-form">
                    <i class="fa-solid fa-trash-can"></i> 削除
                </a>

                <form id="delete-form"
                      action="{{ route('admin.cards.delete', ['card_id' => $card->id]) }}"
                      method="POST" class="d-none">
                    @csrf
                </form>

                <a href="{{ route('admin.cards.update', ['card_id' => $card->id]) }}"
                   class="btn btn-sm btn-outline-primary">
                    <i class="fa-solid fa-pen-to-square"></i> 編集
                </a>
            </div>

            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">解放日</dt>
                        <dd class="col-sm-9">{{ $card->released_at->format('Y/m/d H:i:s') }}</dd>
                        <dt class="col-sm-3">レアリティ</dt>
                        <dd class="col-sm-9">{{ $card->rarity->description }}</dd>
                        <dt class="col-sm-3">属性</dt>
                        <dd class="col-sm-9">{{ $card->attribute->description }}</dd>
                        <dt class="col-sm-3">カード名</dt>
                        <dd class="col-sm-9">{{ $card->name }}</dd>
                        <dt class="col-sm-3">メンバー</dt>
                        <dd class="col-sm-9">{{ $card->member->display_name }}</dd>
                        <dt class="col-sm-3">スキルタイプ</dt>
                        <dd class="col-sm-9">{{ $card->skill_effect->description }}</dd>
                        <dt class="col-sm-3">スキル</dt>
                        <dd class="col-sm-9">{{ $card->skill_name }}</dd>
                        <dt class="col-sm-3">衣装</dt>
                        <dd class="col-sm-9">{{ $card->costume }}</dd>
                        <dt class="col-sm-3">ヘアスタイル</dt>
                        <dd class="col-sm-9">
                            @if($card->has_hair_style)
                                あり
                            @else
                                なし
                            @endif
                        </dd>
                        <dt class="col-sm-3">総合力</dt>
                        <dd class="col-sm-9">
                            {{ $card->performance + $card->technique + $card->stamina }}
                            (Pf:{{ $card->performance }} / Te:{{ $card->technique }} / St:{{ $card->stamina }})
                        </dd>
                        <dt class="col-sm-3">イラスト</dt>
                        <dd class="col-sm-9">
                            @if($card->normal_file)
                                <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'normal']) }}" width="100">
                            @endif
                            @if($card->after_training_file)
                                <img src="{{ route('admin.cards.display', ['card_id' => $card->id, 'mode' => 'after_training']) }}" width="100">
                            @endif
                        </dd>
                    </dl>
                </div>
            </div>
        </div>
    </div>
@endsection
