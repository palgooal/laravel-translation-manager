<?php

namespace Palgoals\TranslationManager\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    protected $fillable = ['name', 'native', 'code', 'flag', 'is_rtl', 'is_active'];
}
