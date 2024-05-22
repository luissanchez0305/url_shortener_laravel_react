<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    protected $fillable = ['original_url', 'shortened_url'];

    public static function shortenUrl($originalUrl, $shortenedUrl)
    {
        $url = self::create(['original_url' => $originalUrl, 'shortened_url' => $shortenedUrl]);
        $url->save();

        return $url;
    }

    public static function getOriginalUrl($shortened)
    {
        $url = self::where('shortened_url', $shortened)->firstOrFail();

        return $url ? $url->original_url : null;
    }
}
