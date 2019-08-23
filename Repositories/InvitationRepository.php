<?php
namespace Modules\LU\Repositories;

//---base
use Modules\Xot\Repositories\XotBaseRepository;

class InvitationRepository extends XotBaseRepository{
    /**
     * Specify Model class name
     *
     * @return string
     */
    protected $model = 'Modules\LU\Models\Invitation';
}