<?php


    namespace Ataccama\Test\Inputs;


    use Ataccama\ContentManager\Utils\ContentPart;
    use Ataccama\ContentManager\Utils\IModifier;


    class Cutter implements IModifier
    {
        /** @var int */
        private $n;

        /**
         * Cutter constructor.
         * @param int $n
         */
        public function __construct(int $let)
        {
            $this->n = $let;
        }

        public function modify(ContentPart $contentPart): ContentPart
        {
            $contentPart->content = mb_substr($contentPart->content, 0, $this->n);

            return $contentPart;
        }

        public function getPriority(): int
        {
            return 1;
        }
    }