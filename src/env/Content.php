<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Latte\Runtime\IHtmlString;
    use Nette\Utils\DateTime;


    /**
     * Class Content
     * @package Ataccama\ContentManager\Env
     * @property-read DateTime         $dtCreated
     * @property-read ContentVersion[] $versions
     */
    class Content extends ContentDefinition implements IEntry, IModifiable, IHtmlString
    {
        use BaseEntry;
        use ModifiableContent;

        /** @var DateTime */
        protected $dtCreated;

        /** @var ContentVersion[] */
        protected $versions = [];

        /** @var string */
        private $modifiedBody;

        /**
         * Content constructor.
         * @param int              $id
         * @param string           $name
         * @param Language         $languageId
         * @param string|null      $body
         * @param Tag[]            $tags
         * @param DateTime|null    $dtCreated
         * @param ContentVersion[] $versions
         */
        public function __construct(
            int $id,
            string $name,
            Language $languageId,
            string $body = null,
            array $tags = [],
            DateTime $dtCreated = null,
            array $versions = []
        ) {
            parent::__construct($name, $languageId, $body, $tags);
            $this->id = $id;
            $this->dtCreated = $dtCreated;

            if (!isset($this->dtCreated)) {
                $this->dtCreated = DateTime::from('now');
            }

            if (isset($versions) && is_array($versions)) {
                foreach ($versions as $version) {
                    if ($version instanceof ContentVersion) {
                        $this->versions[] = $version;
                    }
                }
            }
        }

        /**
         * @return DateTime
         */
        public function getDtCreated(): DateTime
        {
            return $this->dtCreated;
        }

        /**
         * @return ContentVersion[]
         */
        public function getVersions(): array
        {
            return $this->versions;
        }

        function __toString(): string
        {
            $modifiedBody = $this->modify($this)->body;
            if ($modifiedBody === $this->modifiedBody) {
                return $modifiedBody;
            }

            $this->modifiedBody = $modifiedBody;

            return $modifiedBody;
        }
    }