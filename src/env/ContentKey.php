<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Utils\Cache\IKey;


    /**
     * Class ContentKey
     * @package Ataccama\ContentManager\Env
     */
    class ContentKey implements IKey
    {
        private string $id;
        private int $languageId;

        /**
         * ContentKey constructor.
         * @param string $id
         * @param int    $languageId
         */
        public function __construct(string $id, int $languageId)
        {
            $this->id = $id;
            $this->languageId = $languageId;
        }

        public function getPrefix(): ?string
        {
            return $this->languageId . "_content";
        }

        public function getId(): string
        {
            return $this->id;
        }
    }