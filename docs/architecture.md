# Architecture

Portable content, revision, translation and editorial workflow models with persistence ports.

Source provenance is recorded in [source-map.json](source-map.json). The package has no App or Extension SDK production dependency. Ports define persistence requirements; concrete implementations remain host-owned. No global state, DI registration or alternate host is introduced.

ContentEntry uses Workflow, which consumes ContentStatus. Keeping `Domain` and `Workflow/Domain` under the same package contains this existing cycle; separating them would create mutual package dependencies. ContentService, ContentModelService and ContentTransitionAuthorizer remain App-owned.
