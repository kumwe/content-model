---
schema: kumwe-package-release-record/v1
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-034
change_set: KUMWE-CS-2026-034
source:
  app:
    repository: https://github.com/kumwe/app
    baseline_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    examined_paths:
    - src/Content/Domain/ContentEntry.php
    - src/Content/Domain/ContentRevision.php
    - src/Content/Domain/ContentStatus.php
    - src/Content/Domain/ContentTypeDefinition.php
    - src/Content/Domain/ExpectedVersion.php
    - src/Content/Domain/FieldDefinition.php
    - src/Content/Domain/InvalidContentData.php
    - src/Content/Domain/InvalidTranslationGroup.php
    - src/Content/Domain/JsonSchemaValidator.php
    - src/Content/Domain/PublicationWindow.php
    - src/Content/Domain/SchemaCompatibilityChecker.php
    - src/Content/Domain/TranslationGroup.php
    - src/Content/Domain/TranslationGroupMember.php
    - src/Content/Domain/VersionConflict.php
    - src/Workflow/Domain/InvalidWorkflowTransition.php
    - src/Workflow/Domain/Workflow.php
    - src/Workflow/Domain/WorkflowDefinition.php
    - src/Workflow/Domain/WorkflowStateDefinition.php
    - src/Workflow/Domain/WorkflowTransitionDefinition.php
    - src/Content/Application/ContentBrowseQuery.php
    - src/Content/Application/ContentModelNotFound.php
    - src/Content/Application/ContentModelRepository.php
    - src/Content/Application/ContentNotFound.php
    - src/Content/Application/ContentPage.php
    - src/Content/Application/ContentRecord.php
    - src/Content/Application/ContentRepository.php
    - src/Content/Application/ContentSearchRepository.php
    - src/Content/Application/IncompatibleDefinition.php
    - src/Content/Application/SiteScopedContentRepository.php
    - src/Content/Application/TranslationGroupRepository.php
    old_namespace_roots:
    - Kumwe\App\Content\Application\
    - Kumwe\App\Content\Domain\
    - Kumwe\App\Workflow\Domain\
    capability_index_sha256: null
  semantic_inputs:
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/ContentEntry.php
    sha256: e58108ee512b6f6b820df12190e20d3739e3719dcc6fedf3abf143fa663bdb3d
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/ContentRevision.php
    sha256: 91aac439dfa1a73f7f4bfade418cd5dd0fe135fc836672ed418aa3f85de4573e
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/ContentStatus.php
    sha256: 6462da84bf8b61b51cdd19b90c61dcf074b5d62ebca0725dd66a0235bab8bae2
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/ContentTypeDefinition.php
    sha256: 6b26970a5714cfefc1bc60059dcfc0a7c0dbe621af0cc377ad9105f96fb859a3
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/ExpectedVersion.php
    sha256: fc8c010c5934a17b466301657ee4a01618693d9e27e256f3509ccc1ddb9e4009
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/FieldDefinition.php
    sha256: a4a175f4a996f272228bbc650aeba6eb9f128d1df635e0e8de0025ad59e92eca
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/InvalidContentData.php
    sha256: 8b1ee656fbd3b4b5898c9bdab4bf70de7f775d6b808453a1267a6aab54304804
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/InvalidTranslationGroup.php
    sha256: 6929f399d28dfd35949fcd75a9d062388e5892e0fa32d64dbf193f9f91bd2d8a
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/JsonSchemaValidator.php
    sha256: db5589df27118c4eacf9e64858dd37e2000c853a37865edeaee8a7b79c197faa
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/PublicationWindow.php
    sha256: d8d713411d87ec65fac39b9167bcc44d3f3defa1912abae8536c59f0bb554445
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/SchemaCompatibilityChecker.php
    sha256: 0985d6df38bb17d12e16a214f1a351ec4a02351733225a808a07dd8a4fe294c4
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/TranslationGroup.php
    sha256: 67eca64e2d6b7b70eaa2fe2139083fa555ebba8af659e711484b1c316e09b3a7
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/TranslationGroupMember.php
    sha256: a42142bf1ae9901f0084dd73bbb72aa9aa5fc0343fb917a834ffa01ac175a9bf
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Domain/VersionConflict.php
    sha256: 101a0a3fd2908ec7424173c78cbbce5bf918ef819129fc4ff5809704d72544af
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Workflow/Domain/InvalidWorkflowTransition.php
    sha256: 59f71a6359669303c5e964b49382820bf38f953af99b3b4dfc41dd9a05658922
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Workflow/Domain/Workflow.php
    sha256: 8c80fc9cd84212243b276c9705939a847908766d34ce27efa933dc5885504e6e
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Workflow/Domain/WorkflowDefinition.php
    sha256: 7019a08dabc831ea9a9db103de981e331d394014becb2ec38759d1caa676e70a
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Workflow/Domain/WorkflowStateDefinition.php
    sha256: 8e26b6eed93e9c253c3f8121cdf2e4f85690b6160e9f4705d1655646bdd92abe
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Workflow/Domain/WorkflowTransitionDefinition.php
    sha256: 3244b5b0fe9fc7b53e1b64e108d30c4c6b0b151aa3249448a4a7b3847950c3b1
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentBrowseQuery.php
    sha256: 3e42f5f061d547a30522ed7dedd43ee42cbd054267adcbe6b73ef5f90f35be23
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentModelNotFound.php
    sha256: 39904b81809aaec8e04a9cfa762e977ae1a3bfbb63708ad547559e91eabcadb6
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentModelRepository.php
    sha256: 306e5e224b1419780b857b4fb6b944df83b0440cf9bc6e8da47cc1ef64cd3389
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentNotFound.php
    sha256: 3197e48912b1306382d4e25f2b36d3c80eb41977119cd7c1d6241f49b8090072
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentPage.php
    sha256: bbaf3a29fa36bc02bfb992890df62a8f404067401f4e18ec4e9b83e4cd99b1e0
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentRecord.php
    sha256: d3122c85092de038d356fab39fa40fea6d63446f41d8a9bb48cafa7b9e9b31d1
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentRepository.php
    sha256: 01d01d017d5047f453712ecabf85fe382a12f50786cd50f42d2b3214e217d227
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/ContentSearchRepository.php
    sha256: ced612e1a533b742879fcd599f1b47a976e151eb26cd0b08d43ee2e4a32defa5
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/IncompatibleDefinition.php
    sha256: e6dc38f7cf6b0291f3b45c693896c61378a0aa4181cb9a161a9e618f4fc87896
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/SiteScopedContentRepository.php
    sha256: 70fb81a81dfd6e833364f44d55c494adad53c272e160ae466e52d095a8dff6aa
  - owner: https://github.com/kumwe/app
    version_or_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    manifest_or_corpus: src/Content/Application/TranslationGroupRepository.php
    sha256: bc3bb7f84ab4375bfb2759c777dcf28bd66ba33bf54994977fffd75b1b8a2c57
  examined_dependencies:
  - php ^8.5
  - ext-mbstring *
  - kumwe/access-context 0.1.2
  - kumwe/access-control 0.1.2
  - kumwe/localization 0.1.1
  - ramsey/uuid ^4.9
target:
  repository: https://github.com/kumwe/content-model
  artifact_identity: kumwe/content-model
  canonical_namespace_or_abi: Kumwe\Content\
ownership:
  responsibility: Portable content, revision, translation and editorial workflow models with persistence ports.
  non_responsibilities:
  - authorization
  - transactions
  - persistence adapters
  - active registries
  - trust and lifecycle
  - HTTP and rendering
  allowed_dependency_ceiling:
  - php
  - ext-mbstring
  - kumwe/access-context
  - kumwe/access-control
  - kumwe/localization
  - ramsey/uuid
  implementation_owner: kumwe/content-model
  next_consumer: kumwe/app
  public_manifests:
  - path: resources/public-api/v1.json
    sha256: 337556f5c7d7c8afeb7da7987bfe9624ef0645783463942e25ce10ceff3f6f61
  - path: resources/capabilities/v1.json
    sha256: 7391c88b0f89aa3b9229af97c12e4b274166c547d80f9af31f988c0a93dbda24
  - path: resources/service-map/v1.json
    sha256: 57dae31e71b99912c0fbc3e7f147b47311f14772145f586056a30559f15c4b7f
  - path: resources/public-api/signature-details-v1.json
    sha256: e022ad87380dcf0c7ccc54d808c402ceb5be0200a2010c4a6f3829184ad3b1e2
  intentionally_excluded:
  - ContentService.php
  - ContentModelService.php
framework_php:
  composer_package: kumwe/content-model
  canonical_namespace: Kumwe\Content\
  public_api_manifest: resources/public-api/v1.json
  capability_manifest: resources/capabilities/v1.json
  service_map: resources/service-map/v1.json
  extracted_symbols:
  - old_fqcn: Kumwe\App\Content\Domain\ContentEntry
    new_fqcn: Kumwe\Content\Domain\ContentEntry
    source_path: src/Content/Domain/ContentEntry.php
    target_path: src/Domain/ContentEntry.php
    kind: class
    public_methods:
    - create
    - reconstitute
    - id
    - title
    - slug
    - data
    - status
    - statusKey
    - publicationWindow
    - version
    - locale
    - translationGroupId
    - isVisibleAt
    - revise
    - reschedule
    - transition
    - translate
    - snapshot
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\ContentRevision
    new_fqcn: Kumwe\Content\Domain\ContentRevision
    source_path: src/Content/Domain/ContentRevision.php
    target_path: src/Domain/ContentRevision.php
    kind: class
    public_methods:
    - capture
    - id
    - contentEntryId
    - revisionNumber
    - snapshot
    - checksum
    - createdAt
    - hasValidChecksum
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\ContentStatus
    new_fqcn: Kumwe\Content\Domain\ContentStatus
    source_path: src/Content/Domain/ContentStatus.php
    target_path: src/Domain/ContentStatus.php
    kind: enum
    public_methods:
    - isPublic
    - cases
    - from
    - tryFrom
    public_properties:
    - name
    - value
    public_constants:
    - Draft
    - Review
    - Published
    - Archived
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\ContentTypeDefinition
    new_fqcn: Kumwe\Content\Domain\ContentTypeDefinition
    source_path: src/Content/Domain/ContentTypeDefinition.php
    target_path: src/Domain/ContentTypeDefinition.php
    kind: class
    public_methods:
    - __construct
    - schema
    - fields
    - toArray
    public_properties:
    - id
    - site
    - handle
    - name
    - workflowId
    - workflowVersion
    - version
    - createdAt
    - publishedAt
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Content\Domain\ExpectedVersion
    new_fqcn: Kumwe\Content\Domain\ExpectedVersion
    source_path: src/Content/Domain/ExpectedVersion.php
    target_path: src/Domain/ExpectedVersion.php
    kind: class
    public_methods:
    - __construct
    - value
    - assertMatches
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    - Kumwe\Content\Domain\VersionConflict
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\FieldDefinition
    new_fqcn: Kumwe\Content\Domain\FieldDefinition
    source_path: src/Content/Domain/FieldDefinition.php
    target_path: src/Domain/FieldDefinition.php
    kind: class
    public_methods:
    - __construct
    - toArray
    public_properties:
    - schema
    - key
    - required
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Content\Domain\InvalidContentData
    new_fqcn: Kumwe\Content\Domain\InvalidContentData
    source_path: src/Content/Domain/InvalidContentData.php
    target_path: src/Domain/InvalidContentData.php
    kind: class
    public_methods:
    - __construct
    public_properties:
    - violations
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\InvalidTranslationGroup
    new_fqcn: Kumwe\Content\Domain\InvalidTranslationGroup
    source_path: src/Content/Domain/InvalidTranslationGroup.php
    target_path: src/Domain/InvalidTranslationGroup.php
    kind: class
    public_methods: []
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\JsonSchemaValidator
    new_fqcn: Kumwe\Content\Domain\JsonSchemaValidator
    source_path: src/Content/Domain/JsonSchemaValidator.php
    target_path: src/Domain/JsonSchemaValidator.php
    kind: class
    public_methods:
    - assertSupported
    - assertValid
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    - Kumwe\Content\Domain\InvalidContentData
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\PublicationWindow
    new_fqcn: Kumwe\Content\Domain\PublicationWindow
    source_path: src/Content/Domain/PublicationWindow.php
    target_path: src/Domain/PublicationWindow.php
    kind: class
    public_methods:
    - __construct
    - unbounded
    - startsAt
    - endsAt
    - contains
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\SchemaCompatibilityChecker
    new_fqcn: Kumwe\Content\Domain\SchemaCompatibilityChecker
    source_path: src/Content/Domain/SchemaCompatibilityChecker.php
    target_path: src/Domain/SchemaCompatibilityChecker.php
    kind: class
    public_methods:
    - breakingChanges
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\TranslationGroup
    new_fqcn: Kumwe\Content\Domain\TranslationGroup
    source_path: src/Content/Domain/TranslationGroup.php
    target_path: src/Domain/TranslationGroup.php
    kind: class
    public_methods:
    - __construct
    - ofOne
    - members
    - member
    - publishedMembers
    - resolve
    - isTranslated
    public_properties:
    - id
    - fallbackLocale
    public_constants:
    - MAXIMUM_MEMBERS
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - Kumwe\Content\Domain\InvalidTranslationGroup
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\TranslationGroupMember
    new_fqcn: Kumwe\Content\Domain\TranslationGroupMember
    source_path: src/Content/Domain/TranslationGroupMember.php
    target_path: src/Domain/TranslationGroupMember.php
    kind: class
    public_methods:
    - __construct
    - isVisibleAt
    public_properties:
    - locale
    - contentId
    - slug
    - statusKey
    - publicState
    - publicationWindow
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Domain\VersionConflict
    new_fqcn: Kumwe\Content\Domain\VersionConflict
    source_path: src/Content/Domain/VersionConflict.php
    target_path: src/Domain/VersionConflict.php
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Workflow\Domain\InvalidWorkflowTransition
    new_fqcn: Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition
    source_path: src/Workflow/Domain/InvalidWorkflowTransition.php
    target_path: src/Workflow/Domain/InvalidWorkflowTransition.php
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Workflow\Domain\Workflow
    new_fqcn: Kumwe\Content\Workflow\Domain\Workflow
    source_path: src/Workflow/Domain/Workflow.php
    target_path: src/Workflow/Domain/Workflow.php
    kind: class
    public_methods:
    - __construct
    - allows
    - assertCanTransition
    - allowedTargets
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition
    serialization_contract: null
  - old_fqcn: Kumwe\App\Workflow\Domain\WorkflowDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowDefinition
    source_path: src/Workflow/Domain/WorkflowDefinition.php
    target_path: src/Workflow/Domain/WorkflowDefinition.php
    kind: class
    public_methods:
    - __construct
    - states
    - transitions
    - initialState
    - transition
    - isPublic
    - toArray
    public_properties:
    - id
    - site
    - handle
    - name
    - version
    - createdAt
    - publishedAt
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    - LogicException
    - Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Workflow\Domain\WorkflowStateDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowStateDefinition
    source_path: src/Workflow/Domain/WorkflowStateDefinition.php
    target_path: src/Workflow/Domain/WorkflowStateDefinition.php
    kind: class
    public_methods:
    - __construct
    - toArray
    public_properties:
    - key
    - name
    - initial
    - public
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Workflow\Domain\WorkflowTransitionDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition
    source_path: src/Workflow/Domain/WorkflowTransitionDefinition.php
    target_path: src/Workflow/Domain/WorkflowTransitionDefinition.php
    kind: class
    public_methods:
    - __construct
    - toArray
    public_properties:
    - from
    - to
    - requiredCapability
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Content\Application\ContentBrowseQuery
    new_fqcn: Kumwe\Content\Application\ContentBrowseQuery
    source_path: src/Content/Application/ContentBrowseQuery.php
    target_path: src/Application/ContentBrowseQuery.php
    kind: class
    public_methods:
    - __construct
    - withPage
    - toQueryParameters
    public_properties:
    - search
    - status
    - contentType
    - scope
    - sort
    - page
    - perPage
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions:
    - InvalidArgumentException
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentModelNotFound
    new_fqcn: Kumwe\Content\Application\ContentModelNotFound
    source_path: src/Content/Application/ContentModelNotFound.php
    target_path: src/Application/ContentModelNotFound.php
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentModelRepository
    new_fqcn: Kumwe\Content\Application\ContentModelRepository
    source_path: src/Content/Application/ContentModelRepository.php
    target_path: src/Application/ContentModelRepository.php
    kind: interface
    public_methods:
    - contentTypes
    - contentType
    - insertContentType
    - publishContentType
    - workflows
    - workflow
    - insertWorkflow
    - publishWorkflow
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentNotFound
    new_fqcn: Kumwe\Content\Application\ContentNotFound
    source_path: src/Content/Application/ContentNotFound.php
    target_path: src/Application/ContentNotFound.php
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentPage
    new_fqcn: Kumwe\Content\Application\ContentPage
    source_path: src/Content/Application/ContentPage.php
    target_path: src/Application/ContentPage.php
    kind: class
    public_methods:
    - __construct
    public_properties:
    - items
    - query
    - hasPrevious
    - hasNext
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentRecord
    new_fqcn: Kumwe\Content\Application\ContentRecord
    source_path: src/Content/Application/ContentRecord.php
    target_path: src/Application/ContentRecord.php
    kind: class
    public_methods:
    - __construct
    - withEntry
    - withDeletedAt
    - toArray
    public_properties:
    - entry
    - contentTypeId
    - workflowId
    - createdAt
    - updatedAt
    - deletedAt
    - contentTypeVersion
    - workflowVersion
    - siteIdentifier
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: Public toArray shape is documented in docs/public-api.md and covered by package-owned
      tests.
  - old_fqcn: Kumwe\App\Content\Application\ContentRepository
    new_fqcn: Kumwe\Content\Application\ContentRepository
    source_path: src/Content/Application/ContentRepository.php
    target_path: src/Application/ContentRepository.php
    kind: interface
    public_methods:
    - all
    - find
    - findPublishedById
    - findPublishedBySlug
    - insert
    - update
    - setDeletedAt
    - appendRevision
    - nextRevisionNumber
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\ContentSearchRepository
    new_fqcn: Kumwe\Content\Application\ContentSearchRepository
    source_path: src/Content/Application/ContentSearchRepository.php
    target_path: src/Application/ContentSearchRepository.php
    kind: interface
    public_methods:
    - searchForSite
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\IncompatibleDefinition
    new_fqcn: Kumwe\Content\Application\IncompatibleDefinition
    source_path: src/Content/Application/IncompatibleDefinition.php
    target_path: src/Application/IncompatibleDefinition.php
    kind: class
    public_methods:
    - __construct
    public_properties:
    - breakingChanges
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\SiteScopedContentRepository
    new_fqcn: Kumwe\Content\Application\SiteScopedContentRepository
    source_path: src/Content/Application/SiteScopedContentRepository.php
    target_path: src/Application/SiteScopedContentRepository.php
    kind: interface
    public_methods:
    - allForSite
    - findForSite
    - findPublishedByIdForSite
    - findPublishedBySlugForSite
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  - old_fqcn: Kumwe\App\Content\Application\TranslationGroupRepository
    new_fqcn: Kumwe\Content\Application\TranslationGroupRepository
    source_path: src/Content/Application/TranslationGroupRepository.php
    target_path: src/Application/TranslationGroupRepository.php
    kind: interface
    public_methods:
    - forContent
    - declareGroup
    - guardAttachment
    public_properties: []
    public_constants: []
    compatibility: Canonical namespace ownership move; see COMPATIBILITY.md for validation changes and docs/public-api.md
      for exact signatures.
    exceptions: []
    serialization_contract: null
  consumers:
    app_code:
    - src/Administrator/Content/ContentFormDataMapper.php
    - src/Administrator/Content/ContentFormPresenter.php
    - src/Administrator/Http/AdministratorRequest.php
    - src/Administrator/Http/Handler/AdministratorContentEditorHandler.php
    - src/Administrator/Http/Handler/AdministratorContentListHandler.php
    - src/Administrator/Http/Handler/AdministratorContentModelsHandler.php
    - src/Administrator/Http/Handler/AdministratorCreateContentHandler.php
    - src/Administrator/Http/Handler/AdministratorDashboardHandler.php
    - src/Administrator/Http/Handler/AdministratorNavigationHandler.php
    - src/Administrator/Http/Handler/AdministratorRestoreContentHandler.php
    - src/Administrator/Http/Handler/AdministratorSettingsHandler.php
    - src/Administrator/Http/Handler/AdministratorTransitionContentHandler.php
    - src/Administrator/Http/Handler/AdministratorTrashContentHandler.php
    - src/Administrator/Http/Handler/AdministratorUpdateContentHandler.php
    - src/Content/Application/ContentModelRepository.php
    - src/Content/Application/ContentModelService.php
    - src/Content/Application/ContentRecord.php
    - src/Content/Application/ContentRepository.php
    - src/Content/Application/ContentService.php
    - src/Content/Application/TranslationGroupRepository.php
    - src/Content/Domain/ContentEntry.php
    - src/Content/Infrastructure/Persistence/DoctrineContentModelRepository.php
    - src/Content/Infrastructure/Persistence/DoctrineContentRepository.php
    - src/Content/Infrastructure/Persistence/DoctrineTranslationGroupRepository.php
    - src/Content/Presentation/TranslationGroupPresenter.php
    - src/Delivery/Console/Command/ManageContentCommand.php
    - src/Delivery/Console/Command/ManageContentModelsCommand.php
    - src/Delivery/Console/Command/ManageNavigationCommand.php
    - src/Delivery/Http/Api/Content/ContentApiRequest.php
    - src/Delivery/Http/Api/Content/ContentApiResponder.php
    - src/Delivery/Http/Api/Content/ContentCollectionHandler.php
    - src/Delivery/Http/Api/Content/ContentModelApiHandler.php
    - src/Delivery/Http/Api/Idempotency/HttpMutationPreauthorizer.php
    - src/Delivery/Http/Api/Idempotency/PersistentIdempotencyMiddleware.php
    - src/Demo/Infrastructure/DemoContentProfileInstaller.php
    - src/Demo/Infrastructure/DemoProfileExporter.php
    - src/Extension/Contribution/TranslationGroupDeclaration.php
    - src/Http/Handler/StudioPublishedStylesheetHandler.php
    - src/Infrastructure/Mcp/KumweMcpHandlers.php
    - src/Infrastructure/Mcp/McpToolErrorVocabulary.php
    - src/Infrastructure/Persistence/Migration/DatabaseDrivenPresentationMigration.php
    - src/Infrastructure/Persistence/Migration/DynamicSiteContentMigration.php
    - src/Kernel/ContainerFactory.php
    - src/Navigation/Application/NavigationService.php
    - src/Presentation/ContentLayoutCatalog.php
    - src/Presentation/ContentPresenter.php
    - src/Site/Application/PublicPageLocator.php
    - src/Studio/Application/Authoring/ContentStudioAuthoringContextAuthority.php
    - src/Studio/Application/Authoring/ContentStudioAuthoringTargetResolver.php
    - src/Studio/Application/Composition/CanonicalStudioPublishedContentRenderer.php
    - src/Studio/Application/Composition/StudioPublishedCompositionGuard.php
    - src/Studio/Application/Composition/StudioPublishedContentRenderer.php
    - src/Studio/Application/Composition/StudioPublishedStylesheet.php
    - src/Studio/Application/Projection/ContentStudioProjector.php
    - src/Studio/Application/Projection/ContentStudioResourceSearchProvider.php
    - src/Studio/Application/Projection/RecordAuthorizedStudioContentFieldDisclosure.php
    - src/Studio/Application/Projection/StudioContentFieldDisclosure.php
    - src/Studio/Application/Projection/StudioContentProjectionService.php
    - src/Workflow/Application/ContentTransitionAuthorizer.php
    - src/Workflow/Domain/Workflow.php
    configuration_and_di: []
    reflection_and_string_references: []
    fixtures_and_examples: []
    external: []
  dependency_injection:
    mode: direct
    provider: null
    factories: []
    aliases: []
    service_lifetimes: []
    configuration_keys: []
    provider_absence_reason: Values, ports and deterministic stateless algorithms capture no collaborator or
      ambient state.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
  - tests/ContentRepositoryConformanceTest.php
  - tests/Conformance/
  - tests/Fixture/
  - tests/ownership.json
  - tests/Domain/ContentEntryTest.php
  - tests/Domain/ContentRevisionTest.php
  - tests/Domain/ContentSnapshotBoundaryTest.php
  - tests/Domain/ContentStatusTest.php
  - tests/Domain/ExpectedVersionTest.php
  - tests/Domain/JsonSchemaValidatorTest.php
  - tests/Domain/PublicationWindowTest.php
  - tests/Domain/SchemaCompatibilityCheckerTest.php
  - tests/Domain/TranslationGroupTest.php
  - tests/Workflow/WorkflowDefinitionBoundaryTest.php
  - tests/Workflow/WorkflowTest.php
  remain_in_app_or_consumer:
  - tests/Integration/Content/MultilingualContentIntegrationTest.php
  - tests/Integration/Extension/ContributedContentTranslationIntegrationTest.php
  - tests/Integration/Studio/StudioArtifactRecoveryVectorReplayIntegrationTest.php
  - tests/Unit/Administrator/Content/ContentFormTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorContentEditorHandlerTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorContentEditorRetentionTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorDashboardHandlerTest.php
  - tests/Unit/Application/Authorization/AdapterAuthorizationParityTest.php
  - tests/Unit/Application/Authorization/ApplicationAuthorizationTest.php
  - tests/Unit/Content/Application/ContentTranslationServiceTest.php
  - tests/Unit/Content/Application/ContributedContentTranslationTest.php
  - tests/Unit/Content/Application/ExtensionContentTranslationTest.php
  - tests/Unit/Content/Infrastructure/Persistence/DoctrineContentRepositoryTest.php
  - tests/Unit/Content/Infrastructure/Persistence/DoctrineTranslationGroupRepositoryTest.php
  - tests/Unit/Content/Presentation/TranslationGroupPresenterTest.php
  - tests/Unit/Extension/Runtime/RestrictedExtensionContainerTest.php
  - tests/Unit/Http/Handler/HomePageHandlerTest.php
  - tests/Unit/Http/Handler/PublishedContentHandlerTest.php
  - tests/Unit/Infrastructure/Persistence/Migration/DocumentContentTypesMigrationTest.php
  - tests/Unit/Presentation/ContentLayoutCatalogTest.php
  - tests/Unit/Site/Application/PublicPageLocatorTest.php
  - tests/Unit/Site/Infrastructure/Persistence/DoctrineSiteSettingsTest.php
  - tests/Unit/Studio/Application/Authoring/ContentStudioAuthoringContextAuthorityTest.php
  - tests/Unit/Studio/Application/Authoring/ContentStudioAuthoringTargetResolverTest.php
  - tests/Unit/Studio/Application/Composition/StudioPublishedContentRendererTest.php
  - tests/Unit/Studio/Application/Composition/StudioPublishedStylesheetTest.php
  - tests/Unit/Studio/Application/Preview/ContentStudioPreviewBindingSourceTest.php
  - tests/Unit/Studio/Application/Projection/ContentStudioProjectorTest.php
  - tests/Unit/Studio/Application/Projection/ContentStudioResourceSearchProviderTest.php
  - tests/Unit/Studio/Application/Projection/RecordAuthorizedStudioContentFieldDisclosureTest.php
  - tests/Unit/Studio/Application/Projection/StudioContentProjectionServiceTest.php
  - tests/Unit/Workflow/Application/ContentTransitionAuthorizerTest.php
  split_tests: []
  prohibited_duplicates:
  - tests/Unit/Content/Domain/ContentEntryTest.php
  - tests/Unit/Content/Domain/ContentRevisionTest.php
  - tests/Unit/Content/Domain/ContentStatusTest.php
  - tests/Unit/Content/Domain/ExpectedVersionTest.php
  - tests/Unit/Content/Domain/JsonSchemaValidatorTest.php
  - tests/Unit/Content/Domain/PublicationWindowTest.php
  - tests/Unit/Content/Domain/SchemaCompatibilityCheckerTest.php
  - tests/Unit/Content/Domain/TranslationGroupTest.php
  - tests/Unit/Workflow/Domain/WorkflowTest.php
  corpora:
  - tests/Domain/ContentEntryTest.php
  - tests/Domain/ContentRevisionTest.php
  - tests/Domain/ContentSnapshotBoundaryTest.php
  - tests/Domain/ContentStatusTest.php
  - tests/Domain/ExpectedVersionTest.php
  - tests/Domain/JsonSchemaValidatorTest.php
  - tests/Domain/PublicationWindowTest.php
  - tests/Domain/SchemaCompatibilityCheckerTest.php
  - tests/Domain/TranslationGroupTest.php
  - tests/Workflow/WorkflowDefinitionBoundaryTest.php
  - tests/Workflow/WorkflowTest.php
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
  - examples/standalone.php
  changelog_record: CHANGELOG.md#0.1.1
release_expectations:
  version_policy: SemVer; 0.1.1 candidate source release record, published baseline 0.1.0. Exact consumer pins
    follow independent artifact verification.
  expected_artifact_types:
  - Composer ZIP
  required_checks:
  - '@composer:validate'
  - '@lint'
  - '@api'
  - '@architecture'
  - '@analyse'
  - '@cs'
  - '@test'
  - '@examples'
  - '@security'
  - '@clean-consumer'
  - '@manifests'
  required_registry_or_installer: Composer
  required_external_attestation: true
governance:
  completion_claim: false
decisions:
- Canonical namespace move; no aliases or dual production ownership after adoption
- See docs/dependency-decision.md for the published stable dependency coordinates
- Full original source digests remain in docs/source-map.json; governed extracted-symbol inventory uses the
  exact v2 schema.
- Owner package contracts are implemented; App adoption and legacy deletion remain a separate consumer phase.
blockers: []
consumer_contract:
  permitted_only_when:
  - Verify the published package and exact dependency identities before consumer deployment.
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Compose the verified package through its documented public API and host-owned
    services.
  namespace_or_api_replacements: []
  files_to_update: []
  files_to_remove: []
  tests_to_remove: []
  tests_to_retain_or_add:
  - tests/Integration/Content/MultilingualContentIntegrationTest.php
  - tests/Integration/Extension/ContributedContentTranslationIntegrationTest.php
  - tests/Integration/Studio/StudioArtifactRecoveryVectorReplayIntegrationTest.php
  - tests/Unit/Administrator/Content/ContentFormTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorContentEditorHandlerTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorContentEditorRetentionTest.php
  - tests/Unit/Administrator/Http/Handler/AdministratorDashboardHandlerTest.php
  - tests/Unit/Application/Authorization/AdapterAuthorizationParityTest.php
  - tests/Unit/Application/Authorization/ApplicationAuthorizationTest.php
  - tests/Unit/Content/Application/ContentTranslationServiceTest.php
  - tests/Unit/Content/Application/ContributedContentTranslationTest.php
  - tests/Unit/Content/Application/ExtensionContentTranslationTest.php
  - tests/Unit/Content/Infrastructure/Persistence/DoctrineContentRepositoryTest.php
  - tests/Unit/Content/Infrastructure/Persistence/DoctrineTranslationGroupRepositoryTest.php
  - tests/Unit/Content/Presentation/TranslationGroupPresenterTest.php
  - tests/Unit/Extension/Runtime/RestrictedExtensionContainerTest.php
  - tests/Unit/Http/Handler/HomePageHandlerTest.php
  - tests/Unit/Http/Handler/PublishedContentHandlerTest.php
  - tests/Unit/Infrastructure/Persistence/Migration/DocumentContentTypesMigrationTest.php
  - tests/Unit/Presentation/ContentLayoutCatalogTest.php
  - tests/Unit/Site/Application/PublicPageLocatorTest.php
  - tests/Unit/Site/Infrastructure/Persistence/DoctrineSiteSettingsTest.php
  - tests/Unit/Studio/Application/Authoring/ContentStudioAuthoringContextAuthorityTest.php
  - tests/Unit/Studio/Application/Authoring/ContentStudioAuthoringTargetResolverTest.php
  - tests/Unit/Studio/Application/Composition/StudioPublishedContentRendererTest.php
  - tests/Unit/Studio/Application/Composition/StudioPublishedStylesheetTest.php
  - tests/Unit/Studio/Application/Preview/ContentStudioPreviewBindingSourceTest.php
  - tests/Unit/Studio/Application/Projection/ContentStudioProjectorTest.php
  - tests/Unit/Studio/Application/Projection/ContentStudioResourceSearchProviderTest.php
  - tests/Unit/Studio/Application/Projection/RecordAuthorizedStudioContentFieldDisclosureTest.php
  - tests/Unit/Studio/Application/Projection/StudioContentProjectionServiceTest.php
  - tests/Unit/Workflow/Application/ContentTransitionAuthorizerTest.php
  di_or_provisioning_changes:
  - No provider or factories; retain host services and bind host persistence ports explicitly.
  capability_index_changes:
  - Core maintains its current dependency and capability inventory.
  changelog_and_evidence_changes:
  - Record enabling-refactor; completion_claim false
  verification_commands:
  - composer check
  - composer clean-consumer
---

# Content Model release record

## Package contract

Content Model owns portable content, revision, translation and editorial workflow models with persistence ports. The [Core contract](core-contract.md) defines the host boundary.
Retained migration/change-set IDs identify independent attestations and historical source ownership.

## Public API and responsibility

The [public API](public-api.md), [charter](../CHARTER.md) and canonical public manifests define the supported
package surface. Core retains authorization, transactions, persistence and runtime lifecycle responsibilities.

## Dependencies and semantic inputs

[Composer metadata](../composer.json) declares runtime dependencies. The machine record preserves exact semantic
inputs, public manifest hashes and source provenance. Coordinates do not self-attest independent verification.

## Consumer contract

Use the documented API and host-supplied services. The package never acquires authority from metadata or port
selection. See [integration](integration.md) and the [Core contract](core-contract.md).

## Test ownership

Package-owned tests enforce behavior, boundaries, malformed-input refusals and conformance. Core retains its
composition, storage, authority, deployment and recovery coverage. Test ownership remains explicit.

## Consumer verification

Verify the published artifact, exact dependency identities and authoritative no-dev consumer before deployment.
Package publication and source CI do not establish Core integration or production workload acceptance.

## Compatibility and drift

Preserve public signatures, wire shapes, semantic ownership and dependency boundaries. Refresh declared public
manifest hashes with reviewed contract changes. Final publication identities belong in external evidence.

## Validation

Run the complete composer check command and release automation regressions. The shared PR and default-branch
workflow validates the tested source, including package-owned tests and the built archive's no-dev consumer.
See [releasing](releasing.md) for versioning, immutable tag handling and publication evidence.
