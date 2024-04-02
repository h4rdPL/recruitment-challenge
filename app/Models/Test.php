<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @method static findOrFail($id)
 * @method static create(string[] $data)
 * @method static where(string $string, string $string1)
 */
class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'test_code',
        'icd_code'
    ];

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

}
