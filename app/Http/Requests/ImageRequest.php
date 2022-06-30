<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
{
    public function rules(): array
    {
        if ($this->isMethod('put')) {
            return [
                'title' => ['nullable', 'string', 'max:255'],
            ];
        }

        return [
            'file' => ['required', 'image'],
            'title' => ['nullable', 'string', 'max:255'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }


    public function getData(): array
    {
        $data = $this->validated() + [
                'user_id' => $this->user()->id ?? 1,
            ];

        if ($this->hasFile('file')) {
            $directory = Image::makeDirectory();

            $data['file'] = $this->file->store($directory);
            $data['dimension'] = Image::getDimension($data['file']);
        }

        return $data;
    }
}
