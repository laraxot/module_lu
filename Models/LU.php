<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;

class LU extends Model
{
    protected $fillable=['auth_user_id','handle','passwd','last_login_at','last_login_ip','owner_user_id','owner_group_id','is_active','email','group_id','banned_id','country_id','question_id','nome','cognome','ente','matr','stabi','repar','password','hash','activation_code','forgotten_password_code','birthday','last_birthday','dem_birthday','sesso','giubbotto','provincia','conosciuto','news','citta','segno','hmail','bounce','dataIscrizione','dataCancellazione','created_at','updated_at','remember_token','updated_by','created_by','email_verified_at','deleted_by','firstname','surname','token_check','is_verified'];

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_users';
    protected $primaryKey = 'auth_user_id';

    //------ MUTATORS -------
    public function getLastNameAttribute($value)
    {
        return $this->cognome;
    }

    public function getNameAttribute($value)
    {
        return $this->nome;
    }

    public function getGravatarAttribute($value)
    {
        $publicBaseUrl = 'https://www.gravatar.com/avatar/';
        $secureBaseUrl = 'https://secure.gravatar.com/avatar/';
        $default = 'https://www.somewhere.com/homestar.jpg';
        $size = 20;

        return $secureBaseUrl.\md5(\mb_strtolower(\trim($this->email))).'&s='.$size;
    }

    //------
    public function latestUsersLoggedIn()
    {
        return self::orderBy('last_login_at', 'desc')->limit(8);
    }
}
