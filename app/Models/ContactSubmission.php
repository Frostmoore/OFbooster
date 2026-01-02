<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    protected $fillable = [
        'name','email','instagram','start_level','goal','message',
        'ip','user_agent','mail_sent','mail_error',
    ];
}
