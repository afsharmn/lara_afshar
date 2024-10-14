<?php

namespace App\Helpers;

use App\Models\Media;

class File
{

    public static function getFileTypeForMedia($mimeType){

        $excelMimeTypes = [
            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'application/vnd.ms-excel',
        ];

        $wordMimeTypes = [
            'application/msword',
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        $powerpointMimeTypes = [
            'application/vnd.ms-powerpoint',
            'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        ];

        $archiveMimeTypes = [
            'application/zip',
            'application/vnd.rar',
            'application/x-tar',
            'application/x-freearc',
            'application/x-bzip',
            'application/x-bzip2',
            'application/gzip',
            'application/java-archive',
            'application/x-7z-compressed',
        ];

        if (str_contains($mimeType, 'audio'))
            return Media::TYPE_AUDIO;
        if (str_contains($mimeType, 'image'))
            return Media::TYPE_IMAGE;
        if (str_contains($mimeType, 'video'))
            return Media::TYPE_VIDEO;
        if (str_contains($mimeType, 'text'))
            return Media::TYPE_TEXT;
        if (str_contains($mimeType, 'font'))
            return Media::TYPE_FONT;
        if (str_contains($mimeType, 'pdf'))
            return Media::TYPE_PDF;
        if (in_array($mimeType , $excelMimeTypes))
            return Media::TYPE_EXCEL;
        if (in_array($mimeType , $wordMimeTypes))
            return Media::TYPE_WORD;
        if (in_array($mimeType , $powerpointMimeTypes))
            return Media::TYPE_POWERPOINT;
        if (in_array($mimeType , $archiveMimeTypes))
            return Media::TYPE_ARCHIVE;

        return Media::TYPE_OTHER;
    }
    public static function humanFilesize($bytes, $dec = 2): string {

        $size   = array('B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
        $factor = floor((strlen($bytes) - 1) / 3);
        if ($factor == 0) $dec = 0;


        return sprintf("%.{$dec}f %s", $bytes / (1024 ** $factor), $size[$factor]);

    }

}
