<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $guarded =[];
    public function profileImage()
    {
         $imagePath=  ($this->image) ?  $this->image : 'profile//var/www/html/Dev/storage/app/public/profile/VqUCmnf3D2Ua83xfPYCrA0scFCDRap8SzWrCReRx.jpg';
       return  '/storage/' . $imagePath;
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
