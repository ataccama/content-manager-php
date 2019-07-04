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
    class Content implements \Countable
    {
        use SmartObject;

        /** @var ContentPart[] */
        protected $contentParts;

        /** @var string */
        public $namespace;

        /** @var IModifier[] */
        private $modifiers = [];

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
         * Adds modifier.
         *
         * @param IModifier $modifier
         * @return Content
         */
        public function addModifier(IModifier $modifier): Content
        {
            // adding the modifier
            $this->modifiers[] = $modifier;

            // sorting by priority
            $sorted = false;
            while (!$sorted) {
                $sorted = true;
                for ($i = 0; $i < count($this->modifiers) - 1; $i++) {
                    if ($this->modifiers[$i]->getPriority() > $this->modifiers[$i + 1]->getPriority()) {
                        $tmp = $this->modifiers[$i];
                        $this->modifiers[$i] = $this->modifiers[$i + 1];
                        $this->modifiers[$i + 1] = $tmp;
                        $sorted = false;
                    }
                }
            }

            return $this;
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
            if ($duplicity === null) {
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
                return $this->modify($this->contentParts[$alias])->content;
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

        /**
         * @param ContentPart $contentPart
         * @return ContentPart
         */
        private function modify(ContentPart $contentPart): ContentPart
        {
            if ($contentPart->modifiable) {
                foreach ($this->modifiers as $modifier) {
                    $contentPart = $modifier->modify($contentPart);
                }
            }

            return $contentPart;
        }
    }