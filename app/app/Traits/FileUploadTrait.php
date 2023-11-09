<?php

namespace App\Traits;

use App\Enums\Rarity;
use App\Models\Card;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\File\Exception\CannotWriteFileException;

trait FileUploadTrait
{
    /**
     * @param Request $request
     * @param string $field
     * @param string $uploadPath
     * @return string|null
     */
    public function fileCreate(Request $request, string $field, string $uploadPath = ''): ?string
    {
        $file = $request->file($field);
        $return = null;
        if (!empty($file)) {
            $path = Storage::disk('local')->putFile($uploadPath, new File($file->getPathname()));
            if (!$path) {
                throw new CannotWriteFileException('ファイル操作に失敗しました');
            }

            $return = $path;
        }

        return $return;
    }

    /**
     * @param Request $request
     * @param Model $entity
     * @param string $field
     * @param string $uploadPath
     * @return mixed|string|null
     */
    public function fileUpdate(Request $request, Model $entity, string $field, string $uploadPath = '')
    {
        $isDelete = $request->get('is_' . $field . '_delete', false);
        $nowFile = $entity->getAttributeValue($field);
        $return = $nowFile;

        if ($isDelete && Storage::disk('local')->exists($nowFile)) {
            if (!Storage::disk('local')->delete($nowFile)) {
                throw new CannotWriteFileException('ファイル操作に失敗しました');
            }

            $return = null;
        }

        $file = $request->file('change_' . $field);
        if (!empty($file)) {
            $path = Storage::disk('local')->putFile($uploadPath, new File($file->getPathname()));
            if (!$path) {
                throw new CannotWriteFileException('ファイル操作に失敗しました');
            }

            $return = $path;

            if (Storage::disk('local')->exists($nowFile)) {
                if (!Storage::disk('local')->delete($nowFile)) {
                    // 元ファイルの削除に失敗したなら新しいファイルも入れない
                    Storage::disk('local')->delete($path);

                    throw new CannotWriteFileException('ファイル操作に失敗しました');
                }
            }
        }

        return $return;
    }

    /**
     * @param string $file
     * @return string
     */
    private function fileBase64($file): string
    {
        $data = base64_encode(file_get_contents($file));

        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $file);
        finfo_close($finfo);

        return 'data:' . $mimeType . ';base64,' . $data;
    }

    /**
     * @param string $rarity
     * @param string $attribute
     * @param bool $ltd
     * @param bool $fes
     * @param bool $another
     * @param string $mode
     * @param string $file
     * @return false|string
     */
    private function createSvg(string $rarity, string $attribute, bool $ltd, bool $fes, bool $another, string $mode, string $file)
    {
        $baseFile = storage_path('data/cards/' . $file);
        if (!file_exists($baseFile)) {
            return false;
        }

        $contents = file_get_contents(storage_path('data/card-temp.txt'));
        $data = $this->fileBase64($baseFile);
        $contents = str_replace('{{card}}', $data, $contents);

        if ($rarity === Rarity::STAR_ONE) {
            $rarity = 1;
        } elseif ($rarity === Rarity::STAR_TWO) {
            $rarity = 2;
        } elseif ($rarity === Rarity::STAR_THREE) {
            $rarity = 3;
        } elseif ($rarity === Rarity::STAR_FOUR) {
            $rarity = 4;
        } elseif ($rarity === Rarity::BIRTHDAY) {
            $rarity = 'bd';
        }
        $data = $this->fileBase64(storage_path('data/card-parts/frame' . $rarity . '.png'));
        $contents = str_replace('{{frame}}', $data, $contents);

        $data = $this->fileBase64(storage_path('data/card-parts/attribute_' . $attribute . '.png'));
        $contents = str_replace('{{attribute}}', $data, $contents);

        $rarityTemplate = '<image width="23" height="23" x="{{coordinate}}" y="123"'
            . "\n"
            . '           xlink:href="{{data}}"></image>'
            . "\n";

        $loop = $rarity;
        if ($rarity === 'bd') {
            $data = $this->fileBase64(storage_path('data/card-parts/rarity_birthday.png'));
            $loop = 1;
        } elseif ($mode === 'after') {
            $data = $this->fileBase64(storage_path('data/card-parts/star_after.png'));
        } else {
            $data = $this->fileBase64(storage_path('data/card-parts/star_normal.png'));
        }

        $rarityContents = '';
        $coordinates = [10, 33, 56, 79];
        for ($i = 0; $i < $loop; $i++) {
            $rarityContent = str_replace('{{coordinate}}', $coordinates[$i], $rarityTemplate);
            if ($i !== 0) {
                $rarityContent = '    ' . $rarityContent;
            }
            $rarityContents .= str_replace('{{data}}', $data, $rarityContent);
        }
        $contents = str_replace('{{rarity}}', $rarityContents, $contents);

        $limitedContents = '';

        if ($ltd && $fes) {
            $limitedContents = '<!-- Fes -->'
                . "\n"
                . '    <rect width="60" height="25" rx="10" ry="10" x="96" y="1" fill="url(#fes-color)" style="stroke: rgb(255, 255, 255);"></rect>'
                . "\n"
                . '    <text style="fill: rgb(255, 255, 255); font-family: &quot;M PLUS 1&quot;; font-size: 15px; font-weight: 300; white-space: pre;" x="98.949" y="18.225">FesLtd.</text>'
                . "\n"
                . '    <linearGradient id="fes-color" x1="0" y1="0" x2="0" y2="1">'
                . "\n"
                . '        <stop offset="0%" stop-color="#ed0e9f" />'
                . "\n"
                . '        <stop offset="100%" stop-color="#f5acdb" />'
                . "\n"
                . '    </linearGradient>'
                . "\n";
        } elseif ($ltd && $another) {
            $limitedContents = '<!-- 限定(アナザーカット) -->'
                . "\n"
                . '    <rect width="60" height="25" rx="10" ry="10" x="96" y="1" fill="url(#ltd-another-color)" style="stroke: rgb(255, 255, 255);"></rect>'
                . "\n"
                . '    <text style="fill: rgb(255, 255, 255); font-family: &quot;M PLUS 1&quot;; font-size: 15px; font-weight: 300; white-space: pre;" x="98.738" y="18.225">Limited</text>'
                . "\n"
                . '    <linearGradient id="ltd-another-color" x1="0" y1="0" x2="0" y2="1">'
                . "\n"
                . '        <stop offset="0%" stop-color="#005caf" />'
                . "\n"
                . '        <stop offset="100%" stop-color="#2ea9df" />'
                . "\n"
                . '    </linearGradient>'
                . "\n";
        } elseif ($ltd) {
            $limitedContents = '<!-- 限定 -->'
                . "\n"
                . '    <rect width="60" height="25" rx="10" ry="10" x="96" y="1" fill="url(#ltd-color)" style="stroke: rgb(255, 255, 255);"></rect>'
                . "\n"
                . '    <text style="font-family: &quot;M PLUS 1&quot;; font-size: 15px; font-weight: 300; white-space: pre;" x="98.738" y="18.225">Limited</text>'
                . "\n"
                . '    <linearGradient id="ltd-color" x1="0" y1="0" x2="0" y2="1">'
                . "\n"
                . '        <stop offset="0%" stop-color="#aaed0e" />'
                . "\n"
                . '        <stop offset="100%" stop-color="#dffacd" />'
                . "\n"
                . '    </linearGradient>'
                . "\n";
        }
        $contents = str_replace('{{limited}}', $limitedContents, $contents);

        $svgPath = storage_path('data/card.svg');
        file_put_contents($svgPath, $contents);

        return Storage::disk('local')->putFile(Card::FILE_PATH, new File($svgPath));
    }
}
