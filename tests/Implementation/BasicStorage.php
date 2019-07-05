<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 16:02
     */

    namespace Ataccama\Test\Inputs;


    use Ataccama\ContentManager\Utils\Content;
    use Ataccama\ContentManager\Utils\ContentPart;
    use Ataccama\ContentManager\Utils\ContentFilter;
    use Ataccama\ContentManager\Utils\Language;
    use Ataccama\Inputs\IStorage;


    final class BasicStorage implements IStorage
    {
        /**
         * @param ContentFilter $contentFilter
         * @return Content
         * @throws \Ataccama\Exceptions\DuplicityException
         */
        public function getContent(ContentFilter $contentFilter): Content
        {
            $someStaticData = [
                "test"    => [
                    "test_content_1" => "Test text",
                    "test_content_2" => "Test text2",
                ],
                "nothing" => [
                    "test_content_3" => "Test text3",
                    "test_content_4" => "Test text4",
                ]
            ];

            $content = new Content($contentFilter->tag);

            if (key_exists($contentFilter->tag, $someStaticData)) {
                foreach ($someStaticData[$contentFilter->tag] as $alias => $text) {
                    $content->addPart(new ContentPart(0, $text, $alias, $contentFilter->language));
                }
            }

            return $content;
        }

    }