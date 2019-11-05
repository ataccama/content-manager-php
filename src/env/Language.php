<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Env\Pair;


    /**
     * Class Language
     * @package Ataccama\ContentManager\Env
     * @property-read int    $id
     * @property-read string $isoCode
     */
    class Language implements IEntry, IPair
    {
        use BaseEntry;

        /** @var int */
        private static $defaultLanguageId = 1;

        /** @var string */
        private static $defaultIsoCode = "en";

        /** @var Language */
        private static $current;

        /**
         * @var string
         * ISO 639-1 Code
         */
        protected $isoCode;

        /**
         * Language constructor.
         * @param int    $id
         * @param string $isoCode
         */
        public function __construct(int $id, string $isoCode)
        {
            $this->id = $id;
            $this->isoCode = $isoCode;
        }

        /**
         * @return Language
         */
        public static function default(): Language
        {
            return new Language(self::$defaultLanguageId, self::$defaultIsoCode);
        }

        /**
         * @param int    $languageId
         * @param string $isoCode
         * @return Language
         */
        public static function setDefaultLanguage(int $languageId, string $isoCode): Language
        {
            self::$defaultLanguageId = $languageId;
            self::$defaultIsoCode = $isoCode;

            return self::default();
        }

        /**
         * @return string
         */
        public function getIsoCode(): string
        {
            return $this->isoCode;
        }

        /**
         * @return Language
         */
        public static function current(): Language
        {
            if (!isset(self::$current)) {
                self::$current = self::default();
            }

            return self::$current;
        }

        /**
         * @param Language $current
         */
        public static function set(Language $current): void
        {
            self::$current = $current;
        }

        public function toPair(): Pair
        {
            return new Pair($this->id, $this->isoCode);
        }
    }