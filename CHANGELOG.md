# Changelog

## [0.2.0]

- Preserve the App content-definition adoption port in `ContentRepository::adopt()`, including optimistic version checks and unchanged entry/revision data.
- Require adapters to implement this additional method; the pre-1.0 minor successor records the interface compatibility break.
- Extend reusable repository conformance with adoption and stale, missing, and trashed-entry refusal.
- Publication follows merge and the existing package checks; App adoption uses the published successor.

## [0.1.2]

- Add reusable repository conformance for versioned definitions, scoped content/search, publication windows, revisions and translations.
- Enforce complete source/test ownership inventory in the package gate.
- Reconcile the migration handoff and readiness evidence against published baselines.
- Align exact Access Context and Access Control dependencies to published 0.1.2, with Localization 0.1.1.


## [0.1.1] - 2026-09-07

- Bound content and schema traversal; detach input references so entries, revisions, content types, fields and workflow definitions preserve their immutable snapshots. Validate workflow member types and bounded lists.
- Verify API documentation, full method signatures, parameter defaults, properties and constant values against deterministic generated metadata.
- Add package-owned regression and hostile-input tests; refresh the extraction handoff and dependency status.
- This is a release candidate record. Publication follows human merge and the package gate; independent release verification and App integration are separate.

## [0.1.0] - 2026-09-07

- Extract the canonical runtime types recorded in docs/source-map.json and their behavior tests.
- Add standalone Composer, strict analysis, API, archive and clean consumer gates.
- Use published Access Control 0.1.0 and preserve the package-owned behavior and clean consumer gates.
- NRM-2026-034: enabling-refactor; completion_claim: false.

- Add automatic publication of the recorded version after the complete post-merge package gate.
- Independent artifact verification and App adoption remain separate follow-up work.
