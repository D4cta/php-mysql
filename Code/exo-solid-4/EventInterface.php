<?php

interface EventInterface
{
    /**
     * Returns the name of the event
     *
     * @return string
     */
    public function name() : string;

    /**
     * Returns the list of properties of the event
     *
     * @return array
     */
    public function fields() : array;

    /**
     * Returns the payload of the event
     *
     * @return array
     */
    public function payload() : array;

    /**
     * If the event is actionnable, returns the list of available actions
     *
     * @return array
     */
    public function action() : array;

}