<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'due_date', 'status'];

    public static array $validationRules = [
        'title' => 'required',
        'description' => 'nullable',
        'due_date' => 'nullable',
        'status' => 'required|boolean'
    ];

    public function complete(): void
    {
        $this->status = 1;
        $this->save();
    }
}
