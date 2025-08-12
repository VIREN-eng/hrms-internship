<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'google_id',
        'google_token',
        'google_refresh_token',
        'google_avatar',

    ];


    public function employee()
    {
        return $this->hasOne(Employee::class, 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_members')->withTimestamps();
    }
    public function assignedTasks()
    {
        return $this->belongsToMany(Task::class, 'task_members');
    }
    public function taskComments()
    {
        return $this->hasMany(TaskComment::class);
    }
    public function timesheets()
    {
        return $this->hasMany(Timesheet::class);
    }
    public function leaveTypes()
    {
        return $this->hasMany(LeaveType::class);
    }
    public function salaryStructure()
    {
        return $this->hasOne(SalaryStructure::class);
    }

}