<?php


namespace Larabook\Statuses;


/**
 * Basically a data transfer object
 */
class PublishStatusCommand
{

    public $body;
    public $userId;

    function __construct($body, $userId)
    {
        $this->body = $body;
        $this->userId = $userId;
    }


}