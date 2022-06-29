<?php

namespace App\Services;

use App\Http\Requests\Icons\IconCreate;
use App\Models\Icon;
use App\Repositories\IconsRepository;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class IconsService
{
    private $iconsRepository;

    /**
     * @param \App\Repositories\IconsRepository $iconsRepository
     */
    public function __construct(IconsRepository $iconsRepository)
    {
        $this->iconsRepository = $iconsRepository;
    }

    /**
     * @param array $search
     * @param array $order
     * @param int $limit
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function findPaginate(array $search = [], array $order = [], int $limit = 20): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        return $this->iconsRepository->findPaginate($search, $order, $limit);
    }

    /**
     * @param array $search
     * @param array $order
     * @return IconsRepository[]|\Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
     */
    public function findAll(array $search = [], array $order = [])
    {
        return $this->iconsRepository->findAll($search, $order);
    }

    /**
     * @param int|string $id
     * @return \App\Models\Icon|IconsRepository|\Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function findOne($id)
    {
        return $this->iconsRepository->findOne($id);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function create(Request $request): bool
    {
        $file = $request->file('file');

        if (empty($file)) {
            return false;
        }

        $path = Storage::disk('local')->putFile(Icon::FILE_PATH, new File($file->getPathname()));
        if (!$path) {
            return false;
        }

        $iconRequest = [
            'path' => Icon::FILE_PATH,
            'name' => str_replace(Icon::FILE_PATH . '/', '', $path),
            'mime_type' => $file->getMimeType(),
            'extension' => $file->extension(),
            'label' => $file->getClientOriginalName(),
        ];

        $validator = Validator::make($iconRequest, [
            'path' => [
                'required',
            ],
            'name' => [
                'required',
            ],
            'mime_type' => [
                'required',
            ],
            'extension' => [
                'required',
            ],
            'label' => [
            ],
        ]);

        if ($validator->fails()) {
            Storage::disk('local')->delete($path);

            return false;
        }

        try {
            if (!$this->iconsRepository->create(new IconCreate($validator->validated()))) {
                Storage::disk('local')->delete($path);

                return false;
            }
        } catch (ValidationException $e) {
            Storage::disk('local')->delete($path);

            return false;
        }

        return true;
    }

    /**
     * @param int $id
     * @return bool|null
     */
    public function delete(int $id): ?bool
    {
        $entity = $this->iconsRepository->findOne($id);

        if (!$entity) {
            return false;
        }

        $path = $entity->path . '/' . $entity->name;

        if (Storage::disk('local')->exists($path)) {
            if (!Storage::disk('local')->delete($path)){
                return false;
            }
        }

        return $this->iconsRepository->delete($entity);
    }
}
