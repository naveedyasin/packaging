<?php


namespace App\Exceptions;


class LevelDeniedException extends AccessDeniedException
{

    /**
     * LevelDeniedException constructor.
     *
     * @param $level
     */
    public function __construct($level)
    {
        $this->message = sprintf("You don't have a required [%s] level.", $level);
    }
}
