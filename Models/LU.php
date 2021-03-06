<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;

/**
 * Modules\LU\Models\LU.
 *
 * @property int                             $auth_user_id
 * @property string|null                     $handle
 * @property string|null                     $passwd
 * @property string|null                     $lastlogin
 * @property int|null                        $owner_user_id
 * @property int|null                        $owner_group_id
 * @property string|null                     $is_active
 * @property int|null                        $enable
 * @property string|null                     $email
 * @property string|null                     $first_name
 * @property string|null                     $last_name
 * @property int|null                        $ente
 * @property int|null                        $matr
 * @property string|null                     $password
 * @property string|null                     $hash
 * @property string|null                     $activation_code
 * @property string|null                     $forgotten_password_code
 * @property string|null                     $last_login_at
 * @property string|null                     $last_login_ip
 * @property string|null                     $token_check
 * @property int|null                        $is_verified
 * @property string|null                     $remember_token
 * @property string|null                     $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|LU newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LU newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LU query()
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereEnte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereForgottenPasswordCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereLastlogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereMatr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereOwnerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU wherePasswd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereTokenCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereUpdatedBy($value)
 * @mixin \Eloquent
 * @property int|null    $group_id
 * @property int|null    $banned_id
 * @property int|null    $country_id
 * @property int|null    $question_id
 * @property string|null $nome
 * @property string|null $cognome
 * @property int|null    $stabi
 * @property int|null    $repar
 * @property string|null $provincia
 * @property string|null $conosciuto
 * @property string|null $news
 * @property string|null $citta
 * @property int|null    $segno
 * @property int|null    $hmail
 * @property int|null    $bounce
 * @property string|null $dataIscrizione
 * @property int|null    $dataCancellazione
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereBannedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereBounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereCitta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereCognome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereConosciuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereDataCancellazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereDataIscrizione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereHmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereNews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereRepar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereSegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LU whereStabi($value)
 */
class LU extends BaseModel {
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_users';
}