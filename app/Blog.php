<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    public $timestamps = false;

    protected $fillable = ['title', 'body', 'photo', 'posted_at'];

    protected $dates = ['posted_at'];

    static function getValidationRules() {
        return array(
            'title' => 'required|min:6',
			'posted_at' => 'required|date_format:Y-m-d H:i:s',
            'body' => 'required',
        );
    }
}
