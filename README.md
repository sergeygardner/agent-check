Agent Check PHP Library
===========================

[![Packagist](https://img.shields.io/packagist/v/sergeygardner/agent-check.svg)](https://packagist.org/packages/sergeygardner/agent-check)

The current development is made by Sergei Gardner.

The source of this library is released under the Apache License (see LICENSE for details).

## Requirements

* PHP >= 7.1

## Changelog

Please look into CHANGELOG for a list of the past releases.

## Installation
```
Put "sergeygardner/agent-check": "*" to composer.json to the 'require' section
Put {
          "type": "git",
          "url": "https://github.com/sergeygardner/agent-check"
        } to composer.json to the 'repositories' section
```

## Usage

```require_once $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php";
require_once '../../vendor/autoload.php';

use \Bitrix\Agent\AgentCheck;

$agentCheck = new AgentCheck;

$agentCheck->run();
```

## Logs
Put a debug information on the standart log-file (via AddMessage2Log)
