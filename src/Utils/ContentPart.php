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
     * @property-read int $id
     */
    class ContentPart
    {
        use SmartObject;

        /** @var string */
        public $text;

        /** @var int */
        protected $id;

        /** @var string */
        public $alias;

        /**
         * ContentPart constructor.
         * @param int    $id
         * @param string $text
         * @param string $alias
         */
        public function __construct(int $id, string $text, string $alias)
        {
            $this->text = $text;
            $this->id = $id;
            $this->alias = $alias;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }
    }