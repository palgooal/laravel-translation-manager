<?php

namespace Palgoals\TranslationManager\Models;

use Illuminate\Database\Eloquent\Model;

class TranslationValue extends Model
{
    protected $fillable = ['key', 'group', 'locale', 'value'];
}
