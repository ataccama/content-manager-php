<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";

    $contentPart = new \Ataccama\ContentManager\Utils\ContentPart(0, "test", "test_string",
        \Ataccama\ContentManager\Utils\Language::default());

    Assert::same("test", $contentPart->content);
    Assert::same(0, $contentPart->id);
    Assert::same("test_string", $contentPart->alias);