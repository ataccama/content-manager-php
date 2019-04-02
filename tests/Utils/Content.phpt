<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";
    require __DIR__ . "/../../src/Utils/Content.php";
    require __DIR__ . "/../../src/Exceptions/DuplicityException.php";
    require __DIR__ . "/../../src/Exceptions/ContentNotFound.php";

    $content = new \Ataccama\ContentManager\Utils\Content("default");

    Assert::noError(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart("test_1", 0, "test_one"));
    });

    Assert::noError(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart("test_2", 0, "test_two"));
    });

    Assert::same("test_1", $content->test_one);
    Assert::same("test_2", $content->test_two);

    Assert::exception(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart("test_1", 0, "test_one"));
    }, \Ataccama\Exceptions\DuplicityException::class);

    Assert::exception(function () use ($content) {
        $content->test_three;
    }, \Ataccama\Exceptions\ContentNotFound::class);

    Assert::same(2, $content->count());