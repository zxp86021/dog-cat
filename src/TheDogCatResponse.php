<?php

namespace TheDogCat;

use TheDogCat\Exceptions\TheDogCatException;

/**
 * Class TheDogCatResponse
 *
 * @package TheDogCat
 */
class TheDogCatResponse
{
    /**
     * The HTTP status code response from API.
     *
     * @var null|int
     */
    protected $httpStatusCode;

    /**
     * The headers returned from API request.
     *
     * @var array
     */
    protected $headers;

    /**
     * The raw body of the response from API request.
     *
     * @var string
     */
    protected $body;

    /**
     * The decoded body of the API response.
     *
     * @var array
     */
    protected $decodedBody = [];

    /**
     * API Endpoint used to make the request.
     *
     * @var string
     */
    protected $endPoint;

    /**
     * The exception thrown by this request.
     *
     * @var TheDogCatException
     */
    protected $thrownException;
}