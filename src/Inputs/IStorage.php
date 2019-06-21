<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 15:49
     */

    namespace Ataccama\Inputs;


    use Ataccama\ContentManager\Utils\Content;
    use Ataccama\ContentManager\Utils\ContentFilter;


    /**
     * Interface IStorage
     * @package Ataccama\Inputs
     */
    interface IStorage
    {
        /**
         * @param ContentFilter $contentFilter
         * @return Content
         */
        public function getContent(ContentFilter $contentFilter): Content;
    }