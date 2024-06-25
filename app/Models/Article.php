<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;


/**
 *
 *
 * @property int $id
 * @property string $title
 * @property string $body
 * @property int $author
 * @property string $published_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Article newModelQuery()
 * @method static Builder|Article newQuery()
 * @method static Builder|Article query()
 * @method static Builder|Article whereAuthor($value)
 * @method static Builder|Article whereBody($value)
 * @method static Builder|Article whereCreatedAt($value)
 * @method static Builder|Article whereId($value)
 * @method static Builder|Article wherePublishedAt($value)
 * @method static Builder|Article whereTitle($value)
 * @method static Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'title', 'body', 'author', 'published_at', 'created_at', 'updated_at'];
    protected $casts = [
        'published_at' => 'datetime:Y-m-d H:00',
    ];




    protected function title(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => trim($value),
        );
    }


    protected function body(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => ucfirst($value),
            set: fn (string $value) => trim($value),
        );
    }

    protected function published_at(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value),
        );
    }

}
