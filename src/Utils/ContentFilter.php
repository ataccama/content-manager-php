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
     * @property-read Language $language
     */
    class ContentFilter
    {
        use SmartObject;

        /** @var string */
        protected $tag;

        /** @var Language */
        protected $language;

        /**
         * ContentFilter constructor.
         * @param string   $tag
         * @param Language $language
         * @throws NotInitialized
         */
        public function __construct(string $tag, Language $language)
        {
            if (empty($tag)) {
                throw new NotInitialized("Tag MUST be set.");
            }

            $this->tag = $tag;
            $this->language = $language;
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
         * @param array    $tagsByNamespaces
         * @param Language $language
         * @return array
         * @throws NotInitialized
         */
        public static function getFilters(
            array $tagsByNamespaces = ["namespace" => ["tag1", "tag2"]],
            Language $language
        ): array {
            $filters = [];

            foreach ($tagsByNamespaces as $namespace => $tags) {
                foreach ($tags as $tag) {
                    $filters[$namespace][] = new ContentFilter($tag, $language);
                }
            }

            return $filters;
        }
    }