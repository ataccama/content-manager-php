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

        /**
         * @param ContentFilter $contentFilter
         */
        public function load(ContentFilter $contentFilter)
        {
            if (!key_exists($contentFilter->namespace, $this->content)) {
                $this->content[$contentFilter->namespace] = $this->storage->getContent($contentFilter);
            }
        }

        /**
         * @param string $namespace
         * @return Content
         * @throws ContentNotFound
         */
        public function __get(string $namespace): Content
        {
            if (isset($this->content[$namespace])) {
                return $this->content[$namespace];
            }

            throw new ContentNotFound("Content under key '$namespace'' not exists.");
        }
    }