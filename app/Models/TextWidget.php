<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;

/**
 * App\Models\TextWidget
 *
 * @property int $id
 * @property string $key
 * @property string|null $image
 * @property string $title
 * @property string|null $content
 * @property string|null $meta_title
 * @property string|null $meta_description
 * @property int $active
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|TextWidget newModelQuery()
 * @method static Builder|TextWidget newQuery()
 * @method static Builder|TextWidget query()
 * @method static Builder|TextWidget whereActive($value)
 * @method static Builder|TextWidget whereContent($value)
 * @method static Builder|TextWidget whereCreatedAt($value)
 * @method static Builder|TextWidget whereId($value)
 * @method static Builder|TextWidget whereImage($value)
 * @method static Builder|TextWidget whereKey($value)
 * @method static Builder|TextWidget whereTitle($value)
 * @method static Builder|TextWidget whereUpdatedAt($value)
 *
 * @mixin Eloquent
 */
class TextWidget extends Model
{
    use HasFactory;

    protected $guarded = [];

    public static function get(string $key): ?TextWidget
    {
        return Cache::remember('text-widget-'.$key, 24, function () use ($key) {
            return TextWidget::query()
                ->where('key', '=', $key)
                ->where('active', '=', 1)
                ->first();
        });
    }

    public static function getTitle(string $key)
    {
        $widget = Cache::remember('text-widget-title'.$key, 24, function () use ($key) {
            return TextWidget::query()
                ->where('key', '=', $key)
                ->where('active', '=', 1)
                ->first();
        });

        if ($widget) {
            return $widget->title;
        }

        return '';
    }

    public static function getContent(string $key)
    {
        $widget = Cache::remember('text-widget-content-'.$key, 24, function () use ($key) {
            return TextWidget::query()
                ->where('key', '=', $key)
                ->where('active', '=', 1)
                ->first();
        });

        if ($widget) {
            return $widget->content;
        }

        return '';
    }

    public function getImage(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (str_starts_with($this->image, 'http')) {
            return $this->image;
        } else {
            return asset('storage/'.$this->image);
        }
    }
}
