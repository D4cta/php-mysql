<?php

class PushEvent implements EventInterface
{
    public function name() : string
    {
        return 'PushEvent';
    }

    public function fields() : array
    {
        return [
            'name' => $this->name,
            'priority' => 999,
        ];
    }

    public function payload() : array
    {
        return [
            'cost' => 0,
            'from' => 'https://github.com/api/v3/push',
        ];
    }

    /**
     * This event is not actionnable
     */
    public function action() : array
    {
        return [];
    }
}
