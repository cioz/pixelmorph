<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{

    public function skillscads()
    {
        return $this->belongsTo('skillscats');
    }
}
