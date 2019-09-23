<?php

    namespace Ataccama\ContentManager\Env;

    /**
     * Interface IModifiable
     * @package Ataccama\ContentManager\Env
     */
    interface IModifiable
    {
        public function addModifier(IModifier $modifier): void;
    }