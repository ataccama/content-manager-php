<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 11:00
     */

    namespace Ataccama\ContentManager\Utils;


    use Ataccama\Exceptions\ContentNotFound;
    use Ataccama\Exceptions\DuplicityException;
    use Nette\SmartObject;


    /**
     * Class Content
     * @package Ataccama\ContentManager\Utils
     */
    class Content
    {
        use SmartObject;

        /** @var ContentPart[] */
        protected $contentParts;

        /** @var string */
        public $namespace;

        /**
         * Content constructor.
         * @param string $namespace
         */
        public function __construct(string $namespace)
        {
            $this->namespace = $namespace;
            $this->contentParts = [];
        }

        /**
         * Adds part of the content.
         * Duplicity is checking by default (and throws exception).
         *
         * @param ContentPart $contentPart
         * @param bool        $duplicity
         * @return Content
         * @throws DuplicityException
         */
        public function addPart(ContentPart $contentPart, bool $duplicity = null): Content
        {
            if($duplicity === null) {
                $duplicity = true;
            }

            if (!key_exists($contentPart->alias, $this->contentParts)) {
                $this->contentParts[$contentPart->alias] = $contentPart;
            } else {
                if ($duplicity) {
                    throw new DuplicityException("Duplicity key '$contentPart->alias' found in content.");
                }
            }

            return $this;
        }

        /**
         * Returns a part of the content with specific
         *
         * @param $alias
         * @return string
         * @throws ContentNotFound
         */
        public function __get($alias)
        {
            if (isset($this->contentParts[$alias])) {
                return $this->contentParts[$alias]->text;
            }

            throw new ContentNotFound("Content '$alias' not found.");
        }

        /**
         * @return int
         */
        public function count(): int
        {
            return count($this->contentParts);
        }
    }