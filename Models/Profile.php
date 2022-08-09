<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// --------- models --------

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\LU\Models\Traits\HasProfileTrait;
// --- TRAITS ---
use Modules\Xot\Models\Traits\WidgetTrait;

/**
 * Modules\LU\Models\Profile.
 *
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Widget[] $containerWidgets
 * @property int|null                                                              $container_widgets_count
 * @property string|null                                                           $email
 * @property string|null                                                           $first_name
 * @property string|null                                                           $full_name
 * @property string|null                                                           $guid
 * @property string|null                                                           $image_src
 * @property string|null                                                           $lang
 * @property string|null                                                           $post_type
 * @property string|null                                                           $subtitle
 * @property string|null                                                           $title
 * @property string|null                                                           $txt
 * @property string|null                                                           $user_handle
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Image[]  $images
 * @property int|null                                                              $images_count
 * @property \Modules\Lang\Models\Post|null                                        $post
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Lang\Models\Post[]  $posts
 * @property int|null                                                              $posts_count
 * @property \Modules\Xot\Models\Profile|null                                      $profile
 * @property mixed                                                                 $url
 * @property \Modules\LU\Models\User|null                                          $user
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Widget[] $widgets
 * @property int|null                                                              $widgets_count
 *
<<<<<<< HEAD
=======
 * @property int $id
 * @property int|null $user_id
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property string|null $deleted_by
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $zibibbo
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Widget[] $containerWidgets
 * @property-read int|null $container_widgets_count
 * @property-read string|null $full_name
 * @property string|null $guid
 * @property string|null $image_src
 * @property-read string|null $lang
 * @property-read string|null $post_type
 * @property string|null $subtitle
 * @property string|null $title
 * @property string|null $txt
 * @property-read string|null $user_handle
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Image[] $images
 * @property-read int|null $images_count
 * @property-read \Modules\Lang\Models\Post|null $post
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Lang\Models\Post[] $posts
 * @property-read int|null $posts_count
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property-read \Modules\Xot\Models\Profile|null $profile
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 1f4a4e6 (.)
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> 2dbbdf7 (up)
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> 8a90865 (up)
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 23a412e (.)
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 1f4a4e6 (.)
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> 2dbbdf7 (up)
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
 * @property-write mixed $url
 * @property-read \Modules\LU\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Widget[] $widgets
 * @property-read int|null $widgets_count
>>>>>>> 06817bb (.)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile ofLayoutPosition($layout_position)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
<<<<<<< HEAD
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile whereZibibbo($value)
>>>>>>> c36e7a4 (.)
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 * @mixin \Eloquent
 */
class Profile extends BaseModelLang {
    // use PrivacyTrait;
    use HasFactory;
    // use GeoTrait;
    use HasProfileTrait;
    use WidgetTrait;

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'user_id', 'phone', 'email', 'bio'];

    // ------- RELATIONSHIP ----------
}// end model
