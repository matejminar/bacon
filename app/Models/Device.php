<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    
    
    protected $fillable = [
        "ip",
        "mac",
        "hostname",
        "employee_id",
    
    ];
    
    protected $hidden = [
    
    ];
    
    protected $dates = [
        "created_at",
        "updated_at",
    
    ];
    
    
    
    protected $appends = ['resource_url'];

    /* ************************ ACCESSOR ************************* */

    public function getResourceUrlAttribute() {
        return url('/admin/devices/'.$this->getKey());
    }

  /* ************************ RELATIONS ************************* */

  public function employee() {
    return $this->belongsTo('App\Models\Employee');
  }

    
}
