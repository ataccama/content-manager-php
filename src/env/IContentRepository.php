<?php

    namespace Ataccama\ContentManager\Env;

    use Ataccama\Common\Env\IEntry;
    use Nette\Utils\Paginator;


    /**
     * Interface IContentRepository
     * @package Ataccama\ContentManager\Env
     */
    interface IContentRepository
    {
        public function getContent(IEntry $content, Language $language): Content;

        public function listContent(Paginator &$paginator = null, ContentFilter $filter = null): ContentContainer;

        public function updateContent(Content $content): Content;

        public function deleteContent(IEntry $content): bool;

        public function createContent(ContentDefinition $contentDefinition): Content;
    }