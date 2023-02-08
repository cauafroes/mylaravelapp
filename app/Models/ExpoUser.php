<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpoUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'expo_token'
    ];

    public function setPushToken ($token){
        $exists = $this->where('expo_token', $token)->first();
        if ($exists) return response()->json('ja existe');

        $this->fill([
            'expo_token' => $token
        ])->save();

        return response()->json(['token' => $this->expo_token]);
    }

}
