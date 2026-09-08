# Extraction readiness review — 2026-09-08

Proposed successor: `0.1.2`. Published baseline: [v0.1.1](https://github.com/kumwe/content-model/releases/tag/v0.1.1) at `e468be2eb91954711ee749882d1084c89aa0f017`. Review: [PR #5](https://github.com/kumwe/content-model/pull/5).

The reusable suite exercises ContentRepository, SiteScopedContentRepository, ContentSearchRepository, ContentModelRepository and TranslationGroupRepository. It checks scoped paging/search, half-open publication windows with pinned workflow versions, optimistic conflicts, revisions, immutable definition history, translation fallback/site separation and the 64-member attachment ceiling. Existing snapshot and workflow bounds remain. Production source and public signatures are unchanged.

The complete source/test inventory is enforced by `composer ownership`. Abstract suites and adapters stay in test-only autoload and remain outside production archives. [Test ownership](test-ownership.md) explains adapter reuse and the guarantees still requiring real host/database tests.

Local PHP 8.5.10: 72 tests / 250 assertions and ownership gate pass. The final PR must pass the full existing Composer/static/API/security/archive consumer and release automation gates. This proposed successor is not yet published or independently release-verified. A human merge, automated immutable publication and independent artifact/dependency attestation remain the release steps before later core adoption. No App integration or App acceptance result is claimed.
