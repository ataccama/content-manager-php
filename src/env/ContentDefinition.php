<?php

    namespace Ataccama\ContentManager\Env;

    use Nette\Utils\Strings;


    /**
     * Class ContentDefinition
     * @package Ataccama\ContentManager\Env
     */
    class ContentDefinition
    {
        /** @var string */
        public $name;

        /** @var string */
        public $body;

        /** @var Language */
        public $language;

        /** @var string[] */
        public $tags;

        /**
         * ContentDefinition constructor.
         * @param string      $name
         * @param Language    $language
         * @param string|null $body
         * @param Tag[]       $tags
         */
        public function __construct(string $name, Language $language, string $body = null, array $tags = [])
        {
            $this->name = str_replace("-", "_", Strings::webalize($name));
            $this->body = $body;
            $this->language = $language;
            $this->tags = $tags;
        }
    }