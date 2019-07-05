<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 29/03/2019
     * Time: 12:22
     */

    namespace Ataccama\ContentManager\Utils;

    use Nette\SmartObject;


    /**
     * Class ContentPart
     * @package Ataccama\ContentManager\Utils
     * @property-read int      $id
     * @property-read Language $language
     */
    class ContentPart
    {
        use SmartObject;

        /** @var int */
        const ID_NOT_DEFINED = 0;

        /** @var string */
        public $content;

        /** @var int */
        protected $id;

        /** @var string */
        public $alias;

        /** @var bool */
        public $modifiable;

        /** @var Language */
        protected $language;

        /**
         * ContentPart constructor.
         * @param int      $id
         * @param string   $content
         * @param string   $alias
         * @param Language $language
         * @param bool     $modifiable
         */
        public function __construct(
            int $id,
            string $content,
            string $alias,
            Language $language,
            bool $modifiable = true
        ) {
            $this->content = $content;
            $this->id = $id;
            $this->alias = $alias;
            $this->language = $language;
            $this->modifiable = $modifiable;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @return Language
         */
        public function getLanguage(): Language
        {
            return $this->language;
        }
    }