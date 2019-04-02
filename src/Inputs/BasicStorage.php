<?php
    /**
     * Created by PhpStorm.
     * User: miroslav
     * Date: 02/04/2019
     * Time: 16:02
     */

    namespace Ataccama\Inputs;


    use Ataccama\ContentManager\Utils\Content;
    use Ataccama\ContentManager\Utils\ContentPart;
    use Ataccama\ContentManager\Utils\ContentFilter;


    class BasicStorage implements IStorage
    {
        /**
         * @param ContentFilter $contentFilter
         * @return Content
         * @throws \Ataccama\Exceptions\DuplicityException
         */
        public function getContent(ContentFilter $contentFilter): Content
        {
            $someStaticData = [
                "test" => [
                    "test_content_1" => "Test text",
                    "test_content_2" => "Asiod dnalksdoi nfadns aso",
                ],
                "nothing" => [
                    "test_content_3" => "Some lorem ipsum",
                    "test_content_4" => "Asiod dnalksdoi nfadns aso",
                ]
            ];

            $content = new Content($contentFilter->tag);

            if (in_array($contentFilter->tag, $someStaticData)) {
                foreach ($someStaticData[$contentFilter->tag] as $alias => $text) {
                    $content->addPart(new ContentPart($text, 0, $alias));
                }
            }

            return $content;
        }

    }