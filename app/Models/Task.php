<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   const STATUS_COMPLETED = 1;
   const STATUS_NOTDONE = 0;
}
