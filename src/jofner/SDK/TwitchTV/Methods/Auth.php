<?php

namespace jofner\SDK\TwitchTV\Methods;

use jofner\SDK\TwitchTV\TwitchException;
use jofner\SDK\TwitchTV\TwitchRequest;

/**
 * Authenticate method class for TwitchTV API SDK for PHP
 *
 * @author Josef Ohnheiser <jofnercz@gmail.com>
 * @license https://github.com/jofner/Twitch-SDK/blob/master/LICENSE.md MIT
 * @homepage https://github.com/jofner/Twitch-SDK
 */

class Auth
{
    /** @var TwitchRequest */
    protected $request;

    const URI_AUTH = 'oauth2/authorize';
    const URI_AUTH_TOKEN = 'oauth2/token';

    public function __construct(TwitchRequest $request)
    {
        $this->request = $request;
    }

    /**
     * Get login URL for authentication
     * @param string $queryString
     * @return string
     * @throws TwitchException
     */
    public function getLoginURL($queryString)
    {
        return $this->request->request(self::URI_AUTH . $queryString);
    }

    /**
     * Get authentication access token
     * @param string $queryString
     * @return \stdClass
     * @throws TwitchException
     */
    public function getAccessToken($queryString)
    {
        return $this->request->request(self::URI_AUTH_TOKEN, 'POST', $queryString);
    }
}
