<?php
    require __DIR__ . "/../bootstrap.php";

    use Tester\Assert;


    require __DIR__ . "/../../src/Utils/ContentPart.php";
    require __DIR__ . "/../../src/Utils/Content.php";
    require __DIR__ . "/../../src/Exceptions/DuplicityException.php";
    require __DIR__ . "/../../src/Exceptions/ContentNotFound.php";
    require __DIR__ . "/../../src/Utils/IModifier.php";
    require __DIR__ . "/../Implementation/Adder.php";
    require __DIR__ . "/../Implementation/Cutter.php";

    $content = new \Ataccama\ContentManager\Utils\Content("default");

    Assert::noError(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart(0, "test_1", "test_one",
            \Ataccama\ContentManager\Utils\Language::default()));
    });

    Assert::noError(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart(0, "test_2", "test_two",
            \Ataccama\ContentManager\Utils\Language::default()));
    });

    Assert::same("test_1", $content->test_one);
    Assert::same("test_2", $content->test_two);

    Assert::exception(function () use ($content) {
        $content->addPart(new \Ataccama\ContentManager\Utils\ContentPart(0, "test_1", "test_one",
            \Ataccama\ContentManager\Utils\Language::default()));
    }, \Ataccama\Exceptions\DuplicityException::class);

    Assert::exception(function () use ($content) {
        $content->test_three;
    }, \Ataccama\Exceptions\ContentNotFound::class);

    Assert::same(2, $content->count());

    $content->addModifier(new \Ataccama\Test\Inputs\Cutter(2));
    $content->addModifier(new \Ataccama\Test\Inputs\Adder("xxx"));

    Assert::same("texxx", $content->test_one);

    $content->addModifier(new \Ataccama\Test\Inputs\Adder("y"));

    Assert::same("texxxy", $content->test_one);

    $content->addModifier(new \Ataccama\Test\Inputs\Cutter(1));

    Assert::same("txxxy", $content->test_one);