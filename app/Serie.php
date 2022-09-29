<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome'];
    protected $appends = ['links'];

    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

    public function getLinksAttribute(): array
    {
        return[
            'self' => '/api/series/' . $this->id,
            'episodios' => '/api/series/' . $this->id . '/episodios'
        ];
    }

}
