<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', // 'user_id' is the name of the input in the form 'register.blade.php

        'first_name',
        'last_name',
        'address',
        'phone_number',
    ];
    
    public function user()
    {
    return $this->belongsTo(User::class);
    }
}
