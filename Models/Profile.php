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
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Profile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BaseModelLang ofItem(string $guid)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile ofLayoutPosition($layout_position)
 * @method static \Illuminate\Database\Eloquent\Builder|Profile query()
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
