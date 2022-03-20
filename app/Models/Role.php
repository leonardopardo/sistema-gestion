<?php


namespace App\Models;


use App\Traits\SuperAdminPolicy;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use SuperAdminPolicy;
}
