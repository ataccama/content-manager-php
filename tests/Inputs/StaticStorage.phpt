<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";
    require __DIR__ . "/../../src/Utils/Content.php";
    require __DIR__ . "/../../src/Utils/Language.php";
    require __DIR__ . "/../../src/Utils/ContentFilter.php";
    require __DIR__ . "/../../src/Inputs/IStorage.php";
    require __DIR__ . "/../../src/Inputs/BasicStorage.php";
    require __DIR__ . "/../../src/Exceptions/DuplicityException.php";
    require __DIR__ . "/../../src/Exceptions/ContentNotFound.php";

    // TODO: finish this test !!!!!!!!!

    $storage = new \Ataccama\Inputs\BasicStorage();

    $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter("test",
        \Ataccama\ContentManager\Utils\Language::default());

    $content = $storage->getContent($contentFilter);

    Assert::same("Test text", $content->test_content_1);