<?php

namespace App\Models\User;

use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';

    public function category()
    {
        return $this->hasOne(ExpenseCategory::class, 'id','category_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id','user_id');
    }
}
