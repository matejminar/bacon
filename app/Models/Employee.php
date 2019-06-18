<?php namespace App\Models;

use Brackets\Media\HasMedia\HasMediaCollections;
use Brackets\Media\HasMedia\HasMediaCollectionsTrait;
use Brackets\Media\HasMedia\HasMediaThumbsTrait;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\Interfaces\HasMediaConversions;
use Spatie\MediaLibrary\Media;

class Employee extends Model implements HasMediaCollections, HasMediaConversions
{
    use HasMediaCollectionsTrait;
    use HasMediaThumbsTrait;
    
    
    protected $fillable = [
        "name",
        "is_at_work",
        "last_seen_at",
        "is_published",
    
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

    /* ************************ MEDIA ************************* */

    public function registerMediaCollections() {
      $this->addMediaCollection('avatar')
        ->accepts('image/*');
    }

    public function registerMediaConversions(Media $media = null) {
      $this->autoRegisterThumb200();

      $this->addMediaConversion('thumbnail_hd')
        ->width(600)
        ->height(600)
        ->performOnCollections('avatar');
    }

    /* ************************ SCOPE ************************ */

    public function scopePublished($query)
    {
      return $query->where('is_published', true);
    }

    /* ************************ RELATIONS ************************* */

    public function devices() {
      return $this->hasMany('App\Models\Device');
    }
}
