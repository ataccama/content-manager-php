<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\DateTime;


    /**
     * Class ContentVersion
     * @package Ataccama\ContentManager\Env
     * @property-read int      $id
     * @property-read DateTime $dtCreated
     * @property-read string   $content
     */
    class ContentVersion implements IEntry
    {
        use BaseEntry;

        /** @var string */
        protected $content;

        /** @var DateTime */
        protected $dtCreated;

        /**
         * ContentVersion constructor.
         * @param int      $id
         * @param string   $content
         * @param DateTime $dtCreated
         */
        public function __construct(int $id, string $content, DateTime $dtCreated)
        {
            $this->id = $id;
            $this->content = $content;
            $this->dtCreated = $dtCreated;
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
    }