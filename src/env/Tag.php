<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\BaseEntry;
    use Ataccama\Common\Env\IEntry;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Env\Pair;


    /**
     * Class Tag
     * @package Ataccama\ContentManager\Env
     * @property-read int $id
     */
    class Tag extends TagDefinition implements IEntry, IPair
    {
        use BaseEntry;

        /**
         * Tag constructor.
         * @param int    $id
         * @param string $name
         */
        public function __construct(int $id, string $name)
        {
            parent::__construct($name);
            $this->id = $id;
        }

        public function getKey()
        {
            return $this->id;
        }

        public function getValue()
        {
            return $this->name;
        }

        /**
         * @return Pair
         * @deprecated
         */
        public function toPair(): Pair
        {
            return new $this;
        }
    }