# Core integration contract

Content Model owns portable content, revision, translation and editorial workflow values and persistence ports.
Core supplies storage adapters, authorization, actor/site context, transactions, active contributions, dispatch,
presentation, deployment and recovery. Package declarations never grant permission or select a database.

Construct values directly and inject host ports where required. Pure operations do not capture request,
connection or container state. Preserve caller transaction and optimistic-concurrency boundaries.

`ContentRepository::adopt()` changes only content-type/workflow identifiers, pinned definition versions and
`updatedAt`. It preserves stored entry data, optimistic entry version, site, creation/deletion state and revisions.
Missing, trashed and stale-version records raise `VersionConflict`. The required method is part of the 0.2.0
adapter contract; see [compatibility](../COMPATIBILITY.md).

Repository conformance covers scoped paging/search, publication windows, versioned definitions, revisions,
translation fallback/site separation and bounded group membership. Host adapters must also prove their real
database transactions, concurrency, authorization and recovery behavior. Package conformance does not replace
Core acceptance tests.

The [source map](source-map.json) preserves namespace ownership evidence. When replacing a legacy declaration,
verify current references and remove duplicate implementation tests with their old implementation; retain Core
composition and operational tests. No aliases or parallel class roots are supported.

See [public API](public-api.md), [integration](integration.md), [test ownership](test-ownership.md),
[dependency status](dependency-decision.md) and [release record](release-record.md).
