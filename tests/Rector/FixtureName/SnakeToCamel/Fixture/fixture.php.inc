<?php

namespace O0h\RectorCakePHP37FixtureImport\Tests\Rector\FixtureName\SnakeToCamel;

class ClassImportingFixturesWithSnakeCasedName
{
    protected $fixtures = [
        'app.users',
        'plugin.posts',
        'plugin.messages/deleted_messages',
    ];
}

?>
-----
<?php

namespace O0h\RectorCakePHP37FixtureImport\Tests\Rector\FixtureName\SnakeToCamel;

class ClassImportingFixturesWithSnakeCasedName
{
    protected $fixtures = [
        'app.Users',
        'plugin.Posts',
        'plugin.Messages/DeletedMessages',
    ];
}

?>
