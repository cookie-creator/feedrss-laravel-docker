<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'link',
        'description',
        'guid',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function image()
    {
        return $this->hasOne(Image::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function assignCategory($category)
    {
        $this->categories()->sync($category, false);
    }

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn($value) => Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->toFormattedDateString(),
        );
    }

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn($value) => config('app.url') . 'storage/files/' . $this->image->name,
        );
    }
}
