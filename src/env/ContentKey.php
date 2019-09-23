<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Utils\Cache\EntryKey;


    /**
     * Class ContentKey
     * @package Ataccama\ContentManager\Env
     */
    class ContentKey extends EntryKey
    {
        /** @var int */
        private $languageId;

        /**
         * ContentKey constructor.
         * @param IEntry $entry
         * @param IEntry $language
         */
        public function __construct(IEntry $entry, IEntry $language)
        {
            parent::__construct($entry);
            $this->languageId = $language->id;
        }

        public function getPrefix(): ?string
        {
            return $this->languageId . "_content";
        }
    }