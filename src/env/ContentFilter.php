<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\IEntry;


    /**
     * Class ContentFilter
     * @package Ataccama\ContentManager\Env
     */
    class ContentFilter
    {
        const LANGUAGE = "language";
        const ALIASES = "aliases";
        const TAGS = "tags";
        const SEARCH_TERM = "term";
        const PAGE = "page";

        /** @var string[] */
        public $aliases = [];

        /** @var string[] */
        public $tags = [];

        /** @var Language */
        public $language;

        /** @var string */
        public $term;

        /** @var IEntry */
        public $page;

        /**
         * ContentFilter constructor.
         * @param array $params
         */
        public function __construct(array $params)
        {
            if (isset($params[self::LANGUAGE])) {
                if ($params[self::LANGUAGE] instanceof Language) {
                    $this->language = $params[self::LANGUAGE];
                }
            }
            if (isset($params[self::PAGE])) {
                if ($params[self::PAGE] instanceof IEntry) {
                    $this->page = $params[self::PAGE];
                }
            }
            if (isset($params[self::ALIASES])) {
                if (is_array($params[self::ALIASES])) {
                    $this->aliases = $params[self::ALIASES];
                }
            }
            if (isset($params[self::TAGS])) {
                if (is_array($params[self::TAGS])) {
                    $this->tags = $params[self::TAGS];
                }
            }
            if (isset($params[self::SEARCH_TERM])) {
                $this->term = $params[self::SEARCH_TERM];
            }
        }
    }