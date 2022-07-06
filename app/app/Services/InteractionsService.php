<?php

namespace App\Services;

use App\Http\Requests\Interactions\InteractionCreate;
use App\Http\Requests\Interactions\InteractionUpdate;
use App\Models\Interaction;
use App\Repositories\InteractionsRepository;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class InteractionsService
{
    private $interactionsRepository;

    /**
     * @param \App\Repositories\InteractionsRepository $interactionsRepository
     */
    public function __construct(InteractionsRepository $interactionsRepository)
    {
        $this->interactionsRepository = $interactionsRepository;
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
        if (!empty($query['fmids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'interactions.from_member_id',
                'values' => $query['fmids'],
            ];
        }
        if (!empty($query['tmids'])) {
            $search[] = [
                'type' => 'whereIn',
                'column' => 'interactions.to_member_id',
                'values' => $query['tmids'],
            ];
        }
        if (!empty($query['hasf']) && $query['hasf'] === '1') {
            $search[] = [
                'type' => 'whereNotNull',
                'column' => 'interactions.file',
            ];
        }
        if (!empty($query['hasf']) && $query['hasf'] === '2') {
            $search[] = [
                'type' => 'whereNull',
                'column' => 'interactions.file',
            ];
        }

        return $this->interactionsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return \App\Models\Interaction[]|InteractionsRepository[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $search = [], array $order = [])
    {
        return $this->interactionsRepository->findAll($search, $order);
    }

    /**
     * @param $id
     * @return \App\Models\Interaction|InteractionsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->interactionsRepository->findOne($id);
    }

    /**
     * @param \App\Http\Requests\Interactions\InteractionCreate $request
     * @return bool
     */
    public function create(InteractionCreate $request): bool
    {
        $file = $request->file('file');
        if (!empty($file)) {
            $path = Storage::disk('local')->putFile(Interaction::FILE_PATH, new File($file->getPathname()));
            if (!$path) {
                return false;
            }
            $request->file_path = $path;
        }

        return $this->interactionsRepository->create($request);
    }

    /**
     * @param int|string $id
     * @param \App\Http\Requests\Interactions\InteractionUpdate $request
     * @return bool
     */
    public function update($id, InteractionUpdate $request): bool
    {
        $entity = $this->interactionsRepository->findOne($id);

        if (!empty($request->is_file_delete) && Storage::disk('local')->exists($entity->file)) {
            if (!Storage::disk('local')->delete($entity->file)){
                return false;
            }
            $request->file_path = null;
        }

        $file = $request->file('change_file');
        if (!empty($file)) {
            $path = Storage::disk('local')->putFile(Interaction::FILE_PATH, new File($file->getPathname()));
            if (!$path) {
                return false;
            }
            $request->file_path = $path;

            if (Storage::disk('local')->exists($entity->file)) {
                if (!Storage::disk('local')->delete($entity->file)){
                    // 元ファイルの削除に失敗したなら新しいファイルも入れない
                    Storage::disk('local')->delete($path);

                    return false;
                }
            }
        }

        // 変わらないなら元のファイル名
        if (!empty($entity->file) && empty($request->file_path)) {
            $request->file_path = $entity->file;
        }

        return $this->interactionsRepository->update($entity, $request);
    }

    /**
     * @param int|string $id
     * @return bool|null
     */
    public function delete($id): ?bool
    {
        $entity = $this->interactionsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        return $this->interactionsRepository->delete($entity);
    }
}
