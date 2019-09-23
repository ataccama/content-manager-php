<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Utils\Cache\EntryKey;


    /**
     * Class ContentContainerKey
     * @package Ataccama\ContentManager\Env
     */
    class ContentContainerKey extends EntryKey
    {

        public function getPrefix(): ?string
        {
            return "contentContainer";
        }
    }