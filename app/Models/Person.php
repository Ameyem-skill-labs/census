<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use App\Models\PlaceRelated\Village;
use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage; // Import Storage facade

class Person extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'village_id', 'ward_number', 'street', 'pincode', 'door_number',
        'surname', 'name', 'relative_name', 'mobile', 'date_of_birth',
        'sex', 'marriage_status', 'blood_group', 'education', 'occupation','avatar',
        'created_by_id', 'edited_by_id', 'is_submitted', 'is_approved', 'approved_by_id'
    ];

    public function village()
    {
        return $this->belongsTo(Village::class, 'village_id');
    }

    public function created_by()
    {
        return $this->belongsTo(User::class, 'created_by_id');
    }

    public function approved_by()
    {
        return $this->belongsTo(User::class, 'approved_by_id');
    }
    /**
     * Get the avatar's URL.
     *
     * @param  string  $value
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        // Check if the avatar is a URL or a file path
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            // If it's already a URL, just return it
            return $value;
        } elseif ($value) {
            // If it's a file path, convert it to a URL
            // Adjust the path if necessary based on your storage configuration
            return url($value);
        }

        // Return a default image or null if no avatar is set
        return null; // or return url('path/to/default/avatar.jpg');
    }


    // Add any other necessary relationships

}
