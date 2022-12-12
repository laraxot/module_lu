---
title: Users
description: Users
extends: _layouts.documentation
section: content
---

# Users {#users}

User is the model for the basic user data (for "Login" and "Sign Up").

This has a HasOne relationship with a module Profile.

The relationship passes betweeen "Traits\Relationships\UserRelationship".

It's based on which is your main module in xra.php of your domain configuration.

For example:

### base_restaurant/config/localhost/xra.php

```php

return [
    'primary_lang' => 'it',
    'main_module' => 'Restaurant',
    'pub_theme' => 'PublicThemeName',
    'adm_theme' => 'AdminThemeName',
];

```

## Then the user's profile will be:

```php
Modules\\Restaurant\Models\Profile
```