<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function makeDirectory()
    {
        $subFolder = now()->format('Y/m/d');

        Storage::makeDirectory('images/' . $subFolder);

        return $subFolder;
    }

    public static function getDimension($image)
    {
        [$width, $height] = getimagesize(Storage::path($image));

        return $width . 'x' . $height;
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function fileUrl()
    {
        return Storage::url($this->file);
    }

    public function permalink()
    {
        return $this->slug ? route('images.show', $this) : '#';
    }

    public function route($method, $key = 'id')
    {
        return route("images.{$method}", $this->$key);
    }

    public function getSlug()
    {
        $slug = str($this->title)->slug();

        $numSlugFound = static::where('slug', 'regexp', '^' . $slug . '(-[0-9])?')->count('id');

        if ($numSlugFound > 0) {
            return $slug . '-' . $numSlugFound + 1;
        }

        return $slug;
    }

    public function uploadDate()
    {
        return $this->created_at->diffForHumans();
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    protected static function booted()
    {
        static::creating(function (Image $image) {
            if ($image->title) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::updating(function (Image $image) {
            if ($image->title && ! $image->slug) {
                $image->slug = $image->getSlug();
                $image->is_published = true;
            }
        });

        static::deleting(function (Image $image) {
            Storage::delete($image->file);
        });
    }
}
