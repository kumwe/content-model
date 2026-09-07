# Migration handoff

```yaml
schema: kumwe-migration-handoff/v2
artifact_kind: framework_php
migration_id: KUMWE-MIG-2026-034
change_set: KUMWE-CS-2026-034
state: draft_pr_open
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
    - Kumwe\App\Content\Application
    - Kumwe\App\Content\Domain
    - Kumwe\App\Workflow\Domain
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
    php: ^8.5
    ext-mbstring: '*'
    kumwe/access-context: 0.1.0
    kumwe/access-control: dev-main
    kumwe/localization: 0.1.0
    ramsey/uuid: ^4.9
  active_related_pull_requests:
  - https://github.com/kumwe/access-control/pull/4
target:
  repository: https://github.com/kumwe/content-model
  artifact_identity: kumwe/content-model
  canonical_namespace_or_abi: Kumwe\Content\
  branch: agent/extract-content-model-runtime-v2
  pull_request: https://github.com/kumwe/content-model/pull/2
ownership:
  responsibility: Portable content, revision, translation and editorial workflow models
    with persistence ports.
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
    sha256: 939949d02cfabfe90d2ca445f44d062f4f09203082923b37e47c8420487e62cd
  - path: resources/capabilities/v1.json
    sha256: f0484c1777b6108b1fb1f8f3035ebf9e4df4c811a68a883e0edcd1a71d457c7d
  - path: resources/service-map/v1.json
    sha256: a314ed18a9f7aac0d13249f7c8777ea3e5b0db2fcafe808ac0c058d0350bf3e8
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
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\ContentEntry
    new_fqcn: Kumwe\Content\Domain\ContentEntry
    source_path: src/Content/Domain/ContentEntry.php
    target_path: src/Domain/ContentEntry.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: e58108ee512b6f6b820df12190e20d3739e3719dcc6fedf3abf143fa663bdb3d
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\ContentRevision
    new_fqcn: Kumwe\Content\Domain\ContentRevision
    source_path: src/Content/Domain/ContentRevision.php
    target_path: src/Domain/ContentRevision.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 91aac439dfa1a73f7f4bfade418cd5dd0fe135fc836672ed418aa3f85de4573e
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\ContentStatus
    new_fqcn: Kumwe\Content\Domain\ContentStatus
    source_path: src/Content/Domain/ContentStatus.php
    target_path: src/Domain/ContentStatus.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 6462da84bf8b61b51cdd19b90c61dcf074b5d62ebca0725dd66a0235bab8bae2
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\ContentTypeDefinition
    new_fqcn: Kumwe\Content\Domain\ContentTypeDefinition
    source_path: src/Content/Domain/ContentTypeDefinition.php
    target_path: src/Domain/ContentTypeDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 6b26970a5714cfefc1bc60059dcfc0a7c0dbe621af0cc377ad9105f96fb859a3
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\ExpectedVersion
    new_fqcn: Kumwe\Content\Domain\ExpectedVersion
    source_path: src/Content/Domain/ExpectedVersion.php
    target_path: src/Domain/ExpectedVersion.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: fc8c010c5934a17b466301657ee4a01618693d9e27e256f3509ccc1ddb9e4009
    kind: class
    public_methods:
    - __construct
    - value
    - assertMatches
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\FieldDefinition
    new_fqcn: Kumwe\Content\Domain\FieldDefinition
    source_path: src/Content/Domain/FieldDefinition.php
    target_path: src/Domain/FieldDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: a4a175f4a996f272228bbc650aeba6eb9f128d1df635e0e8de0025ad59e92eca
    kind: class
    public_methods:
    - __construct
    - toArray
    public_properties:
    - key
    - schema
    - required
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\InvalidContentData
    new_fqcn: Kumwe\Content\Domain\InvalidContentData
    source_path: src/Content/Domain/InvalidContentData.php
    target_path: src/Domain/InvalidContentData.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 8b1ee656fbd3b4b5898c9bdab4bf70de7f775d6b808453a1267a6aab54304804
    kind: class
    public_methods:
    - __construct
    public_properties:
    - violations
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\InvalidTranslationGroup
    new_fqcn: Kumwe\Content\Domain\InvalidTranslationGroup
    source_path: src/Content/Domain/InvalidTranslationGroup.php
    target_path: src/Domain/InvalidTranslationGroup.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 6929f399d28dfd35949fcd75a9d062388e5892e0fa32d64dbf193f9f91bd2d8a
    kind: class
    public_methods: []
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\JsonSchemaValidator
    new_fqcn: Kumwe\Content\Domain\JsonSchemaValidator
    source_path: src/Content/Domain/JsonSchemaValidator.php
    target_path: src/Domain/JsonSchemaValidator.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: db5589df27118c4eacf9e64858dd37e2000c853a37865edeaee8a7b79c197faa
    kind: class
    public_methods:
    - assertSupported
    - assertValid
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\PublicationWindow
    new_fqcn: Kumwe\Content\Domain\PublicationWindow
    source_path: src/Content/Domain/PublicationWindow.php
    target_path: src/Domain/PublicationWindow.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: d8d713411d87ec65fac39b9167bcc44d3f3defa1912abae8536c59f0bb554445
    kind: class
    public_methods:
    - __construct
    - unbounded
    - startsAt
    - endsAt
    - contains
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\SchemaCompatibilityChecker
    new_fqcn: Kumwe\Content\Domain\SchemaCompatibilityChecker
    source_path: src/Content/Domain/SchemaCompatibilityChecker.php
    target_path: src/Domain/SchemaCompatibilityChecker.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 0985d6df38bb17d12e16a214f1a351ec4a02351733225a808a07dd8a4fe294c4
    kind: class
    public_methods:
    - breakingChanges
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\TranslationGroup
    new_fqcn: Kumwe\Content\Domain\TranslationGroup
    source_path: src/Content/Domain/TranslationGroup.php
    target_path: src/Domain/TranslationGroup.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 67eca64e2d6b7b70eaa2fe2139083fa555ebba8af659e711484b1c316e09b3a7
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\TranslationGroupMember
    new_fqcn: Kumwe\Content\Domain\TranslationGroupMember
    source_path: src/Content/Domain/TranslationGroupMember.php
    target_path: src/Domain/TranslationGroupMember.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: a42142bf1ae9901f0084dd73bbb72aa9aa5fc0343fb917a834ffa01ac175a9bf
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Domain\VersionConflict
    new_fqcn: Kumwe\Content\Domain\VersionConflict
    source_path: src/Content/Domain/VersionConflict.php
    target_path: src/Domain/VersionConflict.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 101a0a3fd2908ec7424173c78cbbce5bf918ef819129fc4ff5809704d72544af
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Workflow\Domain\InvalidWorkflowTransition
    new_fqcn: Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition
    source_path: src/Workflow/Domain/InvalidWorkflowTransition.php
    target_path: src/Workflow/Domain/InvalidWorkflowTransition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 59f71a6359669303c5e964b49382820bf38f953af99b3b4dfc41dd9a05658922
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Workflow\Domain\Workflow
    new_fqcn: Kumwe\Content\Workflow\Domain\Workflow
    source_path: src/Workflow/Domain/Workflow.php
    target_path: src/Workflow/Domain/Workflow.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 8c80fc9cd84212243b276c9705939a847908766d34ce27efa933dc5885504e6e
    kind: class
    public_methods:
    - __construct
    - allows
    - assertCanTransition
    - allowedTargets
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Workflow\Domain\WorkflowDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowDefinition
    source_path: src/Workflow/Domain/WorkflowDefinition.php
    target_path: src/Workflow/Domain/WorkflowDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 7019a08dabc831ea9a9db103de981e331d394014becb2ec38759d1caa676e70a
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Workflow\Domain\WorkflowStateDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowStateDefinition
    source_path: src/Workflow/Domain/WorkflowStateDefinition.php
    target_path: src/Workflow/Domain/WorkflowStateDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 8e26b6eed93e9c253c3f8121cdf2e4f85690b6160e9f4705d1655646bdd92abe
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Workflow\Domain\WorkflowTransitionDefinition
    new_fqcn: Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition
    source_path: src/Workflow/Domain/WorkflowTransitionDefinition.php
    target_path: src/Workflow/Domain/WorkflowTransitionDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 3244b5b0fe9fc7b53e1b64e108d30c4c6b0b151aa3249448a4a7b3847950c3b1
    kind: class
    public_methods:
    - __construct
    - toArray
    public_properties:
    - from
    - to
    - requiredCapability
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentBrowseQuery
    new_fqcn: Kumwe\Content\Application\ContentBrowseQuery
    source_path: src/Content/Application/ContentBrowseQuery.php
    target_path: src/Application/ContentBrowseQuery.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 3e42f5f061d547a30522ed7dedd43ee42cbd054267adcbe6b73ef5f90f35be23
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentModelNotFound
    new_fqcn: Kumwe\Content\Application\ContentModelNotFound
    source_path: src/Content/Application/ContentModelNotFound.php
    target_path: src/Application/ContentModelNotFound.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 39904b81809aaec8e04a9cfa762e977ae1a3bfbb63708ad547559e91eabcadb6
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentModelRepository
    new_fqcn: Kumwe\Content\Application\ContentModelRepository
    source_path: src/Content/Application/ContentModelRepository.php
    target_path: src/Application/ContentModelRepository.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 306e5e224b1419780b857b4fb6b944df83b0440cf9bc6e8da47cc1ef64cd3389
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentNotFound
    new_fqcn: Kumwe\Content\Application\ContentNotFound
    source_path: src/Content/Application/ContentNotFound.php
    target_path: src/Application/ContentNotFound.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 3197e48912b1306382d4e25f2b36d3c80eb41977119cd7c1d6241f49b8090072
    kind: class
    public_methods:
    - __construct
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentPage
    new_fqcn: Kumwe\Content\Application\ContentPage
    source_path: src/Content/Application/ContentPage.php
    target_path: src/Application/ContentPage.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: bbaf3a29fa36bc02bfb992890df62a8f404067401f4e18ec4e9b83e4cd99b1e0
    kind: class
    public_methods:
    - __construct
    public_properties:
    - items
    - query
    - hasPrevious
    - hasNext
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentRecord
    new_fqcn: Kumwe\Content\Application\ContentRecord
    source_path: src/Content/Application/ContentRecord.php
    target_path: src/Application/ContentRecord.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: d3122c85092de038d356fab39fa40fea6d63446f41d8a9bb48cafa7b9e9b31d1
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentRepository
    new_fqcn: Kumwe\Content\Application\ContentRepository
    source_path: src/Content/Application/ContentRepository.php
    target_path: src/Application/ContentRepository.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 01d01d017d5047f453712ecabf85fe382a12f50786cd50f42d2b3214e217d227
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
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\ContentSearchRepository
    new_fqcn: Kumwe\Content\Application\ContentSearchRepository
    source_path: src/Content/Application/ContentSearchRepository.php
    target_path: src/Application/ContentSearchRepository.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: ced612e1a533b742879fcd599f1b47a976e151eb26cd0b08d43ee2e4a32defa5
    kind: interface
    public_methods:
    - searchForSite
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\IncompatibleDefinition
    new_fqcn: Kumwe\Content\Application\IncompatibleDefinition
    source_path: src/Content/Application/IncompatibleDefinition.php
    target_path: src/Application/IncompatibleDefinition.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: e6dc38f7cf6b0291f3b45c693896c61378a0aa4181cb9a161a9e618f4fc87896
    kind: class
    public_methods:
    - __construct
    public_properties:
    - breakingChanges
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\SiteScopedContentRepository
    new_fqcn: Kumwe\Content\Application\SiteScopedContentRepository
    source_path: src/Content/Application/SiteScopedContentRepository.php
    target_path: src/Application/SiteScopedContentRepository.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: 70fb81a81dfd6e833364f44d55c494adad53c272e160ae466e52d095a8dff6aa
    kind: interface
    public_methods:
    - allForSite
    - findForSite
    - findPublishedByIdForSite
    - findPublishedBySlugForSite
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
  - repository: https://github.com/kumwe/app
    old_fqcn: Kumwe\App\Content\Application\TranslationGroupRepository
    new_fqcn: Kumwe\Content\Application\TranslationGroupRepository
    source_path: src/Content/Application/TranslationGroupRepository.php
    target_path: src/Application/TranslationGroupRepository.php
    source_commit: 24ecf956423c18933e824b43cea1bfb9127a79a9
    source_sha256: bc3bb7f84ab4375bfb2759c777dcf28bd66ba33bf54994977fffd75b1b8a2c57
    kind: interface
    public_methods:
    - forContent
    - declareGroup
    - guardAttachment
    public_properties: []
    public_constants: []
    compatibility: namespace ownership move; see COMPATIBILITY.md
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
    provider_absence_reason: Values, ports and deterministic stateless algorithms
      capture no collaborator or ambient state.
native_cpp: null
php_extension: null
tests:
  moved_or_added:
  - tests/Domain/ContentEntryTest.php
  - tests/Domain/ContentRevisionTest.php
  - tests/Domain/ContentStatusTest.php
  - tests/Domain/ExpectedVersionTest.php
  - tests/Domain/JsonSchemaValidatorTest.php
  - tests/Domain/PublicationWindowTest.php
  - tests/Domain/SchemaCompatibilityCheckerTest.php
  - tests/Domain/TranslationGroupTest.php
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
  prohibited_duplicates: &id001
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
  - path: tests/Domain/ContentEntryTest.php
    sha256: c7864b4dcb42090e6472c3445eadb79f76fa5a30ba29da5cc10f298494f9c28c
  - path: tests/Domain/ContentRevisionTest.php
    sha256: 913009992211749f4b3f50aafd063198b4cf327789f4163706bed833a4e35d75
  - path: tests/Domain/ContentStatusTest.php
    sha256: 9e4c37811354b631410861a9252fc670da6e7cba490342d5c03f1a8f39449d8c
  - path: tests/Domain/ExpectedVersionTest.php
    sha256: 9d0c6a7d497617be4ff23b3b6a21cf03e67cee1c444c4a7ff0fea57db1eabc68
  - path: tests/Domain/JsonSchemaValidatorTest.php
    sha256: 3b618f8934a0c75699a358f838ab2c2212d7cd1c34c8ad643abe198eb4f772af
  - path: tests/Domain/PublicationWindowTest.php
    sha256: 8e0d3a73dea1c90d01b1788423841990e6930dc7fc8b1f4fc296fb8a0329f3bb
  - path: tests/Domain/SchemaCompatibilityCheckerTest.php
    sha256: 018cbfc30f28db5b5c51f38ea7dfa7b865f0c2e3df52425a6eb0a8d4715d62fe
  - path: tests/Domain/TranslationGroupTest.php
    sha256: f331e20e14a1e0f57464006c9da5aab0ce91299227c128e6167e3d03c2b4f151
  - path: tests/Workflow/WorkflowTest.php
    sha256: 72a93d70eb7b1e0780116f60c38ed27362042a7663d5461e432ceecee8fb7a6e
documentation:
  charter: CHARTER.md
  readme: README.md
  public_api: docs/public-api.md
  architecture: docs/architecture.md
  integration_or_consumer: docs/integration.md
  examples:
  - examples/standalone.php
  changelog_record: CHANGELOG.md / 0.1.0
release_expectations:
  version_policy: SemVer; initial version 0.1.0 recorded for human merge; exact pre-1.0
    consumer pin after independent verification
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
  required_registry_or_installer: Composer
  required_external_attestation: false
next_task:
  phase_name: Independent release verification, followed by separately authorized
    App Phase 2
  permitted_only_when:
  - Human review and merge
  - All dependencies and this release independently attested
  - Current App drift reconciled upstream
  consumer_repository: https://github.com/kumwe/app
  dependency_or_native_change: Exact-pin independently verified immutable package;
    no adoption of development branches
  namespace_or_api_replacements:
  - old: Kumwe\App\Content\Domain\ContentEntry
    new: Kumwe\Content\Domain\ContentEntry
  - old: Kumwe\App\Content\Domain\ContentRevision
    new: Kumwe\Content\Domain\ContentRevision
  - old: Kumwe\App\Content\Domain\ContentStatus
    new: Kumwe\Content\Domain\ContentStatus
  - old: Kumwe\App\Content\Domain\ContentTypeDefinition
    new: Kumwe\Content\Domain\ContentTypeDefinition
  - old: Kumwe\App\Content\Domain\ExpectedVersion
    new: Kumwe\Content\Domain\ExpectedVersion
  - old: Kumwe\App\Content\Domain\FieldDefinition
    new: Kumwe\Content\Domain\FieldDefinition
  - old: Kumwe\App\Content\Domain\InvalidContentData
    new: Kumwe\Content\Domain\InvalidContentData
  - old: Kumwe\App\Content\Domain\InvalidTranslationGroup
    new: Kumwe\Content\Domain\InvalidTranslationGroup
  - old: Kumwe\App\Content\Domain\JsonSchemaValidator
    new: Kumwe\Content\Domain\JsonSchemaValidator
  - old: Kumwe\App\Content\Domain\PublicationWindow
    new: Kumwe\Content\Domain\PublicationWindow
  - old: Kumwe\App\Content\Domain\SchemaCompatibilityChecker
    new: Kumwe\Content\Domain\SchemaCompatibilityChecker
  - old: Kumwe\App\Content\Domain\TranslationGroup
    new: Kumwe\Content\Domain\TranslationGroup
  - old: Kumwe\App\Content\Domain\TranslationGroupMember
    new: Kumwe\Content\Domain\TranslationGroupMember
  - old: Kumwe\App\Content\Domain\VersionConflict
    new: Kumwe\Content\Domain\VersionConflict
  - old: Kumwe\App\Workflow\Domain\InvalidWorkflowTransition
    new: Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition
  - old: Kumwe\App\Workflow\Domain\Workflow
    new: Kumwe\Content\Workflow\Domain\Workflow
  - old: Kumwe\App\Workflow\Domain\WorkflowDefinition
    new: Kumwe\Content\Workflow\Domain\WorkflowDefinition
  - old: Kumwe\App\Workflow\Domain\WorkflowStateDefinition
    new: Kumwe\Content\Workflow\Domain\WorkflowStateDefinition
  - old: Kumwe\App\Workflow\Domain\WorkflowTransitionDefinition
    new: Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition
  - old: Kumwe\App\Content\Application\ContentBrowseQuery
    new: Kumwe\Content\Application\ContentBrowseQuery
  - old: Kumwe\App\Content\Application\ContentModelNotFound
    new: Kumwe\Content\Application\ContentModelNotFound
  - old: Kumwe\App\Content\Application\ContentModelRepository
    new: Kumwe\Content\Application\ContentModelRepository
  - old: Kumwe\App\Content\Application\ContentNotFound
    new: Kumwe\Content\Application\ContentNotFound
  - old: Kumwe\App\Content\Application\ContentPage
    new: Kumwe\Content\Application\ContentPage
  - old: Kumwe\App\Content\Application\ContentRecord
    new: Kumwe\Content\Application\ContentRecord
  - old: Kumwe\App\Content\Application\ContentRepository
    new: Kumwe\Content\Application\ContentRepository
  - old: Kumwe\App\Content\Application\ContentSearchRepository
    new: Kumwe\Content\Application\ContentSearchRepository
  - old: Kumwe\App\Content\Application\IncompatibleDefinition
    new: Kumwe\Content\Application\IncompatibleDefinition
  - old: Kumwe\App\Content\Application\SiteScopedContentRepository
    new: Kumwe\Content\Application\SiteScopedContentRepository
  - old: Kumwe\App\Content\Application\TranslationGroupRepository
    new: Kumwe\Content\Application\TranslationGroupRepository
  files_to_update:
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
  - composer.json
  - composer.lock
  files_to_remove:
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
  tests_to_remove: *id001
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
  - No provider or factories; retain host services and bind host persistence ports
    explicitly.
  capability_index_changes:
  - Replace implementation owner with exact verified package manifest
  changelog_and_evidence_changes:
  - Record enabling-refactor; completion_claim false
  verification_commands:
  - composer validate --strict
  - composer check
  - Applicable App integration, database, authority and delivery tests
concurrency:
  likely_conflict_files:
  - composer.json
  - composer.lock
  related_migrations:
  - access-context
  - access-control
  - contribution
  - localization
  ownership_conflicts: []
  integration_train: null
  resolution_rule: semantic-preservation
governance:
  roadmap_source_sha256: a202155ef1a65f5ab293d4f8397ebf4ac430db7f1e877c776bbe7851e6fe18d8
  roadmap_refs: []
  non_roadmap_refs:
  - NRM-2026-034
  completion_claim: false
decisions:
- Canonical namespace move; no aliases or dual production ownership after adoption
- See docs/dependency-decision.md for the published stable dependency coordinates
blockers:
- Human review and merge of the 0.1.0 release record; automatic publication follows the package gate
- Independent artifact verification and App adoption remain separate follow-up work
```
