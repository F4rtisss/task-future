<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadPhotoRequest;
use App\Models\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Log;

class StorageController extends Controller
{
    public function upload(UploadPhotoRequest $request): \Illuminate\Http\JsonResponse
    {
        // Получаем фотографию из запроса
        /** @var UploadedFile $photo */
        $photo = $request->validated('photo');

        $path = $photo->store('photos', 'public');
        $hash = md5_file($storagePath = storage_path('app/public/' . $path));

        try {
            // Пробуем найти ранее загруженную фотографию
            $file = Storage::query()->where('hash', $hash)->first();
            if (! is_null($file)) {
                unlink($storagePath);

                return $this->success(['photo_id' => $file->id]);
            }

            $file = Storage::query()->create([
                'path' => $storagePath,
                'url' => asset('storage/' . $path),
                'hash' => $hash
            ]);

            return $this->success(['photo_id' => $file->id]);
        } catch (\Throwable $e) {
            unlink($storagePath);
            Log::error($e);

            return $this->error('Произошла ошибка во время запроса...');
        }
    }
}
