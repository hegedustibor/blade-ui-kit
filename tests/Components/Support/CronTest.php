<?php

declare(strict_types=1);

namespace Tests\Components\Support;

use BladeUIKit\Components\Support\Cron;
use Tests\Components\ComponentTestCase;

class CronTest extends ComponentTestCase
{
    /** @test */
    public function the_component_can_be_rendered()
    {
        $expected = <<<HTML
<span title="Every Sunday at 12:00am">
    @weekly
</span>
HTML;

        $this->assertComponentRenders($expected, '<x-cron schedule="@weekly"/>');
    }

    /** @test */
    public function it_can_translate_a_cron()
    {
        $cron = new Cron('0 16 * * 1');

        $this->assertSame('Every Monday at 4:00pm', $cron->translate());
    }
}