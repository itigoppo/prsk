<?php

namespace App\Services;

use App\Enums\Attribute;
use App\Enums\Rarity;
use App\Enums\SkillEffect;
use App\Http\Requests\Cards\CardCreate;
use App\Http\Requests\Cards\CardUpdate;
use App\Models\Card;
use App\Models\Member;
use App\Repositories\CardsRepository;
use App\Traits\FileUploadTrait;
use http\Exception\InvalidArgumentException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CardsService
{
    private $cardsRepository;

    use FileUploadTrait;

    /**
     * @param \App\Repositories\CardsRepository $cardsRepository
     */
    public function __construct(CardsRepository $cardsRepository)
    {
        $this->cardsRepository = $cardsRepository;
    }

    /**
     * @param array $query
     * @param array $order
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findPaginate(array $query = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $search = [];

        return $this->cardsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $query
     * @param array $order
     * @return \App\Models\Card[]|CardsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $query = [], array $order = [])
    {
        $search = [];

        if (!empty($query['mids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'member_id',
                'values' => $query['mids'],
            ];
        }
        // released_at before
        if (!empty($query['ratb'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'released_at',
                'operator' => '<=',
                'value' => $query['ratb'],
            ];
        }
        if (!empty($query['at'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'attribute',
                'operator' => '=',
                'value' => $query['at'],
            ];
        }
        if (!empty($query['ske'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'skill_effect',
                'operator' => '=',
                'value' => $query['ske'],
            ];
        }
        if (!empty($query['ray'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'rarity',
                'operator' => '=',
                'value' => $query['ray'],
            ];
        }
        if (!empty($query['ltd'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'is_limited',
                'operator' => '=',
                'value' => 1,
            ];
        }
        if (!empty($query['nltd'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'is_limited',
                'operator' => '!=',
                'value' => 1,
            ];
        }
        if (!empty($query['fes'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'is_fes',
                'operator' => '=',
                'value' => 1,
            ];
        }
        if (!empty($query['nfes'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'is_fes',
                'operator' => '!=',
                'value' => 1,
            ];
        }
        if (!empty($query['hhs'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'has_hair_style',
                'operator' => '=',
                'value' => 1,
            ];
        }
        if (!empty($query['hac'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'has_another_cut',
                'operator' => '=',
                'value' => 1,
            ];
        }
        if (!empty($query['haa'])) {
            $search[] = [
                'type' => 'where',
                'column' => 'has_avatar_accessory',
                'operator' => '=',
                'value' => 1,
            ];
        }

        return $this->cardsRepository->findAll($search, $order);
    }

    /**
     * @param int|string $id
     * @return \App\Models\Card|CardsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->cardsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Cards\CardCreate $request
     * @return bool
     */
    public function create(CardCreate $request): bool
    {
        $request->normal_file_path = $this->fileCreate($request, 'normal_file', Card::FILE_PATH);
        $request->after_training_file_path = $this->fileCreate($request, 'after_training_file', Card::FILE_PATH);

        return $this->cardsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Cards\CardUpdate $request
     * @return bool
     */
    public function update($id, CardUpdate $request): bool
    {
        $entity = $this->cardsRepository->findOne($id);

        // 特訓前
        $request->normal_file_path = $this->fileUpdate($request, $entity, 'normal_file', Card::FILE_PATH);

        // 特訓後
        $request->after_training_file_path = $this->fileUpdate($request, $entity, 'after_training_file', Card::FILE_PATH);

        return $this->cardsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->cardsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->cardsRepository->delete($entity);
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function bulk(Request $request): bool
    {
        DB::transaction(function () use ($request) {
            $file = $request->file('import_csv');
            if (!$file->isReadable()) {
                throw new InvalidArgumentException('アップロードファイルが不正です');
            }

            if ($file->isReadable()) {
                $csv = $file->openFile();
                $csv->setFlags(
                    \SplFileObject::READ_CSV |
                    \SplFileObject::READ_AHEAD |
                    \SplFileObject::SKIP_EMPTY |
                    \SplFileObject::DROP_NEW_LINE
                );

                foreach($csv as $key => $line) {
                    list(
                        $no, $releasedDay, $releasedHour,
                        $rarity, $name, $member, $attribute, $unit, $skill,
                        $costume, $hasHairstyle, $hasAnother, $hasAvatar,
                        $ltdType, $skillName, $performance, $fileName
                        ) = $line;
                    // ヘッダーはスキップ
                    if ($key === 0) {
                        continue;
                    }
                    // スキル名が入ってないなら多分埋めてないからそれ以降止める
                    if (empty($skillName)) {
                        break;
                    }

                    switch ($rarity) {
                        case '1':
                            $rarity = Rarity::STAR_ONE;
                            break;
                        case '2':
                            $rarity = Rarity::STAR_TWO;
                            break;
                        case '3':
                            $rarity = Rarity::STAR_THREE;
                            break;
                        case '4':
                            $rarity = Rarity::STAR_FOUR;
                            break;
                        case 'BD':
                            $rarity = Rarity::BIRTHDAY;
                            break;
                        default :
                            $rarity = "";
                            break;
                    }

                    switch ($attribute) {
                        case 'キュート':
                            $attribute = Attribute::CUTE;
                            break;
                        case 'クール':
                            $attribute = Attribute::COOL;
                            break;
                        case 'ピュア':
                            $attribute = Attribute::PURE;
                            break;
                        case 'ハッピー':
                            $attribute = Attribute::HAPPY;
                            break;
                        case 'ミステリアス':
                            $attribute = Attribute::MYSTERIOUS;
                            break;
                        default :
                            $attribute = "";
                            break;
                    }

                    switch ($skill) {
                        case 'スコア':
                            $skill = SkillEffect::SCORE_BOOST;
                            break;
                        case '回復':
                            $skill = SkillEffect::LIFE_RECOVER;
                            break;
                        case '判定':
                            $skill = SkillEffect::JUDGMENT;
                            break;
                        case 'SP1':
                            $skill = SkillEffect::SPECIAL_SCORE;
                            break;
                        case 'FE2':
                            $skill = SkillEffect::DEPENDS_ON_LIFE;
                            break;
                        case 'FE1':
                            $skill = SkillEffect::DEPENDS_ON_ACCURACY;
                            break;
                        case 'BD1':
                            $skill = SkillEffect::SPECIAL_LIFE;
                            break;
                        case 'VS1':
                            $skill = SkillEffect::UNIT_SCORE_BOOST;
                            break;
                        default :
                            $skill = "";
                            break;
                    }

                    $isLtd = !empty($ltdType);
                    $hasCostume = !empty($costume);
                    $hasHairstyle = !empty($hasHairstyle);
                    $hasAnother = !empty($hasAnother);
                    $hasAvatar = !empty($hasAvatar);

                    $isFes = false;
                    if ($isLtd && $ltdType === 'fes') {
                        $isFes = true;
                    }

                    $memberQuery = Member::query()
                        ->where('members.name', '=', $member);
                    if (strpos($unit, 'VS') !== false) {
                        $match = preg_match('{\((.*)\)}', $unit, $matches);
                        if ($match === 0) {
                            $unit = 'VS';
                        } else {
                            $unit = $matches[1];
                            if ($unit == 'WxS') {
                                $unit = 'W×S';
                            }
                            if ($unit == '25') {
                                $unit = '2500';
                            }
                        }
                        $memberQuery
                            ->join('units', 'members.unit_id', '=', 'units.id')
                            ->where('units.short', '=', $unit);
                    }
                    /** @var Member $member */
                    $member = $memberQuery->select(['members.*'])->first();

                    $normal = '';
                    $after = '';
                    if (!empty($fileName)) {
                        $normal = $this->createSvg(
                            $rarity, $attribute, $isLtd, $isFes,
                            $hasCostume, $hasHairstyle, $hasAnother, $hasAvatar,
                            'normal', $fileName . '_normal.jpg'
                        );
                        if (in_array($rarity, [Rarity::STAR_THREE, Rarity::STAR_FOUR])) {
                            $after = $this->createSvg(
                                $rarity, $attribute, $isLtd, $isFes,
                                $hasCostume, $hasHairstyle, $hasAnother, $hasAvatar,
                                'after', $fileName . '_after_training.jpg'
                            );
                        }
                    }

                    $input = new CardCreate([
                        'released_at' => $releasedDay . ' ' . $releasedHour,
                        'rarity' => $rarity,
                        'attribute' => $attribute,
                        'name' => $name,
                        'member_id' => $member->id,
                        'skill_effect' => $skill,
                        'skill_name' => $skillName,
                        'costume' => (empty($costume) ? null : $line[9]),
                        'has_hair_style' => $hasHairstyle,
                        'has_another_cut' => $hasAnother,
                        'has_avatar_accessory' => $hasAvatar,
                        'is_limited' => $isLtd,
                        'is_fes' => $isFes,
                        'performance' => (empty($performance) ? null : $performance),
                        'normal_file_path' => $normal,
                        'after_training_file_path' => $after,
                    ]);

                    if (!$this->cardsRepository->create($input)) {
                        if (!empty($normal)) {
                            Storage::delete($normal);
                        }
                        if (!empty($after)) {
                            Storage::delete($after);
                        }

                        throw new InvalidArgumentException('カード情報の保存に失敗しました');
                    }
                }
            }
        });

        return true;
    }
}
