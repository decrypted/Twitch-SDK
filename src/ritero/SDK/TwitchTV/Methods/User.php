<?php

namespace ritero\SDK\TwitchTV\Methods;

use ritero\SDK\TwitchTV\TwitchException;
use ritero\SDK\TwitchTV\TwitchRequest;

/**
 * TwitchTV API SDK for PHP
 *
 * Users method class
 *
 * @author Josef Ohnheiser <ritero@ritero.eu>
 * @license https://github.com/jofner/Twitch-SDK/blob/master/LICENSE.md MIT
 * @homepage https://github.com/jofner/Twitch-SDK
 */
class User
{
    /** @var TwitchRequest */
    protected $request;

    const URI_USER_AUTH = 'user';
    const URI_STREAMS_FOLLOWED_AUTH = 'streams/followed';

    public function __construct()
    {
        $this->request = new TwitchRequest;
    }

    /**
     * Get the authenticated user
     *  - requires scope 'user_read'
     * @see https://github.com/justintv/Twitch-API/blob/master/v3_resources/users.md#get-user
     * @param string
     * @return \stdClass
     * @throws TwitchException
     */
    public function getUser($queryString)
    {
        $this->request->setApiVersion(3);

        return $this->request->request(self::URI_USER_AUTH . $queryString);
    }

    /**
     * List the live streams that the authenticated user is following
     *  - requires scope 'user_read'
     * @see https://github.com/justintv/Twitch-API/blob/master/v3_resources/users.md#get-streamsfollowed
     * @param string $queryString
     * @return \stdClass
     * @throws TwitchException
     */
    public function getFollowedStreams($queryString)
    {
        $this->request->setApiVersion(3);

        return $this->request->request(self::URI_STREAMS_FOLLOWED_AUTH . $queryString);
    }
}