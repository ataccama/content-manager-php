<?php


    namespace Ataccama\Test\Inputs;


    use Ataccama\ContentManager\Utils\ContentPart;
    use Ataccama\ContentManager\Utils\IModifier;


    class Adder implements IModifier
    {
        /** @var string */
        private $text;

        /**
         * Adder constructor.
         * @param string $text
         */
        public function __construct(string $text)
        {
            $this->text = $text;
        }

        public function modify(ContentPart $contentPart): ContentPart
        {
            $contentPart->content .= $this->text;

            return $contentPart;
        }

        public function getPriority(): int
        {
            return 10;
        }

    }