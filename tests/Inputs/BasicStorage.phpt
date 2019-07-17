<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";
    require __DIR__ . "/../../src/Utils/Content.php";
    require __DIR__ . "/../../src/Utils/Language.php";
    require __DIR__ . "/../../src/Utils/ContentFilter.php";
    require __DIR__ . "/../../src/Inputs/IStorage.php";
    require __DIR__ . "/../../tests/Implementation/BasicStorage.php";
    require __DIR__ . "/../../src/Exceptions/DuplicityException.php";
    require __DIR__ . "/../../src/Exceptions/ContentNotFound.php";

    $storage = new \Ataccama\Test\Inputs\BasicStorage();

    $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter(\Ataccama\ContentManager\Utils\Language::default(),
        [
            \Ataccama\ContentManager\Utils\ContentFilter::TAG => "test"
        ]);

    $content = $storage->getContent($contentFilter);

    Assert::same("Test text", $content->test_content_1);

    Assert::exception(function () use ($content) {
        $content->test_content_3;
    }, \Ataccama\Exceptions\ContentNotFound::class);