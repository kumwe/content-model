# Repository contract guarantees

Reusable conformance covers ContentRepository, SiteScopedContentRepository, ContentSearchRepository,
ContentModelRepository and TranslationGroupRepository. It checks scoped paging/search, half-open publication
windows with pinned workflow versions, optimistic conflicts, revisions, immutable definition history,
translation fallback/site separation and the 64-member attachment ceiling. Snapshot and workflow bounds remain
part of the public contract.

The complete source/test inventory is enforced by `composer ownership`. Abstract suites and adapters remain
test-only and are excluded from production archives. [Test ownership](test-ownership.md) explains adapter reuse
and the guarantees requiring real host/database tests.

Every changed source must pass the complete Composer/static/API/security/archive consumer and release automation
gates. A published package, independent artifact verification and Core acceptance remain separate observations.
See [Core integration](core-contract.md) and [releasing](releasing.md).
