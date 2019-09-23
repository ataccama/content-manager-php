<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseArray;
    use Ataccama\ContentManager\Exceptions\ContentNotFound;


    /**
     * Class ContentContainer
     * @package Ataccama\ContentManager\Env
     */
    class ContentContainer extends BaseArray implements IModifiable
    {
        use ModifiableContent;

        /**
         * @return Content
         */
        public function current(): Content
        {
            $content = parent::current();
            if ($content instanceof Content) {
                foreach ($this->modifiers as $modifier) {
                    $content->addModifier($modifier);
                }
            }

            return $content;
        }

        /**
         * Returns a part of the content with specific
         *
         * @param string $alias
         * @return Content
         * @throws ContentNotFound
         */
        public function __get(string $alias)
        {
            foreach ($this as $content) {
                if ($content->name === $alias) {
                    return $this->modify($content);
                }
            }

            throw new ContentNotFound("Content '$alias' not found.");
        }

        /**
         * @param Content $content
         */
        public function add($content)
        {
            parent::add($content);
        }
    }