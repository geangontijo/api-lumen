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
        return $this->hasMany(Episodio::class);
    }

    public function getLinksAttribute():array
    {
        return [
            'episodios' => '/api/serie/' . $this->id . '/episodios'
        ];
    }
}
