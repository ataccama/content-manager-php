<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 29/03/2019
     * Time: 12:22
     */

    namespace Ataccama\ContentManager\Utils;

    use Nette\SmartObject;


    class ContentPart
    {
        use SmartObject;

        /** @var string */
        public $text;

        /** @var int */
        public $id;

        /** @var string */
        public $alias;

        /**
         * ContentPart constructor.
         * @param string $text
         * @param int    $id
         * @param string $alias
         */
        public function __construct(string $text, int $id, string $alias)
        {
            $this->text = $text;
            $this->id = $id;
            $this->alias = $alias;
        }

    }