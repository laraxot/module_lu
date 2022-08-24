<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// --------- models --------

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\LU\Models\Traits\HasProfileTrait;
// --- TRAITS ---
use Modules\Xot\Models\Traits\WidgetTrait;

<<<<<<< HEAD
/**
 * Modules\LU\Models\Profile
 *
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
 * @property-read \Modules\Mediamonitor\Models\Profile|null $profile
=======
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 56a14ae (.)
=======
>>>>>>> c36e7a4 (.)
=======
>>>>>>> d84d2e0 (.)
=======
>>>>>>> 4dbe463 (.)
 * @property-read \Modules\Xot\Models\Profile|null $profile
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 1f4a4e6 (.)
<<<<<<< HEAD
>>>>>>> 06817bb (.)
=======
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> 2dbbdf7 (up)
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
<<<<<<< HEAD
>>>>>>> c36e7a4 (.)
=======
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> 8a90865 (up)
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 23a412e (.)
<<<<<<< HEAD
>>>>>>> 4dbe463 (.)
=======
=======
>>>>>>> 56a14ae (.)
<<<<<<< HEAD
>>>>>>> a77ba72 (.)
=======
=======
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
>>>>>>> c36e7a4 (.)
<<<<<<< HEAD
>>>>>>> 4bbae29 (.)
=======
=======
>>>>>>> d84d2e0 (.)
<<<<<<< HEAD
>>>>>>> cacd8c7 (.)
=======
=======
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> 23a412e (.)
>>>>>>> 4dbe463 (.)
<<<<<<< HEAD
>>>>>>> 56d6612 (rebase)
=======
=======
=======
>>>>>>> e297561 (rebase)
=======
>>>>>>> 4253173 (rebase)
=======
>>>>>>> a6f2eca (rebase)
=======
>>>>>>> 1a47b29 (rebase)
 * @property-read \Modules\Xot\Models\Profile|null $profile
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> e29ae97 (.)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 2c8286f (rebase)
<<<<<<< HEAD
>>>>>>> 0549ecc (rebase)
=======
=======
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> f0849a8 (up)
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> e297561 (rebase)
<<<<<<< HEAD
>>>>>>> 49d254a (rebase)
=======
=======
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
>>>>>>> 4253173 (rebase)
<<<<<<< HEAD
>>>>>>> a54fd15 (rebase)
=======
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
>>>>>>> e29ae97 (.)
>>>>>>> 76079dd (rebase)
<<<<<<< HEAD
>>>>>>> c02055b (rebase)
=======
=======
=======
 * @property-read \Modules\Xot\Models\Profile|null $profile
>>>>>>> f0849a8 (up)
>>>>>>> a6f2eca (rebase)
<<<<<<< HEAD
>>>>>>> 58d337f (rebase)
=======
=======
=======
 * @property-read Profile|null $profile
>>>>>>> 86b6983 (up)
>>>>>>> 1a47b29 (rebase)
>>>>>>> e312ff0 (rebase)
 * @property-write mixed $url
 * @property-read \Modules\LU\Models\User|null $user
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\Xot\Models\Widget[] $widgets
 * @property-read int|null $widgets_count
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile ofLayoutPosition($layout_position)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
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
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang withPost(string $guid)
 * @mixin \Eloquent
 */
class Profile extends BaseModelLang {
=======
class Profile extends BaseModelLang
{
>>>>>>> 51717d2 (up)
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
