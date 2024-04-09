<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property string $fio
 * @property ?string $company
 * @property string $phone
 * @property string $email
 * @property $date_birth
 * @property ?int $photo_id
 */
class Notebook extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    public $fillable = [
        'fio',
        'company',
        'phone',
        'email',
        'date_birth',
        'photo_id'
    ];

    /**
     * @var string[]
     */
    public $hidden = [
        'photo_id'
    ];

    /**
     * @var string[]
     */
    protected $with = ['photo'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Storage::class, 'id', 'photo_id');
    }
}
