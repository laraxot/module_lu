<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\Invitation
 *
 * @method static \Modules\LU\Database\Factories\InvitationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Invitation query()
 * @mixin \Eloquent
 */
class Invitation extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['email', 'invitation_token', 'registered_at'];

    // ------------- FUNZIONI PER FAR FUNZIONARE IL PACCHETTO ------------
    public function generateInvitationToken(): void {
        $this->invitation_token = substr(md5(rand(0, 9).$this->email.time()), 0, 32);
    }

    public function getLink(): string {
        return urldecode(route('register').'?invitation_token='.$this->invitation_token);
    }
}// end class
