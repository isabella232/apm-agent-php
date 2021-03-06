<?php

declare(strict_types=1);

namespace ElasticApmTests\ComponentTests\Util;

use Elastic\Apm\Impl\Log\Logger;
use ElasticApmTests\Util\LogCategoryForTests;

final class CliScriptAppCodeHost extends AppCodeHostBase
{
    /** @var Logger */
    private $logger;

    public function __construct()
    {
        parent::__construct();

        $this->logger = AmbientContext::loggerFactory()->loggerForClass(
            LogCategoryForTests::TEST_UTIL,
            __NAMESPACE__,
            __CLASS__,
            __FILE__
        )->addContext('this', $this);
    }

    protected function runImpl(): void
    {
        $this->callAppCode();
    }
}
