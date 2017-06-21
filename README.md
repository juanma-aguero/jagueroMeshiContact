# jagueroMeshiContact
Fun forms plugin for AmulenCMS

## Install

Require with composer:

```
  composer require jaguero/meshi-contact
```

Run Amulen install command:
```
  php app/console amulen:plugin:register "Jaguero\MeshiContactBundle\JagueroMeshiContactBundle"
```

Update DB schema:
```
  php app/console doctrine:schema:update --force
```

### For ReCaptcha:

This plugin is using the excellent bundle: https://github.com/excelwebzone/EWZRecaptchaBundle

**Quick install:**

Register the lib bundle:

```php
<?php

// in AppKernel::registerBundles()
$bundles = array(
    // ...
    new EWZ\Bundle\RecaptchaBundle\EWZRecaptchaBundle(),
    // ...
);
```

Add the following to your config file:

``` yaml
# app/config/config.yml

ewz_recaptcha:
    public_key:  here_is_your_public_key
    private_key: here_is_your_private_key
    # Not needed as "%kernel.default_locale%" is the default value for the locale key
    locale_key:  %kernel.default_locale%
```
