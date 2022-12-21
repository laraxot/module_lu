---
title: Roles
description: Roles
extends: _layouts.documentation
section: content
---

# Roles and Permissions {#roles}

User can have some roles and permissions.

Roles and Permissions are Spatie Tags (https://spatie.be/docs/laravel-tags/v4/introduction).

### Role

A role is what the user is.

For example, a user could be:

- director
- manager
- officer
- employee
- end user
- etc

### Permission

Every role can have some permissions:

For example, the director could:

- add_users
- delete_users
- change_user_data
- check_user_data
- etc

While a employee can only:

- check_user_data


#### Every *permissions can be set for every role*.
#### Every *user has one or some roles associated*.

You can add permissions and roles using the top buttons. 

You can enable permissions using the checkboxes under every role.