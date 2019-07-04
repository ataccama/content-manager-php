<?php


    namespace Ataccama\ContentManager\Utils;


    interface IModifier
    {
        /**
         * Modifies content.
         *
         * @param ContentPart $contentPart
         * @return ContentPart
         */
        public function modify(ContentPart $contentPart): ContentPart;

        /**
         * Returns a priority of this modified.
         * I recommend: 1 = Highest priority, 10 = Normal, 100 = Low
         *
         * @return int
         */
        public function getPriority(): int;
    }