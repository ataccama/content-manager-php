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

        public $text;

        /**
         * ContentPart constructor.
         * @param $text
         */
        public function __construct($text)
        {
            $this->text = $text;
        }

        public function __toString()
        {
            return $this->text;
        }
    }