<?php
namespace Modules\LU\Models;
use Illuminate\Database\Eloquent\Model;

/**
* https://laraveldaily.com/laravel-auth-make-registration-invitation-only/
*
**/

class Invitation extends Model{ 
	protected $connection = 'liveuser_general'; 
    protected $table = 'invitations';
    protected $primaryKey = 'id';
    protected $fillable = [ 'email', 'invitation_token', 'registered_at', ];
    //------------- FUNZIONI PER FAR FUNZIONARE IL PACCHETTO ------------
    public function generateInvitationToken() {
    	$this->invitation_token = substr(md5(rand(0, 9) . $this->email . time()), 0, 32);
	}

	public function getLink() {
    	return urldecode(route('register') . '?invitation_token=' . $this->invitation_token);
	}

}//end class