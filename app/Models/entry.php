<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class entry extends Model
{
    use HasFactory;
    protected $table="entry";
    protected $primaryKey="id";

    public function workout()
    {
    	return $this->hasone('App\Models\workout','id','workout_id');
    }

    public function bodyshape()
    {
    	return $this->hasone('App\Models\bodyshape','id','bodyshape_id');
    }

    public function member()
    {
    	return $this->hasone('App\Models\members','id','member_id');
    }
}
