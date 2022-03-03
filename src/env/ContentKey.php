<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Interfaces\IdentifiableByInteger;
    use Ataccama\Common\Utils\Cache\IntegerKey;


    /**
     * Class ContentKey
     * @package Ataccama\ContentManager\Env
     */
    class ContentKey extends IntegerKey
    {
        private int $languageId;

        /**
         * ContentKey constructor.
         * @param IdentifiableByInteger $content
         * @param int                   $languageId
         */
        public function __construct(IdentifiableByInteger $content, int $languageId)
        {
            parent::__construct($content);
            $this->languageId = $languageId;
        }

        public function getPrefix(): ?string
        {
            return $this->languageId . "_content";
        }
    }