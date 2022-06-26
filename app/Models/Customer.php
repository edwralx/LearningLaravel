<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    // example of fillable
    // protected $fillable = ['name', 'email', 'active'];

    protected $guarded = [];

    protected $attributes = [
        'active' => 1
    ];

    public function getActiveAttribute($attribute){
        /* $status = [
            0 => 'Inactive',
            1 => 'Active'
        ];
        return $status[$attribute]; */

        // a shorthand notation of the above code
        return $this->activeOptions()[$attribute];
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeInactive($query)
    {
        return $query->where('active', 0);
    }

    public function activeOptions()
    {
        return [
            0 => 'Inactive',
            1 => 'Active',
            2 => 'completed',
        ];
    }
}
