<?php

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;

/**
 * https://laraveldaily.com/laravel-auth-make-registration-invitation-only/.
 *
 * @property int $id
 * @property string $email
 * @property string|null $invitation_token
 * @property string|null $registered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereInvitationToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereRegisteredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Invitation extends BaseModel {
    //protected $connection = 'liveuser_general';
    /**
     * @var string
     */
    protected $table = 'invitations';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string[]
     */
    protected $fillable = ['email', 'invitation_token', 'registered_at'];

    //------------- FUNZIONI PER FAR FUNZIONARE IL PACCHETTO ------------
    public function generateInvitationToken() {
        $this->invitation_token = substr(md5(rand(0, 9).$this->email.time()), 0, 32);
    }

    /**
     * @return string
     */
    public function getLink() {
        return urldecode(route('register').'?invitation_token='.$this->invitation_token);
    }
}//end class
