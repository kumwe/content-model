# Dependency status

The Content Model 0.2.0 package retains a coherent, exact published dependency tuple. The tag identities below were observed on 2026-09-08; they are source coordinates, not external artifact attestations.

| Package | Exact version | Tag commit |
| --- | --- | --- |
| `kumwe/access-context` | `0.1.2` | `132c3cd7c229ceda4398e19140d1477512c27ebf` |
| `kumwe/access-control` | `0.1.2` | `c2420d1ed03bc39eaf5d8b9f5540580c297e3b57` |
| `kumwe/localization` | `0.1.1` | `8571ab575b9b9f2dc1b8a25b3c902d9cf44093cb` |

Access Control 0.1.2 selects Access Context 0.1.2, matching this package's direct pin. The public signature closure already uses these canonical packages; this change introduces no new dependency responsibility. The package workflow must prove Composer resolution, security and built-archive clean-consumer installation for the selected tuple.

`resources/release-readiness.json` records the exact coordinates and leaves external attestations null until independently supplied. `composer dependency-readiness` rejects stale, missing, extra or floating evidence coordinates. Independent release verification remains distinct from source CI and is required before core adoption.

All declared Kumwe dependencies are available through Packagist. Composer uses ordinary registry resolution;
no root-only VCS override is required. Exact versions and dependency readiness evidence remain unchanged.
