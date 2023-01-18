<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\DatabaseNotificationCollection;

/**
 * Modules\LU\Models\Notification.
 *
 * @property string                          $id
 * @property string                          $type
 * @property string                          $notifiable_type
 * @property int                             $notifiable_id
 * @property array                           $data
 * @property \Illuminate\Support\Carbon|null $read_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property Model|\Eloquent                 $notifiable
 *
 * @method static DatabaseNotificationCollection|static[]            all($columns = ['*'])
 * @method static \Modules\LU\Database\Factories\NotificationFactory factory(...$parameters)
 * @method static DatabaseNotificationCollection|static[]            get($columns = ['*'])
 * @method static Builder|Notification                               newModelQuery()
 * @method static Builder|Notification                               newQuery()
 * @method static Builder|Notification                               query()
 * @method static Builder|Notification                               read()
 * @method static Builder|Notification                               unread()
 * @method static Builder|Notification                               whereCreatedAt($value)
 * @method static Builder|Notification                               whereData($value)
 * @method static Builder|Notification                               whereId($value)
 * @method static Builder|Notification                               whereNotifiableId($value)
 * @method static Builder|Notification                               whereNotifiableType($value)
 * @method static Builder|Notification                               whereReadAt($value)
 * @method static Builder|Notification                               whereType($value)
 * @method static Builder|Notification                               whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Notification extends BaseModel
{
    protected $fillable = ['id', 'type', 'notifiable_type', 'notifiable_id', 'data', 'read_at', 'created_at', 'updated_at'];

    /**
     * The "type" of the primary key ID.
     *
     * @var string
     */
    protected $keyType = 'string';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'notifications';

    /**
     * The guarded attributes on the model.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'data' => 'array',
        'read_at' => 'datetime',
    ];

    /**
     * Get the notifiable entity that the notification belongs to.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function notifiable()
    {
        return $this->morphTo();
    }

    /**
     * Mark the notification as read.
     *
     * @return void
     */
    public function markAsRead()
    {
        if (null === $this->read_at) {
            $this->forceFill(['read_at' => $this->freshTimestamp()])->save();
        }
    }

    /**
     * Mark the notification as unread.
     *
     * @return void
     */
    public function markAsUnread()
    {
        if (null !== $this->read_at) {
            $this->forceFill(['read_at' => null])->save();
        }
    }

    /**
     * Determine if a notification has been read.
     *
     * @return bool
     */
    public function read()
    {
        return null !== $this->read_at;
    }

    /**
     * Determine if a notification has not been read.
     *
     * @return bool
     */
    public function unread()
    {
        return null === $this->read_at;
    }

    /**
     * Scope a query to only include read notifications.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeRead(Builder $query)
    {
        return $query->whereNotNull('read_at');
    }

    /**
     * Scope a query to only include unread notifications.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnread(Builder $query)
    {
        return $query->whereNull('read_at');
    }

    /**
     * Create a new database notification collection instance.
     *
     * @return \Illuminate\Notifications\DatabaseNotificationCollection
     */
    public function newCollection(array $models = [])
    {
        return new DatabaseNotificationCollection($models);
    }
}
