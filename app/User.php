<?php

    namespace App;

    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Zizaco\Entrust\Traits\EntrustUserTrait;

    /**
     * App\User
     * @property integer $id
     * @property string $name
     * @property string $email
     * @property string $password
     * @property string $remember_token
     * @property \Carbon\Carbon $created_at
     * @property \Carbon\Carbon $updated_at
     * @method static \Illuminate\Database\Query\Builder|\App\User whereId($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereName($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereEmail($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User wherePassword($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereRememberToken($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereCreatedAt($value)
     * @method static \Illuminate\Database\Query\Builder|\App\User whereUpdatedAt($value)
     * @mixin \Eloquent
     */
    class User extends Authenticatable
    {

        use EntrustUserTrait;
        /**
         * The attributes that are mass assignable.
         * @var array
         */
        protected $fillable = [
            'nick_name', 'email', 'password','first_name','middle_initial','last_name', 'photo'
        ];


        /**
         * The attributes excluded from the model's JSON form.
         * @var arraypa
         */
        protected $hidden = [
            'password', 'remember_token',
        ];


        public function frmAccount()
        {
            return $this->hasMany('\App\Models\Account', 'id', 'assigned_to');
        }

        public function frmCampaign()
        {
            return $this->hasMany('\App\Models\Campaign', 'id', 'assigned_to');
        }

        public function role()
        {
            return $this->hasOne('App\Models\Role', 'id', 'role_id');
        }

    }
