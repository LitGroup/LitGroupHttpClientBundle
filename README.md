LitGroupHttpClientBundle
========================

🚫 **(This project is no longer maintained.)**

This bundle integrates [React Http Client][1] into the Symfony 2 environment.

[![Latest Stable Version](https://poser.pugx.org/litgroup/http-client-bundle/v/stable.svg)](https://packagist.org/packages/litgroup/http-client-bundle)
[![Total Downloads](https://poser.pugx.org/litgroup/http-client-bundle/downloads.svg)](https://packagist.org/packages/litgroup/http-client-bundle)
[![Latest Unstable Version](https://poser.pugx.org/litgroup/http-client-bundle/v/unstable.svg)](https://packagist.org/packages/litgroup/http-client-bundle)
[![License](https://poser.pugx.org/litgroup/http-client-bundle/license.svg)](https://packagist.org/packages/litgroup/http-client-bundle)

Master branch status:
[![Build Status](https://travis-ci.org/LitGroup/LitGroupHttpClientBundle.svg?branch=master)](https://travis-ci.org/LitGroup/LitGroupHttpClientBundle)



Installation
------------

Use [composer][2] to install _LitGroupHttpClientBundle_:

```json
"require": {
    "litgroup/http-client-bundle": "0.1.*"
}
```

Register _LitGroupHttpClientBundle_ and related bundles in the AppKernel:

```php
<?php // AppKernel.php

use Symfony\Component\HttpKernel\Kernel;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new LitGroup\Bundle\EventLoopBundle\LitGroupEventLoopBundle(),
            new LitGroup\Bundle\DnsBundle\LitGroupDnsBundle(),
            new LitGroup\Bundle\HttpClientBundle\LitGroupHttpClientBundle(),
        ];
        // ...

        return $bundles;
    }

    // ...
}
```

Configuration
-------------

_No configuration needed this time._

Usage
-----

Use `litgroup_http_client.client` service to receive `React\HttpClient\Client`.

See [React Http Client][1] library documentation for more details.

License
-------
See details in the `Resources/meta/LICENSE`.

[1]: https://github.com/reactphp/http-client
[2]: http://getcomposer.org
