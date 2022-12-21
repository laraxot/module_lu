---
title: Profiles
description: Profiles
extends: _layouts.documentation
section: content
---

# Profiles {#profiles}

Every profile is associated to one user, with a BelongsTo relationship.

Every nwidart module has its Profile.php.

This is because every Profile can "extend" the User model with its own customizations.

For example:

### Module Restaurant

```php
class Profile {
    use HasProfileTrait;

    $fillable = ['id','name','cuisine_type','delivery_area','address','...']
}
```

### Module Warehouse

```php
class Profile {
    use HasProfileTrait;

    $fillable = ['id','automation_type','stock_area_id','shipment_area_id','director_name']
}
```