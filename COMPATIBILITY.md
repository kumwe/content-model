# Compatibility

Requires PHP 8.5. The source map records a deliberate namespace ownership break; no aliases or dual class declarations are shipped. Canonical packages own imported types. Exceptions and wire shapes remain inherited unless a decision below documents a change. Independent release verification is required before a consumer exact-pins a stable version.

## 0.1.1 boundary corrections

Bound content and schema traversal; detach input references so entries, revisions, content types, fields and workflow definitions preserve their immutable snapshots. Validate workflow member types and bounded lists. Public constructor parameter order and declaration serialization remain compatible; malformed/unbounded or externally mutable inputs are rejected or detached as documented in [the review](docs/readiness-review.md). App adoption must use the released public API and keep host integration tests in App.
