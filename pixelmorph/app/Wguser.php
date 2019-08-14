<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Wguser extends Model
{

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $table = 'wg_users';
}
