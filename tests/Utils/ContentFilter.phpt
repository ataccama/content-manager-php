<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentFilter.php";
    require __DIR__ . "/../../src/Utils/Language.php";
    require __DIR__ . "/../../src/Exceptions/NotInitialized.php";

    Assert::noError(function () {
        $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter("test_tag",
            \Ataccama\ContentManager\Utils\Language::default());
    });

    $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter("test_tag",
        \Ataccama\ContentManager\Utils\Language::default());

    Assert::same("test_tag", $contentFilter->tag);
    Assert::same(\Ataccama\ContentManager\Utils\Language::$DEFAULT_ID, $contentFilter->language->id);
    Assert::same(\Ataccama\ContentManager\Utils\Language::$DEFAULT_SHORT, $contentFilter->language->short);

    Assert::exception(function () {
        $contentFilter = new \Ataccama\ContentManager\Utils\ContentFilter("",
            \Ataccama\ContentManager\Utils\Language::default());
    }, \Ataccama\Exceptions\NotInitialized::class);

    $filters = \Ataccama\ContentManager\Utils\ContentFilter::getFilters(["testNamespace" => ["test_tag1", "test_tag2"]],
        \Ataccama\ContentManager\Utils\Language::default());

    Assert::same("test_tag1", $filters["testNamespace"][0]->tag);
    Assert::same("test_tag2", $filters["testNamespace"][1]->tag);