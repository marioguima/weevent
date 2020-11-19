<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'uuid', 'title', 'embedded_video'];

    //evento executado antes de se criar o model no banco de dados
    // User::creating(function($model){
    //     $model->uuid = \Str::uuid();
    // });

    public static function boot()
    {
        parent::boot();
        self::creating(function($model) {
            $model->uuid = \Str::uuid();
        });
    }

    public function getRouteKeyName() {
        return 'uuid';
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id', 'user_id');
    }
}
