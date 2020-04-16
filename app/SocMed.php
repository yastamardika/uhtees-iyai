<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocMed extends Model
{
    protected $table = 'media_socials';

    protected $fillable = ['user_id', 'social_media', 'username'];


}
