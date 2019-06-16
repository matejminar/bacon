<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    
    
    protected $fillable = [
        "name",
        "is_at_work",
        "last_seen_at",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "last_seen_at",
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/employees/'.$this->getKey());
    }

    
}
