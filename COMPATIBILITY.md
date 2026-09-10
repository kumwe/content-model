# Compatibility

Requires PHP 8.5. The source map records a deliberate namespace ownership break; no aliases or dual class declarations are shipped. Canonical packages own imported types. Exceptions and wire shapes remain inherited unless a decision below documents a change. Independent release verification is required before a consumer exact-pins a stable version.

## 0.1.1 boundary corrections

Bound content and schema traversal; detach input references so entries, revisions, content types, fields and workflow definitions preserve their immutable snapshots. Validate workflow member types and bounded lists. Public constructor parameter order and declaration serialization remain compatible; malformed/unbounded or externally mutable inputs are rejected or detached as documented in [the review](docs/readiness-review.md). App adoption must use the released public API and keep host integration tests in App.

## 0.2.0 content-definition adoption

`ContentRepository` adds required `adopt(ContentRecord $record, int $expectedVersion): void`.
Adapters must update only content-type/workflow identifiers and pinned versions plus `updatedAt`,
while preserving the stored entry, optimistic entry version, site, creation/deletion state and revisions.
Missing, trashed and stale-version entries must raise `VersionConflict`. This reconciles the existing
App adoption method added after the original extraction; it does not introduce a new App workflow.
The additional required interface method is a breaking adapter contract, hence the pre-1.0 minor release.
