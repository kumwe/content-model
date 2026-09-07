# Extraction readiness review — 2026-09-07

Candidate version: `0.1.1`. Published baseline: `0.1.0`.

Bound content and schema traversal; detach input references so entries, revisions, content types, fields and workflow definitions preserve their immutable snapshots. Validate workflow member types and bounded lists.

The existing source map remains the extraction provenance record. Content and Navigation use App baseline `24ecf956423c18933e824b43cea1bfb9127a79a9`; the surface declarations and business contracts preserve the SDK provenance in docs/source-map.json. This review adds portable boundary behavior and package-owned tests without changing App production code or test ownership.

## Runtime boundary

Content and Workflow remain one package because their state and transition types form the documented dependency cycle. Content snapshots preserve finite floats, map/list ordering and revision checksum spelling while detaching PHP references. JSON traversal rejects cycles, invalid UTF-8 keys/values, depth above 64, more than 100000 nodes and more than four mebibytes of cumulative string/key bytes. Workflow definitions require lists of at most 256 states and 4096 transitions with typed immutable members. Schema and value traversal share the same bounds. No workflow authorization decision or transaction-owning ContentService moves into this package.

## Verification and remaining release steps

Package-owned regression tests cover the changed invariants. The public API gate now compares generated Markdown as well as JSON, including full method signatures, defaults, public properties and constant values; source file order is sorted before generation. No ConfigProvider is introduced because these values, pure algorithms and ports have no injected runtime coordinator.

Local source validation uses PHP 8.5.10 and exact dependency-tag archives where registry access is unavailable. This is distinct from the supported Composer security and built-archive consumer gates in CI. Merge only after the complete package workflow passes. The candidate is not a published or independently release-verified artifact. Publication, independent artifact verification and a coordinated exact-pin consumer train remain required before App integration. App acceptance, authorization, lifecycle, persistence and browser tests remain App-owned and were not run or claimed by this package review.
