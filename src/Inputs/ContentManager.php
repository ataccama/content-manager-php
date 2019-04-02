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


    class ContentManager
    {
        /** @var IStorage */
        protected $storage;

        /**
         * ContentManager constructor.
         * @param IStorage $storage
         */
        public function __construct(IStorage $storage)
        {
            $this->storage = $storage;
        }

        public function getContent(ContentFilter $contentFilter): Content
        {
            return $this->storage->getContent($contentFilter);
        }
    }