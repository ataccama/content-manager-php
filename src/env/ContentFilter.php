<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Nette\Utils\Validators;


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
        const PAGE_ID = "page_id";
        const CONTENT_ID = "content_id";

        /** @var string[] */
        public array $aliases = [];

        /** @var string[] */
        public array $tags = [];

        public ?Language $language;
        public ?string $term;
        public ?int $pageId;
        public ?int $contentId;

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
            if (isset($params[self::PAGE_ID])) {
                if (Validators::isNumericInt($params[self::PAGE_ID])) {
                    $this->pageId = $params[self::PAGE_ID];
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
            if (!empty($params[self::SEARCH_TERM])) {
                $this->term = $params[self::SEARCH_TERM];
            }
            if (isset($params[self::CONTENT_ID]) && Validators::isNumericInt($params[self::CONTENT_ID])) {
                $this->contentId = (int) $params[self::CONTENT_ID];
            }
        }
    }