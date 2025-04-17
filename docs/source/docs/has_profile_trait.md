---
title: Trait HasProfileTrait
description: Trait HasProfileTrait
extends: _layouts.documentation
section: content
---

# Trait HasProfileTrait {#trait-has-profile-trait}

Questo trait è quello che collega ogni istanza di un utente, quindi del modello User.php con quello del relativo profilo, aggiungendo il trait al modello Profile.php.

Esempio:

```php

namespace Modules\Nome_Modulo_Principale\Models;

use Modules\LU\Models\Traits\HasProfileTrait;

class Profile extends BaseModelLang {
    use HasProfileTrait;
    ...
    ...
```