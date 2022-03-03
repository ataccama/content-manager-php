<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\IEntry;
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
        const PAGE = "page";
        const CONTENT_ID = "content_id";

        /** @var string[] */
        public array $aliases = [];

        /** @var string[] */
        public array $tags = [];

        public ?Language $language;
        public ?string $term;
        public ?IEntry $page;
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
            if (isset($params[self::CONTENT_ID]) && Validators::isNumericInt($params[self::CONTENT_ID])) {
                $this->contentId = (int) $params[self::CONTENT_ID];
            }
        }
    }