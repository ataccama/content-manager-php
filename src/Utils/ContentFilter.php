<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 16:04
     */

    namespace Ataccama\ContentManager\Utils;

    use Ataccama\Exceptions\NotInitialized;
    use Nette\SmartObject;


    /**
     * Class ContentFilter
     * @package Ataccama\ContentManager\Utils
     * @property-read string|null $tag
     * @property-read string|null $term
     * @property-read string|null $slug
     * @property-read string      $namespace
     * @property-read Language    $language
     * @property-read int|null    $id
     */
    class ContentFilter
    {
        use SmartObject;

        /** @var string */
        protected $tag, $term, $slug;

        /** @var Language */
        protected $language;

        /** @var int */
        protected $id;

        /** @var string */
        protected $namespace;

        const ID = 1;
        const TAG = 2;
        const TERM = 3;
        const SLUG = 4;

        /**
         * ContentFilter constructor.
         * @param string   $namespace
         * @param Language $language
         * @param array    $params
         */
        public function __construct(string $namespace, Language $language, array $params = [])
        {
            $this->language = $language;
            $this->namespace = $namespace;

            if (isset($params[self::ID])) {
                $this->pageId = $params[self::ID];
            }
            if (isset($params[self::TAG])) {
                $this->tag = $params[self::TAG];
            }
            if (isset($params[self::TERM])) {
                $this->term = $params[self::TERM];
            }
            if (isset($params[self::SLUG])) {
                $this->slug = $params[self::SLUG];
            }
        }

        /**
         * @return string|null
         */
        public function getTag(): ?string
        {
            return $this->tag;
        }

        /**
         * @return Language
         */
        public function getLanguage(): Language
        {
            return $this->language;
        }

        /**
         * @return string|null
         */
        public function getTerm(): ?string
        {
            return $this->term;
        }

        /**
         * @return string|null
         */
        public function getSlug(): ?string
        {
            return $this->slug;
        }

        /**
         * @return int|null
         */
        public function getId(): ?int
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getNamespace(): string
        {
            return $this->namespace;
        }
    }