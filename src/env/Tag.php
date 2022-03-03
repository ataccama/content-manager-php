<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\IdentifiedByInteger;
    use Ataccama\Common\Env\IPair;
    use Ataccama\Common\Interfaces\IdentifiableByInteger;


    /**
     * Class Tag
     * @package Ataccama\ContentManager\Env
     * @property-read int $id
     */
    class Tag extends TagDefinition implements IdentifiableByInteger, IPair
    {
        use IdentifiedByInteger;


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

        public function getKey(): int|string
        {
            return $this->id;
        }

        public function getValue(): string
        {
            return $this->name;
        }
    }