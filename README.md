# TwitchTV SDK for PHP

This is unofficial [TwitchTV SDK for PHP](https://github.com/decrypted/Twitch-SDK), a fork of https://github.com/jofner/Twitch-SDK as it got UNMAINTAINED. This will aim to do at least basic patches, and it is running in production.

## Requirements

TwitchTV SDK for PHP requires PHP 5.3.0 or later with cURL extension enabled.

## Installation

The best way to install TwitchTV SDK is use [Composer](http://getcomposer.org/).

### Download the bundle using Composer

```bash
$ composer require 'decrypted/twitch-sdk:2.0.*'
```

The downloaded package includes the `src` directory. This directory contains
the source code of TwitchTV SDK for PHP. This is the only directory
that you will need in order to deploy your application.

## Getting started

Basic functions starts with standard naming policy (user*, channel* etc.) -
`userGet()` for example. Authenticated functions have auth* prefixes,
like `authUserGet()`.

### SDK initialization in your project

#### With autoloader (Frameworks etc.)

```php
use \jofner\SDK\TwitchTV\TwitchSDK;

$twitch = new TwitchSDK;
...
```

#### Without Autoloader

```php
require '/path/to/libs/jofner/SDK/TwitchTV/TwitchSDK.php';
require '/path/to/libs/jofner/SDK/TwitchTV/TwitchSDKException.php';

use \jofner\SDK\TwitchTV\TwitchSDK;
use \jofner\SDK\TwitchTV\TwitchSDKException;

$twitch = new TwitchSDK;
...
```

### Usage

#### Basic usage (public functions only)

```php
$twitch = new TwitchSDK;
$channel = $twitch->channelGet('channelname');
...
```

#### Authenticated functions usage

```php
$twitch_config = array(
    'client_id' => 'your_twitch_app_client_id',
    'client_secret' => 'your_twitch_app_client_secret',
    'redirect_uri' => 'your_twitch_app_redirect_uri',
);

$twitch = new TwitchSDK($twitch_config);
$loginURL = $twitch->authLoginURL('user_read');
...
```

More examples you can find soon at Wiki pages.

### Error: curl SSL certificate problem: self signed certificate in certificate chain

If you getting this error, you have probably out of date CA root certificates.
Be sure you have in your php.ini set path to certificate in curl.cainfo = "..."

You can get cacert.pem from this site https://curl.haxx.se/docs/caextract.html

## Licenses

Refer to the LICENSE.md file for license information

## Reference

[TwitchTV](http://www.twitch.tv/),
[TwitchTV API](https://github.com/justintv/Twitch-API),
[Composer](http://getcomposer.org/)
