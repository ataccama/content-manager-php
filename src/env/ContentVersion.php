<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\DateTime;


    /**
     * Class ContentVersion
     * @package Ataccama\ContentManager\Env
     * @property-read int         $id
     * @property-read DateTime    $dtCreated
     * @property-read string      $content
     * @property-read string|null $author
     */
    class ContentVersion implements IEntry
    {
        use BaseEntry;


        /** @var string */
        protected $content;

        /** @var DateTime */
        protected $dtCreated;

        /** @var string|null */
        protected $author;

        /**
         * ContentVersion constructor.
         * @param int         $id
         * @param string      $content
         * @param DateTime    $dtCreated
         * @param string|null $author
         */
        public function __construct(int $id, string $content, DateTime $dtCreated, ?string $author = null)
        {
            $this->id = $id;
            $this->content = $content;
            $this->dtCreated = $dtCreated;
            $this->author = $author;
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        /**
         * @return string
         */
        public function getContent(): string
        {
            return $this->content;
        }

        /**
         * @return string|null
         */
        public function getAuthor(): ?string
        {
            return $this->author;
        }
    }