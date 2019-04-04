<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 16:31
     */

    namespace Ataccama\Inputs;


    use Ataccama\ContentManager\Utils\Content;
    use Ataccama\ContentManager\Utils\ContentFilter;
    use Ataccama\Exceptions\ContentNotFound;


    class ContentLoader
    {
        /** @var IStorage */
        protected $storage;

        /** @var Content[] */
        private $content = [];

        /**
         * ContentManager constructor.
         * @param IStorage $storage
         */
        public function __construct(IStorage $storage)
        {
            $this->storage = $storage;
        }

        public function load(string $accessKey, ContentFilter $contentFilter)
        {
            if (!key_exists($accessKey, $this->content)) {
                $this->content[$accessKey] = $this->storage->getContent($contentFilter);
            }
        }

        /**
         * @param $accessKey
         * @return Content
         * @throws ContentNotFound
         */
        public function __get($accessKey): Content
        {
            if (isset($this->content[$accessKey])) {
                return $this->content[$accessKey];
            }

            throw new ContentNotFound("Content under key '$accessKey'' not exists.");
        }


    }