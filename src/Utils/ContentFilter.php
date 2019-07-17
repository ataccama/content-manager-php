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
     * @property-read string   $tag
     * @property-read string   $term
     * @property-read string   $slug
     * @property-read Language $language
     * @property-read int      $id
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

        const ID = 1;
        const TAG = 2;
        const TERM = 3;
        const SLUG = 4;

        /**
         * ContentFilter constructor.
         * @param Language $language
         * @param array    $params
         */
        public function __construct(Language $language, array $params)
        {
            $this->language = $language;

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
         * @return string
         */
        public function getTag(): string
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
         * @return string
         */
        public function getTerm(): string
        {
            return $this->term;
        }

        /**
         * @return string
         */
        public function getSlug(): string
        {
            return $this->slug;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

//        /**
//         * Example:
//         * $tagsByNamespaces = ["namespace"=>["tag_1","tag_2]]
//         *
//         * @param array    $tagsByNamespaces
//         * @param Language $language
//         * @return array
//         * @throws NotInitialized
//         */
//        public static function getFilters(
//            array $tagsByNamespaces,
//            Language $language
//        ): array {
//            $filters = [];
//
//            foreach ($tagsByNamespaces as $namespace => $tags) {
//                foreach ($tags as $tag) {
//                    $filters[$namespace][] = new ContentFilter($tag, $language);
//                }
//            }
//
//            return $filters;
//        }
    }