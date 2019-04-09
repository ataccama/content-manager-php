<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";
    require __DIR__ . "/../../src/Utils/Content.php";
    require __DIR__ . "/../../src/Utils/Language.php";
    require __DIR__ . "/../../src/Utils/ContentFilter.php";
    require __DIR__ . "/../../src/Inputs/IStorage.php";
    require __DIR__ . "/../Implementation/BasicStorage.php";
    require __DIR__ . "/../../src/Exceptions/DuplicityException.php";
    require __DIR__ . "/../../src/Exceptions/ContentNotFound.php";
    require __DIR__ . "/../../src/Exceptions/NotInitialized.php";
    require __DIR__ . "/../../src/Inputs/ContentLoader.php";

    $storage = new \Ataccama\Test\Inputs\BasicStorage();

    $contentLoader = new \Ataccama\Inputs\ContentLoader($storage);

    Assert::exception(function () use ($contentLoader) {
        new \Ataccama\ContentManager\Utils\ContentFilter("", \Ataccama\ContentManager\Utils\Language::default());
    }, \Ataccama\Exceptions\NotInitialized::class);

    $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter("test",
        \Ataccama\ContentManager\Utils\Language::default());

    $contentLoader->load("test_namespace", $contentFilter);

    Assert::same("Test text", $contentLoader->test_namespace->test_content_1);

    Assert::exception(function () use ($contentLoader) {
        $contentLoader->test_namespace_2->test_content_2;
    }, \Ataccama\Exceptions\ContentNotFound::class);