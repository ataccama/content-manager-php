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
        public $content;

        /** @var int */
        protected $id;

        /** @var string */
        public $alias;

        /** @var bool */
        public $modifiable;

        /**
         * ContentPart constructor.
         * @param int    $id
         * @param string $content
         * @param string $alias
         * @param bool   $modifiable
         */
        public function __construct(int $id, string $content, string $alias, bool $modifiable = true)
        {
            $this->content = $content;
            $this->id = $id;
            $this->alias = $alias;
            $this->modifiable = $modifiable;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }
    }