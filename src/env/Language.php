<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Env\Pair;


    /**
     * Class Language
     * @package Ataccama\ContentManager\Env
     * @property-read int         $id
     * @property-read string      $isoCode
     * @property-read string|null $name
     * @property-read string|null $nativeName
     * @property-read bool        $active
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

        /** @var string|null */
        protected $name = null;

        /** @var string|null */
        protected $nativeName = null;

        /** @var bool */
        protected $active = true;

        /**
         * Language constructor.
         * @param int         $id
         * @param string      $isoCode
         * @param bool        $active
         * @param string|null $name
         * @param string|null $nativeName
         */
        public function __construct(
            int $id,
            string $isoCode,
            bool $active = true,
            ?string $name = null,
            ?string $nativeName = null
        ) {
            $this->id = $id;
            $this->isoCode = $isoCode;
            $this->active = $active;
            $this->name = $name;
            $this->nativeName = $nativeName;
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

        /**
         * @return Pair
         *
         * @deprecated
         */
        public function toPair(): Pair
        {
            return new Pair($this->id, $this->isoCode);
        }

        public function getKey()
        {
            return $this->id;
        }

        public function getValue()
        {
            return $this->isoCode;
        }

        /**
         * @return string|null
         */
        public function getName(): ?string
        {
            return $this->name;
        }

        /**
         * @return string|null
         */
        public function getNativeName(): ?string
        {
            return $this->nativeName;
        }

        /**
         * @return bool
         */
        public function isActive(): bool
        {
            return $this->active;
        }
    }