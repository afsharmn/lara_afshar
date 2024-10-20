<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    const TYPE_AUDIO = 1;
    const TYPE_IMAGE = 2;
    const TYPE_VIDEO = 3;
    const TYPE_TEXT = 4;
    const TYPE_FONT = 5;
    const TYPE_PDF = 6;
    const TYPE_EXCEL = 7;
    const TYPE_WORD = 8;
    const TYPE_POWERPOINT = 9;
    const TYPE_ARCHIVE = 10;
    const TYPE_OTHER = 11;
    protected $fillable = [
        'name',
        'address',
        'size',
        'extension',
        'type',
        'location',
    ];

    public static function typesValue()
    {
        return [
            self::TYPE_AUDIO => __('audio'),
            self::TYPE_IMAGE => __('image'),
            self::TYPE_VIDEO => __('video'),
            self::TYPE_TEXT => __('text'),
            self::TYPE_FONT => __('font'),
            self::TYPE_PDF => __('pdf'),
            self::TYPE_EXCEL => __('excel'),
            self::TYPE_WORD => __('word'),
            self::TYPE_POWERPOINT => __('powerpoint'),
            self::TYPE_ARCHIVE => __('archive'),
            self::TYPE_OTHER => __('other'),
        ];
    }

    public function getUrlAttribute()
    {

        if ($this->location == 'local')
            return asset('storage/' . $this->address);

        return $this->location . '/' . $this->address;
    }


}
