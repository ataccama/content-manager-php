<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 15:50
     */

    namespace Ataccama\ContentManager\Utils;


    use Nette\SmartObject;


    /**
     * Class Language
     * @package Ataccama\ContentManager\Utils
     * @property-read int    $id
     * @property-read string $short
     */
    class Language
    {
        use SmartObject;

        /** @var int */
        protected $id;
        /** @var string */
        protected $short;

        public static $DEFAULT_ID = 1;
        public static $DEFAULT_SHORT = 'en';

        /**
         * Language constructor.
         * @param int    $id
         * @param string $short
         */
        public function __construct(int $id, string $short)
        {
            $this->id = $id;
            $this->short = $short;
        }

        /**
         * Returns default language (English)
         *
         * @return Language
         */
        public static function default(): Language
        {
            return new Language(self::$DEFAULT_ID, self::$DEFAULT_SHORT);
        }

        /**
         * @param int    $id
         * @param string $short
         */
        public static function setDefaults(int $id, string $short)
        {
            self::$DEFAULT_ID = $id;
            self::$DEFAULT_SHORT = $short;
        }

        /**
         * @return int
         */
        public function getId(): int
        {
            return $this->id;
        }

        /**
         * @return string
         */
        public function getShort(): string
        {
            return $this->short;
        }
    }