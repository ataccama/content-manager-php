<?php

    namespace Ataccama\ContentManager\Env;

    /**
     * Class TagDefinition
     * @package Ataccama\ContentManager\Env
     */
    class TagDefinition
    {
        /** @var string */
        public $name;

        /**
         * TagDefinition constructor.
         * @param string $name
         */
        public function __construct(string $name)
        {
            $this->name = $name;
        }
    }