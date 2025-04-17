<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RetrosContent extends Model
{
    protected $table        = 'retros_content';
    protected $fillable     = ['text', 'user_id','column_id'];

    public function retro()
    {
        return $this->belongsTo(Retros::class);
    }

    public function column()
    {
        return $this->belongsTo(RetrosColumns::class, 'retros_column_id');
    }
}
