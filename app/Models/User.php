<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\UserStatus;
use App\Enums\UserType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sortable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'login',
        'email',
        'password',
        'admin',
        'status',
        'must_change_passwd',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'type' => UserType::class,
        'status' => UserStatus::class,
        'email_verified_at' => 'datetime',
    ];

    /**
     * The attributes that should be date cast.
     *
     * @var array<string>
     */
    protected $dates = [
        'last_login_at',
        'password_change_at',
        'created_at',
        'updated_at',
    ];

    /**
     * The attributes that should be sort
     *
     * @var array<string>
     */
    public $sortable = [
        'login',
        'name',
        'admin',
        'created_at',
        'last_login_at'
    ];

     /**
     * The relation
     */
    public function users()  { return $this->belongsToMany(User::class, 'groups_users', 'group_id', 'user_id'); }
    public function groups() { return $this->belongsToMany(User::class, 'groups_users', 'user_id', 'group_id');  }
    public function email_addresses() { return $this->hasMany(EmailAddress::class); }
    public function members() { return $this->hasMany(Member::class); }

    /**
     * Accessor
     */

    public function isUser(): bool
    {
        return $this->type === UserType::USER;
    }

    public function isGroup(): bool
    {
        return $this->type === UserType::GROUP;
    }

    public function isActive(): bool
    {
        return $this->status === UserStatus::ACTIVE;
    }

    public function isRegisterd(): bool
    {
        return $this->status === UserStatus::REGISTERD;
    }

    public function isLocked(): bool
    {
        return $this->status === UserStatus::LOCKED;
    }

    /**
     * The "booting" method of the model
     * 
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        self::creating(function($user){
            if($user->type === UserType::USER){
                $user->password_change_at = now();
            } elseif($user->type === UserType::GROUP){
                $user->login = base64_encode($user->name);
                $user->email = base64_encode($user->name);
                $user->password = Hash::make($user->name);
                $user->status = UserStatus::ACTIVE;
                $user->must_change_password = false;
            }
        });
        self::created(function($user){
            if($user->type === UserType::USER){
                $user->email_addresses()->create([
                    'email' => $user->email,
                    'is_default' => true,
                    'notify' => true,
                ]);
            }
        });
        self::updating(function($user){
            if($user->isDirty('password')){
                $user->must_change_password = false;
                $user->password_change_at = now();
            }
        });
        self::updated(function($user){
            if($user->type === UserType::USER){
                $address = $user->email_addresses()->whereIsDefault(true)->first();
                $address->email = $user->email;
                $address->save();
            }
        });
    }
}
