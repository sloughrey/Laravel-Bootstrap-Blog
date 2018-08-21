<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    
    /**
     * Allows the use of a static Task::incomplete()
     * Scope must be prefixed (this makes it a query scope)
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Illiminate/Database/Eloquent/Builder
     */
    public function scopeIncomplete($query){
        return  $query->where('completed', 0);
    }

    /**
     * Returns a collection of all the completed tasks
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return Illiminate/Database/Eloquent/Builder
     */
    public function scopeComplete($query){
        return $query->where('completed', 1);
    }

}
