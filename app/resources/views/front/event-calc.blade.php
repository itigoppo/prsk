@extends('layouts.app')

@section('title', 'キャラソート')

@section('head')
    <script src="{{ asset('js/event-calc.js') }}"></script>
@endsection

@section('content')
    <div class="row my-2 mx-5">

        <div id="card1" class="col-md-4 col-sm-12 my-1">
            <div class="h5">
                カード1:
                <span>???</span>
            </div>

            <div>レアリティ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card1-rare" id="card1-rare-pu" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-pu">PU★4</label>

                <input type="radio" class="btn-check" name="card1-rare" id="card1-rare-star4" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-star4">既存★4</label>

                <input type="radio" class="btn-check" name="card1-rare" id="card1-rare-br" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-br">BR</label>

                <input type="radio" class="btn-check" name="card1-rare" id="card1-rare-star3" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-star3">★3</label>

                <input type="radio" class="btn-check" name="card1-rare" id="card1-rare-star2" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-star2">★2</label>

                <input type="radio" class="btn-check btn-sm" name="card1-rare" id="card1-rare-star1" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-rare-star1">★1</label>

            </div>

            <div>マスラン</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank0" checked
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank0">0</label>

                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank1"
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank1">1</label>

                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank2"
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank2">2</label>

                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank3"
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank3">3</label>

                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank4"
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank4">4</label>

                <input type="radio" class="btn-check" name="card1-master-rank" id="card1-master-rank5"
                       autocomplete="off">
                <label class="btn btn-outline-success" for="card1-master-rank5">5</label>
            </div>

            <div>ボーナスタイプ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card1-type" id="card1-type-on" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-type-on">一致</label>

                <input type="radio" class="btn-check" name="card1-type" id="card1-type-off" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-type-off">不一致</label>
            </div>

            <div>ボーナスキャラクター</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card1-unit" id="card1-unit-on" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-unit-on">一致</label>

                <input type="radio" class="btn-check" name="card1-unit" id="card1-unit-vs" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-unit-vs">一致(無印バチャシン)</label>

                <input type="radio" class="btn-check" name="card1-unit" id="card1-unit-off" autocomplete="off">
                <label class="btn btn-outline-success" for="card1-unit-off">不一致</label>
            </div>
        </div>

        <div id="card2" class="col-md-4 col-sm-12 my-1">
            <div class="h5">
                カード2:
                <span>???</span>
            </div>

            <div>レアリティ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card2-rare" id="card2-rare-pu" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-pu">PU★4</label>

                <input type="radio" class="btn-check" name="card2-rare" id="card2-rare-star4" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-star4">既存★4</label>

                <input type="radio" class="btn-check" name="card2-rare" id="card2-rare-br" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-br">BR</label>

                <input type="radio" class="btn-check" name="card2-rare" id="card2-rare-star3" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-star3">★3</label>

                <input type="radio" class="btn-check" name="card2-rare" id="card2-rare-star2" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-star2">★2</label>

                <input type="radio" class="btn-check btn-sm" name="card2-rare" id="card2-rare-star1" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-rare-star1">★1</label>

            </div>

            <div>マスラン</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank0" checked
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank0">0</label>

                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank1"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank1">1</label>

                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank2"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank2">2</label>

                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank3"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank3">3</label>

                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank4"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank4">4</label>

                <input type="radio" class="btn-check" name="card2-master-rank" id="card2-master-rank5"
                       autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-master-rank5">5</label>
            </div>

            <div>ボーナスタイプ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card2-type" id="card2-type-on" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-type-on">一致</label>

                <input type="radio" class="btn-check" name="card2-type" id="card2-type-off" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-type-off">不一致</label>
            </div>

            <div>ボーナスキャラクター</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card2-unit" id="card2-unit-on" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-unit-on">一致</label>

                <input type="radio" class="btn-check" name="card2-unit" id="card2-unit-vs" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-unit-vs">一致(無印バチャシン)</label>

                <input type="radio" class="btn-check" name="card2-unit" id="card2-unit-off" autocomplete="off">
                <label class="btn btn-outline-primary" for="card2-unit-off">不一致</label>
            </div>
        </div>

        <div id="card3" class="col-md-4 col-sm-12 my-1">
            <div class="h5">
                カード3:
                <span>???</span>
            </div>

            <div>レアリティ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card3-rare" id="card3-rare-pu" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-pu">PU★4</label>

                <input type="radio" class="btn-check" name="card3-rare" id="card3-rare-star4" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-star4">既存★4</label>

                <input type="radio" class="btn-check" name="card3-rare" id="card3-rare-br" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-br">BR</label>

                <input type="radio" class="btn-check" name="card3-rare" id="card3-rare-star3" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-star3">★3</label>

                <input type="radio" class="btn-check" name="card3-rare" id="card3-rare-star2" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-star2">★2</label>

                <input type="radio" class="btn-check btn-sm" name="card3-rare" id="card3-rare-star1" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-rare-star1">★1</label>

            </div>

            <div>マスラン</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank0" checked
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank0">0</label>

                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank1"
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank1">1</label>

                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank2"
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank2">2</label>

                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank3"
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank3">3</label>

                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank4"
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank4">4</label>

                <input type="radio" class="btn-check" name="card3-master-rank" id="card3-master-rank5"
                       autocomplete="off">
                <label class="btn btn-outline-info" for="card3-master-rank5">5</label>
            </div>

            <div>ボーナスタイプ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card3-type" id="card3-type-on" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-type-on">一致</label>

                <input type="radio" class="btn-check" name="card3-type" id="card3-type-off" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-type-off">不一致</label>
            </div>

            <div>ボーナスキャラクター</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card3-unit" id="card3-unit-on" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-unit-on">一致</label>

                <input type="radio" class="btn-check" name="card3-unit" id="card3-unit-vs" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-unit-vs">一致(無印バチャシン)</label>

                <input type="radio" class="btn-check" name="card3-unit" id="card3-unit-off" autocomplete="off">
                <label class="btn btn-outline-info" for="card3-unit-off">不一致</label>
            </div>
        </div>

        <div id="card4" class="col-md-4 col-sm-12 my-1">
            <div class="h5">
                カード4:
                <span>???</span>
            </div>

            <div>レアリティ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card4-rare" id="card4-rare-pu" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-pu">PU★4</label>

                <input type="radio" class="btn-check" name="card4-rare" id="card4-rare-star4" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-star4">既存★4</label>

                <input type="radio" class="btn-check" name="card4-rare" id="card4-rare-br" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-br">BR</label>

                <input type="radio" class="btn-check" name="card4-rare" id="card4-rare-star3" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-star3">★3</label>

                <input type="radio" class="btn-check" name="card4-rare" id="card4-rare-star2" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-star2">★2</label>

                <input type="radio" class="btn-check btn-sm" name="card4-rare" id="card4-rare-star1" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-rare-star1">★1</label>

            </div>

            <div>マスラン</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank0" checked
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank0">0</label>

                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank1"
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank1">1</label>

                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank2"
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank2">2</label>

                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank3"
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank3">3</label>

                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank4"
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank4">4</label>

                <input type="radio" class="btn-check" name="card4-master-rank" id="card4-master-rank5"
                       autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-master-rank5">5</label>
            </div>

            <div>ボーナスタイプ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card4-type" id="card4-type-on" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-type-on">一致</label>

                <input type="radio" class="btn-check" name="card4-type" id="card4-type-off" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-type-off">不一致</label>
            </div>

            <div>ボーナスキャラクター</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card4-unit" id="card4-unit-on" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-unit-on">一致</label>

                <input type="radio" class="btn-check" name="card4-unit" id="card4-unit-vs" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-unit-vs">一致(無印バチャシン)</label>

                <input type="radio" class="btn-check" name="card4-unit" id="card4-unit-off" autocomplete="off">
                <label class="btn btn-outline-warning" for="card4-unit-off">不一致</label>
            </div>
        </div>

        <div id="card5" class="col-md-4 col-sm-12 my-1">
            <div class="h5">
                カード5:
                <span>???</span>
            </div>

            <div>レアリティ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card5-rare" id="card5-rare-pu" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-pu">PU★4</label>

                <input type="radio" class="btn-check" name="card5-rare" id="card5-rare-star4" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-star4">既存★4</label>

                <input type="radio" class="btn-check" name="card5-rare" id="card5-rare-br" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-br">BR</label>

                <input type="radio" class="btn-check" name="card5-rare" id="card5-rare-star3" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-star3">★3</label>

                <input type="radio" class="btn-check" name="card5-rare" id="card5-rare-star2" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-star2">★2</label>

                <input type="radio" class="btn-check btn-sm" name="card5-rare" id="card5-rare-star1" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-rare-star1">★1</label>

            </div>

            <div>マスラン</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank0" checked
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank0">0</label>

                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank1"
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank1">1</label>

                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank2"
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank2">2</label>

                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank3"
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank3">3</label>

                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank4"
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank4">4</label>

                <input type="radio" class="btn-check" name="card5-master-rank" id="card5-master-rank5"
                       autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-master-rank5">5</label>
            </div>

            <div>ボーナスタイプ</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card5-type" id="card5-type-on" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-type-on">一致</label>

                <input type="radio" class="btn-check" name="card5-type" id="card5-type-off" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-type-off">不一致</label>
            </div>

            <div>ボーナスキャラクター</div>
            <div class="btn-group btn-group-sm" role="group">
                <input type="radio" class="btn-check" name="card5-unit" id="card5-unit-on" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-unit-on">一致</label>

                <input type="radio" class="btn-check" name="card5-unit" id="card5-unit-vs" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-unit-vs">一致(無印バチャシン)</label>

                <input type="radio" class="btn-check" name="card5-unit" id="card5-unit-off" autocomplete="off">
                <label class="btn btn-outline-danger" for="card5-unit-off">不一致</label>
            </div>
        </div>

        <div class="col-md-4 col-sm-12 my-1">
            <div class="alert alert-secondary" role="alert">
                <i class="bi bi-gift"></i>
                今回のボーナスポイントは <span id="bonus">???</span> !!
            </div>
        </div>

    </div>

    <div class="row my-3 mx-5">
        <ul>
            <li>ボーナスタイプ一致：+25</li>
            <li>ボーナスキャラクター一致：+25</li>
            <li>ボーナスキャラクター一致(無印バチャシン)：+15</li>
            <li>PUキャラ：+20</li>
            <li>マスランボーナス
                <dl class="row">
                    <dt class="col-1">☆4</dt>
                    <dd class="col-11">+10 / 12.5 / 15 / 17 / 20 / 25</dd>
                    <dt class="col-1">BR</dt>
                    <dd class="col-11">+5 / 7 / 9 / 11 / 13 / 15</dd>
                    <dt class="col-1">☆3</dt>
                    <dd class="col-11">+0 / 1 / 2 / 3 / 4 / 5</dd>
                    <dt class="col-1">☆2</dt>
                    <dd class="col-11">+0 / 0.2 / 0.4 / 0.6 / 0.8 / 1</dd>
                    <dt class="col-1">☆1</dt>
                    <dd class="col-11">+0 / 0.1 / 0.2 / 0.3 / 0.4 / 0.5</dd>
                </dl>
            </li>
        </ul>

    </div>
@endsection
