<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;


    use Ataccama\Common\Utils\Cache\StringKey;


    /**
     * Class ContentContainerKey
     * @package Ataccama\ContentManager\Env
     */
    class ContentContainerKey extends StringKey
    {
        public function getPrefix(): ?string
        {
            return "contentContainer";
        }
    }