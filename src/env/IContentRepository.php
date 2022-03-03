<?php
    declare(strict_types=1);

    namespace Ataccama\ContentManager\Env;

    use Nette\Utils\Paginator;


    /**
     * Interface IContentRepository
     * @package Ataccama\ContentManager\Env
     */
    interface IContentRepository
    {
        public function getContent(int $contentId, Language $language): Content;

        public function listContent(ContentFilter $filter = null, Paginator &$paginator = null): ContentContainer;

        public function updateContent(Content $content): Content;

        public function deleteContent(int $contentId): bool;

        public function createContent(ContentDefinition $contentDefinition): Content;
    }