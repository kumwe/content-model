# Kumwe Content Model

[![Packagist version][version-badge]][packagist]
[![Package CI][ci-badge]][ci]
[![PHP requirement][php-badge]](composer.json)
[![License: Apache-2.0][license-badge]](LICENSE)

Portable content, revision, translation and editorial workflow models with persistence ports, under
`Kumwe\Content\`. The package provides immutable definitions and snapshots, bounded workflow declarations,
translation groups, scoped queries and reusable repository contracts.

## Installation and usage

```sh
composer require kumwe/content-model:0.2.0
```

PHP 8.5 and mbstring are required. Composer resolves the exact Kumwe dependencies from Packagist; consumers
need no custom VCS repository definitions. Values are constructed directly and repository ports are supplied by
the host. There is no ConfigProvider or captured site, actor, request, connection or container.

See the [standalone example](examples/standalone.php), [public API](docs/public-api.md),
[Core contract](docs/core-contract.md) and [integration](docs/integration.md).

## Compatibility and status

The published 0.2.0 contract requires `ContentRepository::adopt()` for content-definition adoption. Adapters
preserve entry/revision data and reject stale, missing or trashed records as documented in
[compatibility](COMPATIBILITY.md). Pre-1.0 consumers pin exact versions.

Core owns authorization, transactions, persistence adapters, dispatch and presentation. Package methods do not
establish authority. Publication and package CI remain separate from independent consumer verification and Core
acceptance. [Dependency status](docs/dependency-decision.md) records the current exact dependency graph.

## Development

```sh
composer install
composer check
composer examples
```

The full gate checks syntax, generated API and governed manifests, architecture, static analysis, coding
standards, dependency identities, test ownership, examples, security and a clean no-dev archive consumer.
See [repository guarantees](docs/readiness-review.md), [test ownership](docs/test-ownership.md),
[release process](docs/releasing.md), [release record](docs/release-record.md) and [security](SECURITY.md).

[version-badge]: https://img.shields.io/packagist/v/kumwe/content-model
[packagist]: https://packagist.org/packages/kumwe/content-model
[ci-badge]: https://github.com/kumwe/content-model/actions/workflows/ci.yml/badge.svg?branch=main
[ci]: https://github.com/kumwe/content-model/actions/workflows/ci.yml
[php-badge]: https://img.shields.io/packagist/dependency-v/kumwe/content-model/php
[license-badge]: https://img.shields.io/github/license/kumwe/content-model
