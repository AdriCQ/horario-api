<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Horario
 *
 * @property int $id
 * @property string $faculty
 * @property string $career
 * @property int $year
 * @property array $content
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereCareer($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereFaculty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereYear($value)
 * @mixin \Eloquent
 */
class Horario extends Model
{
    protected $table = 'horarios';
    protected $guarded = ['id'];
    protected $casts = ['content' => 'array'];
}
