# Public API

All values enforce the documented constructor invariants. Domain methods perform no I/O, own no transaction and make no authorization decisions. Immutable values are safe to share; host inputs and lookup ports must remain generation-stable for the duration of an operation. Exceptions and parameter detail appear below verbatim from the source contract.

## Kumwe\Content\Application\ContentBrowseQuery

/**
 * Validated filter, sort and paging state for one administrator content-browser request.
 *
 * Every field arrives from the query string, and two of them — scope and sort — end up choosing SQL
 * predicates and `ORDER BY` clauses. Validating the whole set here, at construction, is what lets
 * `ContentSearchRepository` implementations map them without re-checking and without ever
 * interpolating operator input into the SQL grammar. The object is also the source of truth for
 * pagination links, since `toQueryParameters()` reproduces exactly the request that built it.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Validate one browse request, rejecting anything a repository could not safely act on.
     *
     * @param   string  $search       Free text matched against title and slug; blank disables the filter.
     * @param   string  $status       Workflow state key to restrict to; blank means every state.
     * @param   string  $contentType  UUID of the content type to restrict to; blank means every type.
     * @param   string  $scope        One of `active`, `trashed` or `all`, selecting the trash predicate.
     * @param   string  $sort         One of the `SORTS` keys, selecting the ordering.
     * @param   int     $page         One-based page number, capped so the offset cannot overflow.
     * @param   int     $perPage      Page size; only 10, 25 and 50 are offered by the browser.
     *
     * @throws  InvalidArgumentException  When any value is out of range, malformed, or off the vocabulary.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $search = '', string $status = '', string $contentType = '', string $scope = 'active', string $sort = 'updated_desc', int $page = 1, int $perPage = 25);
```

### withPage

/**
     * Return the same query aimed at a different page, keeping every filter and the sort intact.
     *
     * This is how the previous and next links are built, so the page number is validated again on the
     * way through rather than trusted from arithmetic done by the caller.
     *
     * @param   int  $page  One-based page number to move to.
     *
     * @return  self  A new query; the receiver is left untouched.
     *
     * @throws  InvalidArgumentException  When the page number falls outside the accepted range.
     *
     * @since   2.0.0
     */

```php
public function withPage(int $page): Kumwe\Content\Application\ContentBrowseQuery;
```

### toQueryParameters

/**
     * Render the query back into the public query-string parameters that would reproduce it.
     *
     * Defaults are omitted so that the browser's own links stay short and a page-one, unfiltered
     * listing keeps a bare URL. Keys are the short public names — `q`, `type`, `per_page` — not the
     * property names.
     *
     * @return  array<string, int|string>  Only the values that differ from their defaults.
     *
     * @since   2.0.0
     */

```php
public function toQueryParameters(): array;
```

### Public properties

- `readonly string $search`
- `readonly string $status`
- `readonly string $contentType`
- `readonly string $scope`
- `readonly string $sort`
- `readonly int $page`
- `readonly int $perPage`

## Kumwe\Content\Application\ContentModelNotFound

/**
 * Raised when a content type or workflow definition the caller named is not published for the site.
 *
 * The content model is versioned and site-scoped, so a lookup misses for three different reasons: the
 * handle or UUID is unknown, the definition belongs to another site, or the specific version asked for
 * was never published. One exception covers both kinds of definition; the constructor carries which
 * kind was wanted so callers never have to compose the operator-facing wording themselves.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Describe the definition that could not be resolved.
     *
     * @param  string  $kind        Kind of definition in lowercase words, such as `content type` or `workflow`.
     * @param  string  $identifier  Handle or UUID the lookup asked for.
     * @param  ?int    $version     Version that was demanded, or null when the published head was wanted.
     *
     * @since  2.0.0
     */

```php
public function __construct(string $kind, string $identifier, ?int $version = NULL);
```

## Kumwe\Content\Application\ContentModelRepository

/**
 * Persistence contract for the versioned content model: content type and workflow definitions.
 *
 * Definitions are never edited in place. Each publication appends a new version and moves the head
 * pointer, so an entry written against version three keeps validating against version three even after
 * version four ships — which is the guarantee `ContentRecord` relies on when it pins its definition
 * versions. Every method is scoped by site, and lookups accept either the stable UUID or the operator's
 * handle so that seed data, console commands and the API can all name a definition the way that suits
 * them.
 *
 * @since  2.0.0
 */

### contentTypes

/**
     * List the head version of every content type published for a site.
     *
     * @param   SiteContext  $site  Site whose model is being read.
     *
     * @return  list<ContentTypeDefinition>  Ordered by handle, so administrator pickers are stable.
     *
     * @since   2.0.0
     */

```php
public function contentTypes(Kumwe\Context\Value\SiteContext $site): array;
```

### contentType

/**
     * Load one content type definition, at its head or at a specific published version.
     *
     * @param   SiteContext  $site        Site the definition must belong to.
     * @param   string       $identifier  UUID or operator-facing handle of the content type.
     * @param   ?int         $version     Version to load, or null for the current head.
     *
     * @return  ?ContentTypeDefinition  Null when the site has no such content type at that version.
     *
     * @since   2.0.0
     */

```php
public function contentType(Kumwe\Context\Value\SiteContext $site, string $identifier, ?int $version = NULL): ?Kumwe\Content\Domain\ContentTypeDefinition;
```

### insertContentType

/**
     * Register a brand new content type and its first version.
     *
     * @param   ContentTypeDefinition  $definition  Definition to store, at version one.
     *
     * @return  void
     *
     * @since   2.0.0
     */

```php
public function insertContentType(Kumwe\Content\Domain\ContentTypeDefinition $definition): void;
```

### publishContentType

/**
     * Append the next version of an existing content type and move its head pointer to it.
     *
     * The head move is conditional on the version the caller read, so two operators editing the same
     * content type cannot interleave publications and lose one of them.
     *
     * @param   ContentTypeDefinition  $definition       Definition carrying the already-incremented version.
     * @param   int                    $expectedVersion  Version the caller read before editing.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\VersionConflict  When the stored head has already moved on.
     *
     * @since   2.0.0
     */

```php
public function publishContentType(Kumwe\Content\Domain\ContentTypeDefinition $definition, int $expectedVersion): void;
```

### workflows

/**
     * List the head version of every workflow published for a site.
     *
     * @param   SiteContext  $site  Site whose model is being read.
     *
     * @return  list<WorkflowDefinition>  Ordered by handle, so administrator pickers are stable.
     *
     * @since   2.0.0
     */

```php
public function workflows(Kumwe\Context\Value\SiteContext $site): array;
```

### workflow

/**
     * Load one workflow definition, at its head or at a specific published version.
     *
     * Content entries pin the workflow version they were authored against, so the version argument is
     * the normal path here rather than an edge case.
     *
     * @param   SiteContext  $site        Site the definition must belong to.
     * @param   string       $identifier  UUID or operator-facing handle of the workflow.
     * @param   ?int         $version     Version to load, or null for the current head.
     *
     * @return  ?WorkflowDefinition  Null when the site has no such workflow at that version.
     *
     * @since   2.0.0
     */

```php
public function workflow(Kumwe\Context\Value\SiteContext $site, string $identifier, ?int $version = NULL): ?Kumwe\Content\Workflow\Domain\WorkflowDefinition;
```

### insertWorkflow

/**
     * Register a brand new workflow and its first version.
     *
     * @param   WorkflowDefinition  $definition  Definition to store, at version one.
     *
     * @return  void
     *
     * @since   2.0.0
     */

```php
public function insertWorkflow(Kumwe\Content\Workflow\Domain\WorkflowDefinition $definition): void;
```

### publishWorkflow

/**
     * Append the next version of an existing workflow and move its head pointer to it.
     *
     * @param   WorkflowDefinition  $definition       Definition carrying the already-incremented version.
     * @param   int                 $expectedVersion  Version the caller read before editing.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\VersionConflict  When the stored head has already moved on.
     *
     * @since   2.0.0
     */

```php
public function publishWorkflow(Kumwe\Content\Workflow\Domain\WorkflowDefinition $definition, int $expectedVersion): void;
```

## Kumwe\Content\Application\ContentNotFound

/**
 * Raised when a content entry the caller named does not exist within reach of the current context.
 *
 * `ContentService` turns a repository miss into this single name so that delivery code has one thing
 * to catch, whether the row is absent, belongs to another site, or is trashed while the caller asked
 * for live entries only. The message names the identifier and nothing about the stored content, so it
 * is safe to log or surface to an operator.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Describe the content entry that could not be resolved.
     *
     * @param  string  $id  UUID the lookup asked for, quoted back to the operator in the message.
     *
     * @since  2.0.0
     */

```php
public function __construct(string $id);
```

## Kumwe\Content\Application\ContentPage

/**
 * One screen of the administrator content browser: the visible records plus the paging state.
 *
 * `ContentService::browse()` filters repository batches through the authorization gateway before
 * paging them, so the page offset cannot be turned into a total row count. This value object
 * therefore reports neighbouring pages as plain booleans — derived from over-fetching one record —
 * rather than a total, which is all the list template needs to render its previous and next links.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Capture the records and paging state resolved for one browse request.
     *
     * @param  list<ContentRecord>  $items        Records the actor may read, in the order the query asked for.
     * @param  ContentBrowseQuery   $query        Filters and paging that produced this page, for building links.
     * @param  bool                 $hasPrevious  Whether a lower-numbered page exists.
     * @param  bool                 $hasNext      Whether at least one further authorized record follows.
     *
     * @since  2.0.0
     */

```php
public function __construct(array $items, Kumwe\Content\Application\ContentBrowseQuery $query, bool $hasPrevious, bool $hasNext);
```

### Public properties

- `readonly array $items`
- `readonly Kumwe\Content\Application\ContentBrowseQuery $query`
- `readonly bool $hasPrevious`
- `readonly bool $hasNext`

## Kumwe\Content\Application\ContentRecord

/**
 * A stored content entry together with the persistence facts the domain entry deliberately omits.
 *
 * `ContentEntry` models title, slug, data, workflow state and version and knows nothing about sites,
 * content models, or rows. Everything the application layer needs to place that entry in a site and
 * pin it to the definition versions it was authored against lives here, which keeps the domain free of
 * storage concerns while giving repositories, presenters and the API one object to move around. The
 * pinned `contentTypeVersion` and `workflowVersion` are what let a definition be republished without
 * silently re-validating or re-routing entries that were written under the previous version.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Assemble a record from a domain entry and its stored metadata.
     *
     * @param  ContentEntry        $entry               Domain entry carrying title, slug, data, state and version.
     * @param  string              $contentTypeId       UUID of the content type whose schema the data satisfies.
     * @param  string              $workflowId          UUID of the workflow governing this entry's transitions.
     * @param  DateTimeImmutable   $createdAt           When the entry was first written.
     * @param  DateTimeImmutable   $updatedAt           When the entry last changed, revisions included.
     * @param  ?DateTimeImmutable  $deletedAt           When the entry was trashed, or null while it is live.
     * @param  int                 $contentTypeVersion  Content type version this entry was authored against.
     * @param  int                 $workflowVersion     Workflow version whose states this entry's status belongs to.
     * @param  string              $siteIdentifier      Site that owns the entry; every query is scoped by it.
     *
     * @since  2.0.0
     */

```php
public function __construct(Kumwe\Content\Domain\ContentEntry $entry, string $contentTypeId, string $workflowId, DateTimeImmutable $createdAt, DateTimeImmutable $updatedAt, ?DateTimeImmutable $deletedAt = NULL, int $contentTypeVersion = 1, int $workflowVersion = 1, string $siteIdentifier = 'default');
```

### withEntry

/**
     * Return a copy carrying a revised domain entry and a fresh modification timestamp.
     *
     * The pinned content type and workflow versions are carried across unchanged, so revising an entry
     * never migrates it onto a definition version that was published after it was written.
     *
     * @param   ContentEntry       $entry      Result of revising or transitioning the current entry.
     * @param   DateTimeImmutable  $updatedAt  Instant the revision was applied.
     *
     * @return  self  A new record; the receiver is left untouched.
     *
     * @since   2.0.0
     */

```php
public function withEntry(Kumwe\Content\Domain\ContentEntry $entry, DateTimeImmutable $updatedAt): Kumwe\Content\Application\ContentRecord;
```

### withDeletedAt

/**
     * Return a copy that moves the entry into or out of the trash.
     *
     * Deletion is a soft marker only: the domain entry, its version and its workflow state are all
     * preserved, so restoring is the same call with a null marker rather than a rebuild.
     *
     * @param   ?DateTimeImmutable  $deletedAt  Instant the entry was trashed, or null to restore it.
     * @param   DateTimeImmutable   $updatedAt  Instant the change was applied.
     *
     * @return  self  A new record; the receiver is left untouched.
     *
     * @since   2.0.0
     */

```php
public function withDeletedAt(?DateTimeImmutable $deletedAt, DateTimeImmutable $updatedAt): Kumwe\Content\Application\ContentRecord;
```

### toArray

/**
     * Flatten the record into the associative shape the API, MCP and administrator templates render.
     *
     * The domain snapshot is spread first, so `id`, `title`, `slug`, `data`, `status`,
     * `publication_window` and `version` come straight from the entry and the storage metadata is
     * appended alongside it under snake-case keys.
     *
     * @return  array<string, mixed>  Timestamps are RFC 3339 strings; `deleted_at` is null while live.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly Kumwe\Content\Domain\ContentEntry $entry`
- `readonly string $contentTypeId`
- `readonly string $workflowId`
- `readonly DateTimeImmutable $createdAt`
- `readonly DateTimeImmutable $updatedAt`
- `readonly ?DateTimeImmutable $deletedAt`
- `readonly int $contentTypeVersion`
- `readonly int $workflowVersion`
- `readonly string $siteIdentifier`

## Kumwe\Content\Application\ContentRepository

/**
 * Persistence contract for content entries and the revision trail behind them.
 *
 * `ContentService` is written against this interface alone, which is what keeps optimistic
 * concurrency, soft deletion and revision capture out of the driver and in one place. Two obligations
 * shape every implementation: a write that names a stale version must be rejected rather than
 * silently applied, and trashing must mark the row instead of removing it so that a restore can bring
 * the entry back with its history. Adapters that can scope by site implement `SiteScopedContentRepository`
 * on top of this; the plain methods here answer for the whole installation.
 *
 * @since  2.0.0
 */

### all

/**
     * List stored entries in a bounded window, newest storage order first.
     *
     * Callers page through with `$offset` because the result is filtered for readability afterwards,
     * so a short return does not mean the store is exhausted.
     *
     * @param   int   $limit           Maximum records to return in this batch.
     * @param   bool  $includeDeleted  Whether trashed entries join the result.
     * @param   int   $offset          Records to skip before collecting the batch.
     *
     * @return  list<ContentRecord>  Empty once the offset has walked past the last stored entry.
     *
     * @since   2.0.0
     */

```php
public function all(int $limit = 100, bool $includeDeleted = false, int $offset = 0): array;
```

### find

/**
     * Load one entry by its identifier.
     *
     * @param   string  $id              UUID of the content entry.
     * @param   bool    $includeDeleted  Whether a trashed entry still counts as found.
     *
     * @return  ?ContentRecord  Null when no entry matches, or when it is trashed and not asked for.
     *
     * @since   2.0.0
     */

```php
public function find(string $id, bool $includeDeleted = false): ?Kumwe\Content\Application\ContentRecord;
```

### findPublishedById

/**
     * Load one entry by identifier only if it is publicly visible at the given instant.
     *
     * Visibility means a workflow state the entry's workflow declares public and a publication window
     * that contains the instant, so this is the lookup the public delivery path uses.
     *
     * @param   string             $id    UUID of the content entry.
     * @param   DateTimeImmutable  $time  Instant the visibility rules are evaluated at.
     *
     * @return  ?ContentRecord  Null when the entry is absent, trashed, unpublished, or out of window.
     *
     * @since   2.0.0
     */

```php
public function findPublishedById(string $id, DateTimeImmutable $time): ?Kumwe\Content\Application\ContentRecord;
```

### findPublishedBySlug

/**
     * Load one entry by its slug only if it is publicly visible at the given instant.
     *
     * @param   string             $slug  Route segment the public URL carries.
     * @param   DateTimeImmutable  $time  Instant the visibility rules are evaluated at.
     *
     * @return  ?ContentRecord  Null when the slug is unknown, or the entry is not visible then.
     *
     * @since   2.0.0
     */

```php
public function findPublishedBySlug(string $slug, DateTimeImmutable $time): ?Kumwe\Content\Application\ContentRecord;
```

### insert

/**
     * Store a newly created entry.
     *
     * @param   ContentRecord  $record  Record to write, already at version one.
     *
     * @return  void
     *
     * @since   2.0.0
     */

```php
public function insert(Kumwe\Content\Application\ContentRecord $record): void;
```

### update

/**
     * Overwrite an entry, but only if the stored row is still at the version the caller read.
     *
     * @param   ContentRecord  $record           Record carrying the already-incremented entry version.
     * @param   int            $expectedVersion  Version the caller read before revising.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\VersionConflict  When another writer moved the entry on first.
     *
     * @since   2.0.0
     */

```php
public function update(Kumwe\Content\Application\ContentRecord $record, int $expectedVersion): void;
```

### setDeletedAt

/**
     * Move an entry into or out of the trash without touching its content or revisions.
     *
     * @param   string              $id               UUID of the content entry.
     * @param   int                 $expectedVersion  Version the caller read before trashing or restoring.
     * @param   ?DateTimeImmutable  $deletedAt        Instant to mark as trashed, or null to restore.
     * @param   DateTimeImmutable   $updatedAt        Instant recorded as the entry's last modification.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\VersionConflict  When another writer moved the entry on first.
     *
     * @since   2.0.0
     */

```php
public function setDeletedAt(string $id, int $expectedVersion, ?DateTimeImmutable $deletedAt, DateTimeImmutable $updatedAt): void;
```

### appendRevision

/**
     * Append one immutable snapshot to an entry's revision trail.
     *
     * Callers write the revision inside the same transaction as the entry itself, so the trail never
     * lags behind the row it describes.
     *
     * @param   ContentRevision  $revision  Snapshot captured from the entry as it now stands.
     *
     * @return  void
     *
     * @since   2.0.0
     */

```php
public function appendRevision(Kumwe\Content\Domain\ContentRevision $revision): void;
```

### nextRevisionNumber

/**
     * Report the revision number the next snapshot of an entry should carry.
     *
     * @param   string  $contentEntryId  UUID of the content entry the trail belongs to.
     *
     * @return  int  One for an entry with no revisions yet, otherwise one past the highest stored.
     *
     * @since   2.0.0
     */

```php
public function nextRevisionNumber(string $contentEntryId): int;
```

## Kumwe\Content\Application\ContentSearchRepository

/**
 * Optional repository capability that answers the administrator content browser's filtered queries.
 *
 * `ContentRepository` can only list a site in storage order, which is too coarse for the browser's
 * search, status, type, trash and sort controls. A store able to push those filters down into its own
 * query language implements this alongside it, and `ContentService::browse()` refuses to browse at all
 * when the configured repository does not — an unfiltered fallback would quietly render the wrong
 * screen. What comes back is unfiltered by permission: the service still runs every record past the
 * authorization gateway before it counts towards a page.
 *
 * @since  2.0.0
 */

### searchForSite

/**
     * Return one storage-level batch of a site's entries matching the browse query.
     *
     * The window is a storage window, not the caller's page. Readability is decided per record after
     * the store answers, so the service walks batches from increasing offsets and does its own paging;
     * a full batch means "ask again", not "this is the page".
     *
     * @param   SiteContext         $site    Site whose entries the search is confined to.
     * @param   ContentBrowseQuery  $query   Validated filters and ordering to apply in the store.
     * @param   int                 $limit   Maximum records this batch may contain.
     * @param   int                 $offset  Records to skip before collecting the batch.
     *
     * @return  list<ContentRecord>  Matches in the query's order; empty once the offset passes the last row.
     *
     * @since   2.0.0
     */

```php
public function searchForSite(Kumwe\Context\Value\SiteContext $site, Kumwe\Content\Application\ContentBrowseQuery $query, int $limit, int $offset): array;
```

## Kumwe\Content\Application\IncompatibleDefinition

/**
 * Raised when publishing the next version of a definition would strand content already stored under it.
 *
 * `ContentModelService` compares the published schema against the proposed one before writing, and a
 * change that drops a property, tightens a type or narrows an enum leaves existing entries no longer
 * satisfying their own content type. Refusing by default is what keeps a definition edit from
 * invalidating live content by accident; an operator who accepts the consequence republishes with the
 * breaking opt-in, and the list carried here is copied into the audit event so the decision stays
 * recoverable. Every difference is reported at once rather than only the first, so a fix can be planned
 * in one pass.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Report every breaking difference the compatibility check found.
     *
     * @param  list<string>  $breakingChanges  One operator-readable sentence per incompatible difference.
     *
     * @since  2.0.0
     */

```php
public function __construct(array $breakingChanges);
```

### Public properties

- `readonly array $breakingChanges`

## Kumwe\Content\Application\SiteScopedContentRepository

/**
 * Content persistence whose every read is bounded by the site that owns the entry.
 *
 * One Kumwe installation serves several sites out of one set of tables, so a lookup by slug or by
 * identifier is only correct once the site is part of the question — two sites may legitimately both
 * publish `about-us`. A store able to enforce that bound implements this in place of plain
 * `ContentRepository`, and `ContentService` prefers these methods whenever the repository it was given
 * provides them, falling back to the installation-wide ones only for a store that cannot scope. An
 * entry owned by another site must read as absent here rather than be filtered out downstream, so a
 * caller that forgets to check cannot leak it.
 *
 * @since  2.0.0
 */

### allForSite

/**
     * List one site's stored entries in a bounded window.
     *
     * The caller pages with `$offset` because results are filtered for readability afterwards, so a
     * short batch does not mean the site is exhausted.
     *
     * @param   SiteContext  $site            Site whose entries the listing is confined to.
     * @param   int          $limit           Maximum records to return in this batch.
     * @param   bool         $includeDeleted  Whether trashed entries join the result.
     * @param   int          $offset          Records to skip before collecting the batch.
     *
     * @return  list<ContentRecord>  Empty once the offset has walked past the site's last entry.
     *
     * @since   2.0.0
     */

```php
public function allForSite(Kumwe\Context\Value\SiteContext $site, int $limit = 100, bool $includeDeleted = false, int $offset = 0): array;
```

### findForSite

/**
     * Load one entry by identifier, but only if the named site owns it.
     *
     * @param   SiteContext  $site            Site the entry must belong to.
     * @param   string       $id              UUID of the content entry.
     * @param   bool         $includeDeleted  Whether a trashed entry still counts as found.
     *
     * @return  ?ContentRecord  Null when the entry is absent, trashed and unwanted, or owned elsewhere.
     *
     * @since   2.0.0
     */

```php
public function findForSite(Kumwe\Context\Value\SiteContext $site, string $id, bool $includeDeleted = false): ?Kumwe\Content\Application\ContentRecord;
```

### findPublishedByIdForSite

/**
     * Load one of the site's entries by identifier only if it is publicly visible at the given instant.
     *
     * @param   SiteContext        $site  Site the entry must belong to.
     * @param   string             $id    UUID of the content entry.
     * @param   DateTimeImmutable  $time  Instant the visibility rules are evaluated at.
     *
     * @return  ?ContentRecord  Null when the entry is out of reach, unpublished, or out of window.
     *
     * @since   2.0.0
     */

```php
public function findPublishedByIdForSite(Kumwe\Context\Value\SiteContext $site, string $id, DateTimeImmutable $time): ?Kumwe\Content\Application\ContentRecord;
```

### findPublishedBySlugForSite

/**
     * Load one of the site's entries by slug only if it is publicly visible at the given instant.
     *
     * This is the lookup the public delivery path uses, and the reason the slug alone is not a key:
     * the same segment may be published by several sites at once.
     *
     * @param   SiteContext        $site  Site the entry must belong to.
     * @param   string             $slug  Route segment the public URL carries.
     * @param   DateTimeImmutable  $time  Instant the visibility rules are evaluated at.
     *
     * @return  ?ContentRecord  Null when the site has no such slug, or the entry is not visible then.
     *
     * @since   2.0.0
     */

```php
public function findPublishedBySlugForSite(Kumwe\Context\Value\SiteContext $site, string $slug, DateTimeImmutable $time): ?Kumwe\Content\Application\ContentRecord;
```

## Kumwe\Content\Application\TranslationGroupRepository

/**
 * Persistence contract for the translation group behind one logical item.
 *
 * Delivery asks exactly two questions of this port, and they are the two `hreflang` and the language
 * selector are built from: what group does the entry I am about to render belong to, and which locale
 * does this group publish under a given route segment. Both answers are assembled from the entries
 * themselves — a group is not a copy of its members, it is a view over them — so an implementation
 * reads the same rows the content repository does and decides publication the same way: against the
 * `public_states` of the workflow definition version each entry is pinned to.
 *
 * An entry that declares no group is not a failure. It answers null, and delivery renders the page with
 * no alternates and no selector, which is what an untranslated site looks like.
 *
 * @since  2.0.0
 */

### forContent

/**
     * Load the group one content entry belongs to.
     *
     * @param   SiteContext  $site       Site the entry and every sibling must belong to.
     * @param   string       $contentId  UUID of the content entry whose group is wanted.
     *
     * @return  ?TranslationGroup  The group with every locale of the item, or null when the entry
     *          declares no group or is not reachable in that site.
     *
     * @since   2.0.0
     */

```php
public function forContent(Kumwe\Context\Value\SiteContext $site, string $contentId): ?Kumwe\Content\Domain\TranslationGroup;
```

### declareGroup

/**
     * Declare the group a locale of an item belongs to, creating it on first use.
     *
     * Called when a translation is authored, which is the only moment a group comes into existence. The
     * declared fallback is recorded once, with the group, rather than repeated on every member — a
     * fallback that differed between two locales of the same item would not be a fallback at all.
     *
     * @param   SiteContext  $site          Site that owns the group.
     * @param   string       $groupId       UUID identifying the logical item across locales.
     * @param   LocaleTag    $memberLocale  Locale of the member causing a first declaration.
     * @param   ?LocaleTag   $fallback      Explicit fallback to verify or record; null leaves an existing
     *          declaration alone and uses the first member locale for a new group.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\InvalidTranslationGroup  When the group belongs to another site
     *          or an explicit fallback contradicts its stored declaration.
     *
     * @since   2.0.0
     */

```php
public function declareGroup(Kumwe\Context\Value\SiteContext $site, string $groupId, Kumwe\Localization\Domain\LocaleTag $memberLocale, ?Kumwe\Localization\Domain\LocaleTag $fallback = NULL): void;
```

### guardAttachment

/**
     * Lock a group and refuse an attachment that would break its site or member ceiling.
     *
     * This runs inside the content translation transaction after declaration and before the entry row is
     * updated. Locking the group row serializes concurrent locales, so the maximum remains an invariant of
     * stored state rather than a check performed only when delivery later reconstructs the group.
     *
     * @param   SiteContext  $site       Site that must own the group and the entry.
     * @param   string       $groupId    UUID of the logical item being attached to.
     * @param   string       $contentId  Entry being attached, excluded when it already belongs to the group.
     *
     * @return  void
     *
     * @throws  \Kumwe\Content\Domain\InvalidTranslationGroup  When the group belongs to another site
     *          or already carries the maximum number of other live members.
     * @throws  \RuntimeException  When no declared group can be locked or its member count is unreadable.
     *
     * @since   2.0.0
     */

```php
public function guardAttachment(Kumwe\Context\Value\SiteContext $site, string $groupId, string $contentId): void;
```

## Kumwe\Content\Domain\ContentEntry

/**
 * An editable unit of content: its title, slug, body, workflow state, language and version.
 *
 * This is the aggregate every content change goes through. It is immutable, so `revise()`,
 * `reschedule()`, `transition()` and `translate()` each return a successor one version higher, and each
 * demands the version the caller believed it was editing — which is how two editors racing on the same
 * entry are separated before either write reaches the database. The constructor is private and
 * validating, so an entry cannot exist in an invalid shape: identifier, title, slug, state key, locale
 * and body are all checked on every construction, including when a row is rebuilt out of storage.
 *
 * One entry is one locale of one logical item. The locale it is written in and the translation group it
 * belongs to are carried here because they decide what the entry *is*, not where it is stored: an entry
 * with no locale is content nobody has declared a language for, an entry with a locale and no group is
 * a language declared for an item that has not been translated yet, and an entry with both is one
 * member of a `TranslationGroup`. Publication stays per entry — the state and window on this object are
 * this locale's alone — which is what lets English be live while another language is still drafting.
 *
 * Deliberately absent: which site owns the entry, which content type and workflow version it was
 * authored against, and when it was stored. Those are persistence facts and live on `ContentRecord`,
 * which keeps this class free of storage concerns and safe to reason about on its own.
 *
 * @since  2.0.0
 */

### create

/**
     * Start a brand new entry at version one.
     *
     * The identifier is lowercased and the title trimmed on the way in, so callers may pass either
     * casing of a UUID and need not normalise operator input themselves.
     *
     * @param   string                   $id                  Canonical UUID minted for the new entry.
     * @param   string                   $title               Human-readable title as the author typed it.
     * @param   string                   $slug                Route segment the public URL will carry.
     * @param   array<array-key, mixed>  $data                Entry body; must already satisfy its type schema.
     * @param   ContentStatus|string     $status              State to open in, as an enum case or a state key.
     * @param   ?PublicationWindow       $publicationWindow   Visibility period, or null for an unbounded one.
     * @param   LocaleTag|string|null    $locale              Language being authored, or null to declare none.
     * @param   ?string                  $translationGroupId  Group this locale joins; pass the group of the
     *          entry being translated to create a sibling, or null for content that stands alone.
     *
     * @return  self  A version-one entry ready to be stored.
     *
     * @throws  InvalidArgumentException  When any value breaks a domain rule.
     * @throws  InvalidLocaleTag  When the locale is not a well-formed language tag.
     *
     * @since   2.0.0
     */

```php
public static function create(string $id, string $title, string $slug, array $data = array (
), Kumwe\Content\Domain\ContentStatus|string $status = \Kumwe\Content\Domain\ContentStatus::Draft, ?Kumwe\Content\Domain\PublicationWindow $publicationWindow = NULL, Kumwe\Localization\Domain\LocaleTag|string|null $locale = NULL, ?string $translationGroupId = NULL): Kumwe\Content\Domain\ContentEntry;
```

### reconstitute

/**
     * Rebuild an entry loaded from trusted persistence while preserving all
     * domain validation performed by the constructor.
     *
     * Unlike `create()` this preserves the stored version and state rather than starting over, so a
     * round trip through the repository leaves optimistic concurrency and workflow position intact.
     * Revalidating on the way back in is deliberate: a row corrupted outside the application fails
     * here rather than surfacing as invalid content later.
     *
     * @param   string                   $id                  Canonical UUID the row was stored under.
     * @param   string                   $title               Stored title.
     * @param   string                   $slug                Stored route segment.
     * @param   array<array-key, mixed>  $data                Stored entry body.
     * @param   ContentStatus|string     $status              Stored workflow state, as an enum case or key.
     * @param   PublicationWindow        $publicationWindow   Stored visibility period.
     * @param   int                      $version             Version the row currently carries.
     * @param   LocaleTag|string|null    $locale              Stored language tag, or null on a row written
     *          before the entry declared one.
     * @param   ?string                  $translationGroupId  Stored group identifier, or null when the entry
     *          belongs to no group.
     *
     * @return  self  The entry exactly as stored, with every domain rule re-checked.
     *
     * @throws  InvalidArgumentException  When a stored value no longer satisfies a domain rule.
     * @throws  InvalidLocaleTag  When the stored locale is not a well-formed language tag.
     *
     * @since   2.0.0
     */

```php
public static function reconstitute(string $id, string $title, string $slug, array $data, Kumwe\Content\Domain\ContentStatus|string $status, Kumwe\Content\Domain\PublicationWindow $publicationWindow, int $version, Kumwe\Localization\Domain\LocaleTag|string|null $locale = NULL, ?string $translationGroupId = NULL): Kumwe\Content\Domain\ContentEntry;
```

### id

/**
     * Return the entry's stable identifier.
     *
     * @return  string  Lowercase canonical UUID, unchanged across every revision of the entry.
     *
     * @since   2.0.0
     */

```php
public function id(): string;
```

### title

/**
     * Return the title as it should be shown to a reader or editor.
     *
     * @return  string  Between 1 and 255 characters, already trimmed.
     *
     * @since   2.0.0
     */

```php
public function title(): string;
```

### slug

/**
     * Return the route segment the entry is reachable under.
     *
     * @return  string  Lowercase ASCII words joined by single hyphens, at most 160 characters.
     *
     * @since   2.0.0
     */

```php
public function slug(): string;
```

### data

/**
     * Return the entry body.
     *
     * @return  array<string, mixed>  Top-level keys are strings and every value is JSON-compatible.
     *
     * @since   2.0.0
     */

```php
public function data(): array;
```

### status

/**
     * Return the workflow position, projected onto `ContentStatus` where it is one of the built-in states.
     *
     * A site running a custom workflow has states the enum does not model, so callers that must handle
     * both get the raw key back instead; use `statusKey()` when only the key matters.
     *
     * @return  ContentStatus|string  An enum case for a built-in state, otherwise the raw state key.
     *
     * @since   2.0.0
     */

```php
public function status(): Kumwe\Content\Domain\ContentStatus|string;
```

### statusKey

/**
     * Return the workflow position as the key persistence and workflow definitions speak in.
     *
     * @return  string  Lowercase state key, valid for both built-in and site-defined workflows.
     *
     * @since   2.0.0
     */

```php
public function statusKey(): string;
```

### publicationWindow

/**
     * Return the period within which a published entry is publicly visible.
     *
     * @return  PublicationWindow  Unbounded unless the author scheduled a start or an end.
     *
     * @since   2.0.0
     */

```php
public function publicationWindow(): Kumwe\Content\Domain\PublicationWindow;
```

### version

/**
     * Return the version the entry currently stands at.
     *
     * This is the value a caller must hand back as its `ExpectedVersion` when revising, so it is what
     * an editor form carries in a hidden field across the round trip.
     *
     * @return  int  One for a newly created entry, incremented by every successful change.
     *
     * @since   2.0.0
     */

```php
public function version(): int;
```

### locale

/**
     * Return the language this entry is written in.
     *
     * @return  ?LocaleTag  The normalised tag, or null for content whose language nobody has declared —
     *          which is every entry authored before the model carried one.
     *
     * @since   2.0.0
     */

```php
public function locale(): ?Kumwe\Localization\Domain\LocaleTag;
```

### translationGroupId

/**
     * Return the logical item this entry is one locale of.
     *
     * @return  ?string  Lowercase UUID shared by every locale of the item, or null when the entry belongs
     *          to no group and is therefore reachable in one language only.
     *
     * @since   2.0.0
     */

```php
public function translationGroupId(): ?string;
```

### isVisibleAt

/**
     * Decide whether the entry may be shown to the public at a given moment.
     *
     * Both halves must hold: the entry is in the published state, and the instant falls inside its
     * publication window. This is the only visibility rule; nothing about the reader is considered.
     *
     * @param   DateTimeImmutable  $instant  Moment the question is asked about, usually now.
     *
     * @return  bool  True only when a published entry's window contains the instant.
     *
     * @since   2.0.0
     */

```php
public function isVisibleAt(DateTimeImmutable $instant): bool;
```

### revise

/**
     * Produce the next version of the entry with new authored content.
     *
     * The workflow state is carried across untouched — editing never moves an entry through its
     * lifecycle, `transition()` does — and the version check happens before anything else, so a stale
     * editor is rejected rather than silently overwriting a colleague's work.
     *
     * @param   ExpectedVersion          $expectedVersion    Version the editor loaded and believes it is changing.
     * @param   string                   $title              Replacement title, trimmed on the way in.
     * @param   string                   $slug               Replacement route segment.
     * @param   array<array-key, mixed>  $data               Replacement body, validated as it is stored.
     * @param   ?PublicationWindow       $publicationWindow  New visibility period, or null to keep the current one.
     *
     * @return  self  A successor one version higher; the receiver is left untouched.
     *
     * @throws  VersionConflict  When the entry has already moved past the expected version.
     * @throws  InvalidArgumentException  When the replacement title, slug or body breaks a domain rule.
     *
     * @since   2.0.0
     */

```php
public function revise(Kumwe\Content\Domain\ExpectedVersion $expectedVersion, string $title, string $slug, array $data, ?Kumwe\Content\Domain\PublicationWindow $publicationWindow = NULL): Kumwe\Content\Domain\ContentEntry;
```

### reschedule

/**
     * Produce the next version of the entry with only its publication window moved.
     *
     * Scheduling is separated from `revise()` so that changing when something goes live does not
     * require resubmitting the body, and so the revision trail records the two kinds of change apart.
     * A published entry can be scheduled out of visibility this way without leaving its state.
     *
     * @param   ExpectedVersion    $expectedVersion    Version the caller believes it is changing.
     * @param   PublicationWindow  $publicationWindow  Replacement visibility period.
     *
     * @return  self  A successor one version higher; the receiver is left untouched.
     *
     * @throws  VersionConflict  When the entry has already moved past the expected version.
     *
     * @since   2.0.0
     */

```php
public function reschedule(Kumwe\Content\Domain\ExpectedVersion $expectedVersion, Kumwe\Content\Domain\PublicationWindow $publicationWindow): Kumwe\Content\Domain\ContentEntry;
```

### transition

/**
     * Produce the next version of the entry sitting in a new workflow state.
     *
     * The workflow is asked whether the edge exists before anything is built, which is why this is the
     * only way an entry's state may change: a target the workflow does not declare cannot be reached
     * even by a caller holding the right capability. Authorization is a separate question, decided by
     * `ContentService` from the transition's required capability.
     *
     * @param   ExpectedVersion       $expectedVersion  Version the caller believes it is changing.
     * @param   Workflow              $workflow         Lifecycle in force for this entry, built-in or site-defined.
     * @param   ContentStatus|string  $target           State to move to, as an enum case or a state key.
     *
     * @return  self  A successor one version higher, in the new state.
     *
     * @throws  VersionConflict  When the entry has already moved past the expected version.
     * @throws  InvalidArgumentException  When the target is not a well-formed state key.
     * @throws  \Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition  When the workflow declares no such edge.
     *
     * @since   2.0.0
     */

```php
public function transition(Kumwe\Content\Domain\ExpectedVersion $expectedVersion, Kumwe\Content\Workflow\Domain\Workflow $workflow, Kumwe\Content\Domain\ContentStatus|string $target): Kumwe\Content\Domain\ContentEntry;
```

### translate

/**
     * Produce the next version of the entry placed in a translation group under a declared locale.
     *
     * This is how an existing entry becomes the first member of a group, and how a freshly authored
     * translation is bound to the item it translates: both sides call this with the same group
     * identifier and their own locale. Nothing else moves — the body, the workflow state and the
     * publication window are all carried across — because declaring what language something is in is
     * not an editorial change to it, and a translation going live is its own `transition()`.
     *
     * The group's own invariants, that a locale appears once and that two locales do not share a slug,
     * belong to `TranslationGroup` and to the database, since one entry cannot see its siblings.
     *
     * @param   ExpectedVersion  $expectedVersion     Version the caller believes it is changing.
     * @param   LocaleTag        $locale              Language this entry is declared to be written in.
     * @param   string           $translationGroupId  UUID of the logical item this locale belongs to.
     *
     * @return  self  A successor one version higher, carrying the locale and the group.
     *
     * @throws  VersionConflict  When the entry has already moved past the expected version.
     * @throws  InvalidArgumentException  When the group identifier is not a canonical UUID.
     *
     * @since   2.0.0
     */

```php
public function translate(Kumwe\Content\Domain\ExpectedVersion $expectedVersion, Kumwe\Localization\Domain\LocaleTag $locale, string $translationGroupId): Kumwe\Content\Domain\ContentEntry;
```

### snapshot

/**
     * Flatten the entry into the plain structure stored, checksummed and rendered elsewhere.
     *
     * This is the canonical wire shape of an entry: `ContentRevision` hashes it to detect tampering,
     * `ContentRecord::toArray()` spreads it before adding storage metadata, and the API and templates
     * read it. Keys are snake-case and window bounds are RFC 3339 strings or null, so changing this
     * shape changes stored revision checksums as well as the public payload.
     *
     * `locale` and `translation_group` are written only by an entry that declares them, for exactly that
     * reason. An entry authored before content carried a language dimension snapshots to the bytes its
     * stored revision checksum was taken over, so adding the dimension invalidates no history.
     *
     * @return  array<string, mixed>  Keyed by `id`, `title`, `slug`, `data`, `status`,
     *          `publication_window` and `version`, plus `locale` and `translation_group` when declared.
     *
     * @since   2.0.0
     */

```php
public function snapshot(): array;
```

## Kumwe\Content\Domain\ContentRevision

/**
 * Immutable, checksummed snapshot of a content entry as it stood at one point in its history.
 *
 * `ContentService` captures one of these on every accepted change, which is what gives the editorial
 * history something to show, diff and restore from without keeping a mutable copy of the entry. The
 * checksum is taken over a canonical encoding of the snapshot — map keys sorted, slashes and unicode
 * left unescaped — so the same entry state always hashes identically no matter what key order the
 * store hands back, and `hasValidChecksum()` can therefore detect a revision row altered outside the
 * domain rather than merely a re-serialised one.
 *
 * @since  2.0.0
 */

### capture

/**
     * Snapshot an entry as it stands and compute the checksum that pins that state.
     *
     * This is the only way a revision comes into being, so no revision can exist without a checksum
     * that matches its snapshot. The caller supplies the sequence number because only the store knows
     * which numbers are already taken for that entry.
     *
     * @param   string             $id              UUID for the new revision row; lowercased on the way in.
     * @param   ContentEntry       $entry           Entry whose current state is captured.
     * @param   int                $revisionNumber  Next free number in the entry's sequence, at least one.
     * @param   DateTimeImmutable  $createdAt       Instant to stamp on the revision.
     *
     * @return  self  A revision carrying the snapshot and its freshly computed checksum.
     *
     * @throws  InvalidArgumentException  When the ID is not a canonical UUID or the number is below one.
     * @throws  JsonException  When the snapshot holds values that cannot be encoded for checksumming.
     *
     * @since   2.0.0
     */

```php
public static function capture(string $id, Kumwe\Content\Domain\ContentEntry $entry, int $revisionNumber, DateTimeImmutable $createdAt): Kumwe\Content\Domain\ContentRevision;
```

### id

/**
     * Return the identifier this revision is stored under.
     *
     * @return  string  Canonical UUID in lowercase.
     *
     * @since   2.0.0
     */

```php
public function id(): string;
```

### contentEntryId

/**
     * Identify the entry whose history this revision belongs to.
     *
     * @return  string  UUID of the snapshotted content entry.
     *
     * @since   2.0.0
     */

```php
public function contentEntryId(): string;
```

### revisionNumber

/**
     * Return where this revision sits in the entry's history.
     *
     * @return  int  One-based sequence number, unique within the entry and ascending with time.
     *
     * @since   2.0.0
     */

```php
public function revisionNumber(): int;
```

### snapshot

/**
     * Return the captured entry state, for rendering history or rebuilding an earlier entry.
     *
     * @return  array<string, mixed>  The `ContentEntry::snapshot()` payload as it stood when captured,
     *          in the key order it was supplied in rather than canonical order.
     *
     * @since   2.0.0
     */

```php
public function snapshot(): array;
```

### checksum

/**
     * Return the digest that pins the snapshot's content.
     *
     * @return  string  SHA-256 hex digest over the canonical encoding of the snapshot.
     *
     * @since   2.0.0
     */

```php
public function checksum(): string;
```

### createdAt

/**
     * Return when the snapshot was taken.
     *
     * @return  DateTimeImmutable  Capture instant, supplied by the clock the writing service holds.
     *
     * @since   2.0.0
     */

```php
public function createdAt(): DateTimeImmutable;
```

### hasValidChecksum

/**
     * Recompute the digest and report whether the snapshot still matches the checksum stored beside it.
     *
     * Worth asking after loading a revision from the store: a false answer means the row was changed
     * outside the domain, not that the entry itself moved on. The comparison is constant time.
     *
     * @return  bool  True when the snapshot and its stored checksum still agree.
     *
     * @throws  JsonException  When the snapshot holds values that cannot be encoded for checksumming.
     *
     * @since   2.0.0
     */

```php
public function hasValidChecksum(): bool;
```

## Kumwe\Content\Domain\ContentStatus

/**
 * Editorial states a content entry moves through under the workflow Kumwe ships with.
 *
 * An entry stores its state as a plain lowercase key so a site-defined workflow can introduce states
 * of its own; this enum names the four the default workflow uses and that the capability mapping in
 * `ContentService` and `ContentTransitionAuthorizer` reasons about. Only `Published` makes an entry
 * eligible for public delivery, and even then the entry's `PublicationWindow` decides when.
 *
 * @since  2.0.0
 */

### isPublic

/**
     * Report whether entries in this state are eligible for public delivery.
     *
     * Eligibility is not visibility: `ContentEntry::isVisibleAt()` also consults the publication
     * window, so a published entry outside its window stays unreachable.
     *
     * @return  bool  True only for `Published`.
     *
     * @since   2.0.0
     */

```php
public function isPublic(): bool;
```

### cases

Generated enum/runtime member.

```php
public static function cases(): array;
```

### from

Generated enum/runtime member.

```php
public static function from(string|int $value): static;
```

### tryFrom

Generated enum/runtime member.

```php
public static function tryFrom(string|int $value): ?static;
```

### Public properties

- `readonly string $name`
- `readonly string $value`

### Public constants

- `Draft = \Kumwe\Content\Domain\ContentStatus::Draft`
- `Review = \Kumwe\Content\Domain\ContentStatus::Review`
- `Published = \Kumwe\Content\Domain\ContentStatus::Published`
- `Archived = \Kumwe\Content\Domain\ContentStatus::Archived`

## Kumwe\Content\Domain\ContentTypeDefinition

/**
 * One published version of a site's content type: its handle, its schema, and the workflow it pins.
 *
 * Content types are versioned rather than edited, so entries validated against version two keep
 * validating against version two long after version three is published; a definition instance is
 * therefore a specific version, not a mutable type. `ContentModelService` is the only writer, and it
 * pins the workflow's version too, so republishing a workflow cannot silently change how existing
 * types behave. The constructor enforces every invariant a stored row must satisfy, which means a
 * definition read back from the database is either well formed or refuses to exist.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Assemble one version of a content type, rejecting anything the store must not round-trip.
     *
     * @param   string                $id               UUID identifying the content type across all of its versions.
     * @param   SiteContext           $site             Site whose content model this definition belongs to.
     * @param   string                $handle           Lowercase name operators and API callers address the type by.
     * @param   string                $name             Human-readable label shown in administrator screens.
     * @param   string                $workflowId       UUID of the workflow entries of this type follow.
     * @param   int                   $workflowVersion  Version of that workflow this definition pins itself to.
     * @param   array<string, mixed>  $schema           JSON object schema entry data must satisfy.
     * @param   int                   $version          Version of this definition, incremented on each publication.
     * @param   DateTimeImmutable     $createdAt        When version one of the content type was created.
     * @param   DateTimeImmutable     $publishedAt      When this particular version was published.
     *
     * @throws  InvalidArgumentException  When an ID is not a UUID, the handle or name is malformed, a
     *          version is below one, or the schema does not describe a JSON object.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $id, Kumwe\Context\Value\SiteContext $site, string $handle, string $name, string $workflowId, int $workflowVersion, array $schema, int $version, DateTimeImmutable $createdAt, DateTimeImmutable $publishedAt);
```

### schema

/**
     * Return the raw schema document, for handing to the validator or the compatibility checker.
     *
     * @return  array<string, mixed>  The stored JSON Schema object, unmodified.
     *
     * @since   2.0.0
     */

```php
public function schema(): array;
```

### fields

/**
     * Project the schema's top-level properties into field descriptions callers can iterate.
     *
     * Only string-keyed object fragments become fields, so a hand-edited schema yields fewer fields
     * rather than an error; nested objects are not flattened, and the order follows the schema.
     *
     * @return  list<FieldDefinition>  One entry per usable top-level property, empty when the schema
     *          declares none.
     *
     * @since   2.0.0
     */

```php
public function fields(): array;
```

### toArray

/**
     * Flatten the definition into the payload the content model API and console command render.
     *
     * Both the raw `schema` and its `fields` projection are included, so a client can either enforce
     * the contract itself or build a form without a second request. Timestamps are ISO-8601.
     *
     * @return  array<string, mixed>  Snake-cased definition payload keyed for transport.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $id`
- `readonly Kumwe\Context\Value\SiteContext $site`
- `readonly string $handle`
- `readonly string $name`
- `readonly string $workflowId`
- `readonly int $workflowVersion`
- `readonly int $version`
- `readonly DateTimeImmutable $createdAt`
- `readonly DateTimeImmutable $publishedAt`

## Kumwe\Content\Domain\ExpectedVersion

/**
 * Version a caller believes a content entry is at, carried into every mutating operation.
 *
 * Content writes are optimistic: nothing is locked while an editor has a form open, so each change
 * states the version it was composed against and is refused when the stored entry has moved on since.
 * Passing this value object instead of a bare integer keeps that comparison in one place, so a stale
 * editor form fails loudly as a `VersionConflict` rather than quietly overwriting another author.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Capture the version the caller expects the stored entry to carry.
     *
     * @param   int  $value  Version the caller last observed; entry versions start at one.
     *
     * @throws  InvalidArgumentException  When the version is below one and so cannot name a stored entry.
     *
     * @since   2.0.0
     */

```php
public function __construct(int $value);
```

### value

/**
     * Expose the expected version so a repository can filter its update statement on it.
     *
     * @return  int  Version the caller expects the stored entry to still carry.
     *
     * @since   2.0.0
     */

```php
public function value(): int;
```

### assertMatches

/**
     * Abandon the operation unless the stored entry is still at the expected version.
     *
     * @param   int  $actual  Version the entry carries in the store at this moment.
     *
     * @return  void
     *
     * @throws  VersionConflict  When another writer advanced the entry after the caller read it.
     *
     * @since   2.0.0
     */

```php
public function assertMatches(int $actual): void;
```

## Kumwe\Content\Domain\FieldDefinition

/**
 * One named property of a content type schema, paired with whether the type requires it.
 *
 * `ContentTypeDefinition::fields()` projects the schema's `properties` map into these so that form
 * builders and API presenters can iterate a content type field by field without parsing raw JSON
 * Schema themselves. The fragment is carried through unchanged: this value describes the field, it
 * does not enforce it — `JsonSchemaValidator` remains the only thing that checks values against it.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Capture one field of a content type schema.
     *
     * @param   string                $key       Field key as it appears under the schema's `properties`.
     * @param   array<string, mixed>  $schema    JSON Schema fragment describing this field alone.
     * @param   bool                  $required  Whether the content type lists this key under `required`.
     *
     * @throws  InvalidArgumentException  When the key is not a lowercase identifier or the fragment is a list.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $key, array $schema, bool $required);
```

### toArray

/**
     * Export the field in the shape content model API responses and form builders consume.
     *
     * @return  array{key: string, schema: array<string, mixed>, required: bool}  One `fields` entry.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly array $schema`
- `readonly string $key`
- `readonly bool $required`

## Kumwe\Content\Domain\InvalidContentData

/**
 * Raised when entry data fails the JSON Schema published by its content type.
 *
 * `JsonSchemaValidator::assertValid()` gathers every violation before it throws rather than stopping
 * at the first, so one rejected save can be turned into a complete field-by-field error response.
 * Callers that render that response read `$violations`; the exception message is only the flattened
 * form of the same list, kept readable for logs.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build the failure from the violations the validator collected in one pass.
     *
     * @param  list<string>  $violations  Violation messages, each prefixed with the JSON path it applies to.
     *
     * @since  2.0.0
     */

```php
public function __construct(array $violations);
```

### Public properties

- `readonly array $violations`

## Kumwe\Content\Domain\InvalidTranslationGroup

/**
 * Raised when a translation group would be assembled in a shape the delivery rules cannot honour.
 *
 * A translation group is read on the public request path to decide which `hreflang` links are emitted
 * and which locales the language selector offers, so a group that is internally inconsistent — two
 * entries claiming the same locale, a declared fallback naming a locale that has no entry, two locales
 * sharing one route segment — has to fail where it is built rather than where it is rendered. The
 * message names the rule that was broken so an editor can be told which locale is at fault.
 *
 * @since  2.0.0
 */

## Kumwe\Content\Domain\JsonSchemaValidator

/**
 * Deterministic, side-effect-free JSON Schema subset used by persisted content contracts.
 *
 * Content types are authored by operators, so a schema is untrusted input twice over: once as a
 * document that has to be safe to store, and once as a program that has to be safe to run on every
 * save. Restricting the language to a fixed keyword list is what buys that — no remote `$ref` to
 * fetch, no recursion into keywords with surprising semantics, no engine-dependent behaviour — and
 * `assertSupported()` enforces the restriction before a definition is ever persisted, so evaluating a
 * stored schema is always cheap and always terminates. Both entry points report every problem they
 * find rather than the first, because the caller is usually rendering a form. The validator holds no
 * state and touches nothing outside its arguments, so a single instance is safely shared.
 *
 * @since  2.0.0
 */

### assertSupported

/**
     * Refuse a schema that reaches outside the enforceable subset.
     *
     * Run this before a content type is stored: a schema that survives it can be evaluated later
     * without further checks. Unsupported keywords, unknown types and formats, and bounds that
     * contradict each other are all collected into one message rather than reported one save at a time.
     *
     * @param   array<string, mixed>  $schema  Candidate content type schema, as the operator authored it.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the schema uses anything the validator cannot enforce.
     *
     * @since   2.0.0
     */

```php
public function assertSupported(array $schema): void;
```

### assertValid

/**
     * Check a value against a schema, after re-confirming that the schema itself is enforceable.
     *
     * The schema is re-checked on every call rather than trusted from storage, so a definition that
     * was edited around the domain cannot smuggle an unsupported keyword into evaluation. Value
     * violations are gathered in full and raised together, letting an editor see every failing field
     * from a single save.
     *
     * @param   array<string, mixed>  $schema  Schema the value must satisfy.
     * @param   mixed                 $value   Decoded content to check, normally an entry's data map.
     *
     * @return  void
     *
     * @throws  InvalidArgumentException  When the schema itself falls outside the supported subset.
     * @throws  InvalidContentData  When the value breaks the schema; carries every violation found.
     *
     * @since   2.0.0
     */

```php
public function assertValid(array $schema, mixed $value): void;
```

## Kumwe\Content\Domain\PublicationWindow

/**
 * Optional start and end instants that bound when a published entry is actually delivered.
 *
 * Approval and timing are separate concerns: `ContentStatus::Published` records that an entry has
 * been approved, while this value object records when that approval takes effect. Delivery asks
 * `contains()` with the current instant on every request and the repository stores the two ends as the
 * `publish_at` and `unpublish_at` columns, so scheduling never depends on a job that flips a status at
 * the right minute. Either end may be absent, which is how an entry publishes immediately or forever.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Bound the window, rejecting a range that would close before it opens.
     *
     * @param   ?DateTimeImmutable  $startsAt  Instant delivery begins, or null to deliver from publication.
     * @param   ?DateTimeImmutable  $endsAt    Instant delivery stops, or null to deliver indefinitely.
     *
     * @throws  InvalidArgumentException  When both ends are given and the end is not strictly after the start.
     *
     * @since   2.0.0
     */

```php
public function __construct(?DateTimeImmutable $startsAt = NULL, ?DateTimeImmutable $endsAt = NULL);
```

### unbounded

/**
     * Build the window an entry carries when its author set no schedule at all.
     *
     * @return  self  A window open at both ends, so `contains()` holds for every instant.
     *
     * @since   2.0.0
     */

```php
public static function unbounded(): Kumwe\Content\Domain\PublicationWindow;
```

### startsAt

/**
     * Return the instant from which the entry may be delivered.
     *
     * @return  ?DateTimeImmutable  Null when delivery starts the moment the entry is published.
     *
     * @since   2.0.0
     */

```php
public function startsAt(): ?DateTimeImmutable;
```

### endsAt

/**
     * Return the instant at which delivery of the entry stops.
     *
     * @return  ?DateTimeImmutable  Null when the entry stays deliverable for as long as it is published.
     *
     * @since   2.0.0
     */

```php
public function endsAt(): ?DateTimeImmutable;
```

### contains

/**
     * Decide whether the window is open at the given instant.
     *
     * The window is half-open: the start instant falls inside it and the end instant does not, so two
     * back-to-back windows never both claim the same moment.
     *
     * @param   DateTimeImmutable  $instant  Moment being tested, normally the current request time.
     *
     * @return  bool  True while the entry is within its schedule.
     *
     * @since   2.0.0
     */

```php
public function contains(DateTimeImmutable $instant): bool;
```

## Kumwe\Content\Domain\SchemaCompatibilityChecker

/**
 * Names the schema changes that would strand content already authored against the previous version.
 *
 * A content type's field schema is versioned rather than migrated: stored entries stay pinned to the
 * version they were written under, so a narrower schema does not corrupt them, but it does reject them
 * the moment an editor reopens one and saves it back. `ContentModelService` runs this check before
 * every content type publication and refuses the change unless the operator explicitly opted in, which
 * makes the list returned here the text an operator is asked to confirm. Only narrowing counts as
 * breaking — new optional fields, widened bounds and dropped constraints pass without comment.
 *
 * @since  2.0.0
 */

### breakingChanges

/**
     * Compare two field schemas and name every change that could reject previously valid content.
     *
     * Removed fields, changed types, narrowed enumerations, altered patterns, raised minimums, lowered
     * maximums, newly required fields and a newly closed object are all reported. The result is sorted,
     * so the same pair of schemas always produces the same list and an operator prompt does not reorder
     * itself between reads. Only the top level of `properties` is inspected; nested object schemas are
     * compared as whole type definitions rather than field by field.
     *
     * @param   array<string, mixed>  $before  Field schema of the version currently published.
     * @param   array<string, mixed>  $after   Field schema the operator is proposing to publish next.
     *
     * @return  list<string>  One short phrase per breaking change, sorted; empty when the proposed schema
     *          still accepts everything the published one did.
     *
     * @since   2.0.0
     */

```php
public function breakingChanges(array $before, array $after): array;
```

## Kumwe\Content\Domain\TranslationGroup

/**
 * One logical item across every language it exists in, with one entry per locale and a declared fallback.
 *
 * This is the whole of the content half of the multilingual model. A group holds one member per locale;
 * each member is a real content entry with its own slug, its own workflow state and its own publication
 * window, so English going live while German is still drafting is the ordinary case rather than a
 * special one. The declared fallback is the locale a reader is served when the language they negotiated
 * has no member, or has one that is not published yet — and because a fallback that names nothing is
 * worse than no fallback at all, construction refuses a group whose fallback locale has no member.
 *
 * Two invariants beyond that are enforced here rather than left to the store: a locale appears at most
 * once, because "one entry per locale" is what makes `resolve()` deterministic, and two members never
 * share a slug, because a single route segment that resolves to two languages of the same item is a
 * duplicate URL rather than a translation. The database carries both constraints as well; this class is
 * what a reader in memory can rely on.
 *
 * Nothing here decides which locale the request is in. That is `LocaleNegotiator`'s answer, arrived at
 * from the caller's explicit choice, its `Accept-Language` header and the site's `default_locale`, and
 * it is handed to `resolve()` so content and interface never disagree about the current language.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Assemble a group and refuse one whose members contradict the delivery rules.
     *
     * @param   string                        $id              UUID identifying the logical item across locales.
     * @param   LocaleTag                     $fallbackLocale  Locale served when the negotiated one is missing
     *          or unpublished; must itself have a member.
     * @param   list<TranslationGroupMember>  $members         One entry per locale, at least one and at most 64.
     *
     * @throws  InvalidTranslationGroup  When the identifier is not a UUID, the member list is empty or past
     *          its ceiling, a locale or a slug is claimed twice, or the fallback locale has no member.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $id, Kumwe\Localization\Domain\LocaleTag $fallbackLocale, array $members);
```

### ofOne

/**
     * Build the group a single untranslated entry stands in as.
     *
     * An item that exists in one language is still a group of one, which is what lets delivery treat
     * translated and untranslated content through the same path instead of branching on whether a
     * translation exists yet.
     *
     * @param   string                  $id      UUID identifying the logical item.
     * @param   TranslationGroupMember  $member  The single locale the item is written in.
     *
     * @return  self  A group whose only member is also its declared fallback.
     *
     * @throws  InvalidTranslationGroup  When the identifier is not a canonical UUID.
     *
     * @since   2.0.0
     */

```php
public static function ofOne(string $id, Kumwe\Content\Domain\TranslationGroupMember $member): Kumwe\Content\Domain\TranslationGroup;
```

### members

/**
     * Every locale of the item, in canonical locale order.
     *
     * @return  list<TranslationGroupMember>  Never empty; construction requires at least one member.
     *
     * @since   2.0.0
     */

```php
public function members(): array;
```

### member

/**
     * The member written in one exact locale, published or not.
     *
     * @param   LocaleTag  $locale  Locale to look for, compared after normalisation.
     *
     * @return  ?TranslationGroupMember  The member, or null when the item has no entry in that locale.
     *
     * @since   2.0.0
     */

```php
public function member(Kumwe\Localization\Domain\LocaleTag $locale): ?Kumwe\Content\Domain\TranslationGroupMember;
```

### publishedMembers

/**
     * The members a visitor may actually be sent to at a given moment.
     *
     * This is what `hreflang` is built from, which is why it filters rather than lists: advertising a
     * locale that is still drafting invites a search engine to index a page it cannot fetch.
     *
     * @param   DateTimeImmutable  $instant  Moment publication is judged at, usually now.
     *
     * @return  list<TranslationGroupMember>  Published members in canonical locale order; empty when the
     *          whole item is still unpublished.
     *
     * @since   2.0.0
     */

```php
public function publishedMembers(DateTimeImmutable $instant): array;
```

### resolve

/**
     * Choose the member that best serves a negotiated locale at a given moment.
     *
     * Three steps, in order, and each one is a decision rather than a guess. An exact published member
     * wins. Failing that, a published member whose locale the negotiated one falls back through is used,
     * so a reader who asked for `pt-BR` is served `pt` before being sent to another language entirely.
     * Failing that the declared fallback is used, and only if it too is published — a fallback that is
     * still drafting is not a page anyone may see, so the answer is null and the caller decides whether
     * that is a miss or a redirect.
     *
     * @param   LocaleTag          $locale   Locale the request negotiated.
     * @param   DateTimeImmutable  $instant  Moment publication is judged at, usually now.
     *
     * @return  ?TranslationGroupMember  The member to serve, or null when nothing in the group is
     *          published at that instant.
     *
     * @since   2.0.0
     */

```php
public function resolve(Kumwe\Localization\Domain\LocaleTag $locale, DateTimeImmutable $instant): ?Kumwe\Content\Domain\TranslationGroupMember;
```

### isTranslated

/**
     * Whether the item carries more than the one language it was first written in.
     *
     * Delivery reads this to decide whether a language selector is worth rendering at all, so a site
     * that has never translated anything shows no selector rather than a selector of one.
     *
     * @return  bool  True when the group holds two or more locales.
     *
     * @since   2.0.0
     */

```php
public function isTranslated(): bool;
```

### Public properties

- `readonly string $id`
- `readonly Kumwe\Localization\Domain\LocaleTag $fallbackLocale`

### Public constants

- `MAXIMUM_MEMBERS = 64`

## Kumwe\Content\Domain\TranslationGroupMember

/**
 * One locale's entry inside a translation group: its own slug, its own publication state, its own window.
 *
 * This is the unit that makes per-locale publication real. English may be live while German is still
 * drafting, so a member carries the publication decision for its own locale and nothing else: whether
 * the entry's workflow state is public in the definition version the entry is pinned to, and the
 * schedule that state takes effect within. The repository decides the first half, because only it can
 * read the pinned workflow version's public states; the window is carried across unchanged so
 * `isVisibleAt()` answers the same question here as `ContentEntry::isVisibleAt()` does on the entry.
 *
 * The slug is the member's own. Two locales of one group never share one, which is what lets a visitor
 * arrive on `/about` and be offered `/ueber-uns` rather than the same URL twice.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Hold one locale's place in a group, with the publication facts that locale answers for.
     *
     * @param  LocaleTag          $locale             Locale this member is written in, already normalised.
     * @param  string             $contentId          UUID of the content entry carrying this locale.
     * @param  string             $slug               Route segment this locale is published under.
     * @param  string             $statusKey          Workflow state key the entry currently sits in.
     * @param  bool               $publicState        Whether that state key is public in the entry's pinned
     *         workflow definition version.
     * @param  PublicationWindow  $publicationWindow  Schedule the public state takes effect within.
     *
     * @since  2.0.0
     */

```php
public function __construct(Kumwe\Localization\Domain\LocaleTag $locale, string $contentId, string $slug, string $statusKey, bool $publicState, Kumwe\Content\Domain\PublicationWindow $publicationWindow);
```

### isVisibleAt

/**
     * Decide whether this locale is one a visitor may be sent to at a given moment.
     *
     * Both halves must hold, exactly as they do for a single entry: the workflow state is public in the
     * version the entry was written under, and the schedule contains the instant. A drafting locale
     * answers false, which is how it stays out of `hreflang` and out of the language selector.
     *
     * @param   DateTimeImmutable  $instant  Moment the question is asked about, usually now.
     *
     * @return  bool  True only when this locale is publicly deliverable then.
     *
     * @since   2.0.0
     */

```php
public function isVisibleAt(DateTimeImmutable $instant): bool;
```

### Public properties

- `readonly Kumwe\Localization\Domain\LocaleTag $locale`
- `readonly string $contentId`
- `readonly string $slug`
- `readonly string $statusKey`
- `readonly bool $publicState`
- `readonly Kumwe\Content\Domain\PublicationWindow $publicationWindow`

## Kumwe\Content\Domain\VersionConflict

/**
 * Signals that a content write quoted a version the stored record no longer carries.
 *
 * Content entries and content model definitions are written optimistically: nothing is locked while an
 * editor holds a form open, so every change states the version it was composed against and is refused
 * outright when another writer got there first. Raising this rather than applying the write blind is
 * what stops two administrator screens from silently overwriting each other. The message names both
 * versions, and the JSON API maps it to `412 Precondition Failed`, so the remedy is always to reload
 * the record and retry rather than to retry the same payload.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build the conflict from the two versions that failed to match.
     *
     * @param  int  $expected  Version the caller composed its change against.
     * @param  int  $actual    Version the record carries in the store now; adapters report zero when the
     *         row has been removed entirely.
     *
     * @since  2.0.0
     */

```php
public function __construct(int $expected, int $actual);
```

## Kumwe\Content\Workflow\Domain\InvalidWorkflowTransition

/**
 * Raised when a workflow is asked to move content along an edge it does not declare.
 *
 * Both `Workflow::assertCanTransition()` and `WorkflowDefinition::transition()` throw this instead of
 * returning a falsy answer, so a caller that commits a status change cannot skip the check by
 * ignoring a return value. Ask `Workflow::allows()` when a yes/no answer is what is wanted. The
 * message names the two states and nothing else, which makes it safe to surface to an operator.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build the failure from the two states the rejected transition named.
     *
     * Either state may arrive as a raw workflow state key or as the enum case that backs it — a
     * `ContentStatus` on the built-in workflow — and both are reduced to their string key so the
     * message reads the same whichever workflow raised it.
     *
     * @param  string|\BackedEnum  $from  State the content is leaving, as a state key or its enum case.
     * @param  string|\BackedEnum  $to    State the transition targeted, as a state key or its enum case.
     *
     * @since  2.0.0
     */

```php
public function __construct(BackedEnum|string $from, BackedEnum|string $to);
```

## Kumwe\Content\Workflow\Domain\Workflow

/**
 * Decides which status changes content is allowed to make.
 *
 * A `Workflow` is the routing half of the editorial lifecycle: it answers whether an edge exists,
 * never who may travel it. `ContentEntry::transition()` consults it before every status change, so an
 * edge this object does not declare cannot be committed. It is built either from the closed built-in
 * state machine — the default the container shares — or from a site's persisted `WorkflowDefinition`,
 * and answers the same questions in both cases, which is what lets the content service treat a custom
 * workflow and the built-in one identically.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build the workflow from a site's published definition, or from the built-in lifecycle.
     *
     * Every state a definition declares is registered before any edge is read, so a state with no
     * outgoing edge is carried with an empty target list rather than dropped from the map.
     *
     * @param  ?WorkflowDefinition  $definition  Published workflow to follow, or null for the built-in one.
     *
     * @since  2.0.0
     */

```php
public function __construct(?Kumwe\Content\Workflow\Domain\WorkflowDefinition $definition = NULL);
```

### allows

/**
     * Reports whether this workflow declares an edge between two states.
     *
     * A source state the workflow does not know answers false rather than raising, so content left on
     * a state that a newer workflow version dropped simply has no permitted moves.
     *
     * @param   ContentStatus|string  $from  State the content is leaving, as an enum case or state key.
     * @param   ContentStatus|string  $to    State the transition would move it to.
     *
     * @return  bool  True only when this exact edge is declared; the check is directional.
     *
     * @since   2.0.0
     */

```php
public function allows(Kumwe\Content\Domain\ContentStatus|string $from, Kumwe\Content\Domain\ContentStatus|string $to): bool;
```

### assertCanTransition

/**
     * Refuses a status change the workflow does not declare.
     *
     * This is the guard `ContentEntry::transition()` runs, which is why the failure is an exception
     * rather than a return value: it cannot be committed past by accident.
     *
     * @param   ContentStatus|string  $from  State the content is leaving, as an enum case or state key.
     * @param   ContentStatus|string  $to    State the transition would move it to.
     *
     * @return  void
     *
     * @throws  InvalidWorkflowTransition  When the workflow declares no edge between the two states.
     *
     * @since   2.0.0
     */

```php
public function assertCanTransition(Kumwe\Content\Domain\ContentStatus|string $from, Kumwe\Content\Domain\ContentStatus|string $to): void;
```

### allowedTargets

/**
     * Lists the statuses content may move to from where it stands, for a status picker or API affordance.
     *
     * State keys are projected back onto `ContentStatus`, so this reads the built-in lifecycle. A
     * custom workflow whose states are not content statuses is enumerated through
     * `WorkflowDefinition::transitions()` instead.
     *
     * @param   ContentStatus  $from  Status the content currently holds.
     *
     * @return  list<ContentStatus>  Permitted targets in declaration order; empty for a terminal status.
     *
     * @throws  \ValueError  When a state key of the workflow in force is not a `ContentStatus` case.
     *
     * @since   2.0.0
     */

```php
public function allowedTargets(Kumwe\Content\Domain\ContentStatus $from): array;
```

## Kumwe\Content\Workflow\Domain\WorkflowDefinition

/**
 * One published version of a site's editorial workflow: its states, its edges, and what each edge costs.
 *
 * This is the persisted counterpart to the built-in lifecycle, and the thing that lets a site define
 * its own states without inventing an authorization model alongside them. The constructor is the only
 * validation point, so every later reader — `Workflow`, the content service, the administration
 * screens — can trust that there is exactly one non-public initial state, that state keys and edges
 * are unique, that every edge references declared states, and that crossing the public boundary costs
 * a publishing capability. Instances are immutable and versioned: changing a published workflow means
 * building and publishing a new version, never mutating this one.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build a workflow version, enforcing every rule the rest of the system then takes for granted.
     *
     * Two of the checks are authorization rules rather than shape rules: an edge that enters a public
     * state from a non-public one must cost `content.publish`, and one that leaves a public state for
     * a non-public one must cost `content.unpublish` or `content.archive`. Without them a site could
     * define a workflow that published content behind a capability its editors already hold.
     *
     * @param   string                              $id           Canonical UUID identifying this workflow.
     * @param   SiteContext                         $site         Site whose content this workflow governs.
     * @param   string                              $handle       Lowercase identifier the workflow is addressed by.
     * @param   string                              $name         Human-readable label, 1 to 255 characters.
     * @param   list<WorkflowStateDefinition>       $states       Declared states; exactly one must be initial.
     * @param   list<WorkflowTransitionDefinition>  $transitions  Declared edges between those states.
     * @param   int                                 $version      Publication version, counting from one.
     * @param   DateTimeImmutable                   $createdAt    Instant this version was drafted.
     * @param   DateTimeImmutable                   $publishedAt  Instant this version became the one in force.
     *
     * @throws  InvalidArgumentException  When a field, the state set, or an edge breaks a workflow rule.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $id, Kumwe\Context\Value\SiteContext $site, string $handle, string $name, array $states, array $transitions, int $version, DateTimeImmutable $createdAt, DateTimeImmutable $publishedAt);
```

### states

/**
     * Returns the states this workflow version declares.
     *
     * @return  list<WorkflowStateDefinition>  Declaration order, with exactly one state flagged initial.
     *
     * @since   2.0.0
     */

```php
public function states(): array;
```

### transitions

/**
     * Returns the edges this workflow version declares.
     *
     * @return  list<WorkflowTransitionDefinition>  Declaration order; each edge carries the capability it costs.
     *
     * @since   2.0.0
     */

```php
public function transitions(): array;
```

### initialState

/**
     * Returns the state key newly created content starts on under this workflow.
     *
     * @return  string  Key of the single state flagged initial, which construction guarantees is not public.
     *
     * @throws  \LogicException  When no state is flagged initial, which the constructor rules out.
     *
     * @since   2.0.0
     */

```php
public function initialState(): string;
```

### transition

/**
     * Looks up the declared edge between two states, and with it the capability that edge costs.
     *
     * This is how the content service prices a status change on a custom workflow: it resolves the
     * edge here and authorizes the actor against `requiredCapability`, so an undeclared edge is
     * refused before any authorization decision is reached.
     *
     * @param   string  $from  Key of the state the content is leaving.
     * @param   string  $to    Key of the state the transition targets.
     *
     * @return  WorkflowTransitionDefinition  The matching edge, including the capability it requires.
     *
     * @throws  InvalidWorkflowTransition  When this version declares no edge between the two states.
     *
     * @since   2.0.0
     */

```php
public function transition(string $from, string $to): Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition;
```

### isPublic

/**
     * Reports whether content resting on a state is visible to anonymous visitors.
     *
     * An unrecognised key answers false, so content on a state that this version no longer declares
     * fails closed and stays unpublished.
     *
     * @param   string  $stateKey  Key of the state to inspect.
     *
     * @return  bool  True only when the state is declared public by this version.
     *
     * @since   2.0.0
     */

```php
public function isPublic(string $stateKey): bool;
```

### toArray

/**
     * Exports the version as the plain structure the API, console output and persistence layer read.
     *
     * @return  array<string, mixed>  States and transitions nested as arrays; timestamps in ATOM form.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $id`
- `readonly Kumwe\Context\Value\SiteContext $site`
- `readonly string $handle`
- `readonly string $name`
- `readonly int $version`
- `readonly DateTimeImmutable $createdAt`
- `readonly DateTimeImmutable $publishedAt`

## Kumwe\Content\Workflow\Domain\WorkflowStateDefinition

/**
 * One named state that content can rest in under a custom workflow.
 *
 * A state carries only what routing and visibility need: the key content records store, the label an
 * editor sees, and the two flags that give the state its role — `initial` marks where new content
 * enters, `public` marks a state whose content is reachable by anonymous visitors. Rules that
 * span more than one state, such as uniqueness of keys and the requirement that exactly one
 * non-public state be initial, belong to `WorkflowDefinition`; this class validates its own fields
 * only, so an invalid key or label never reaches the definition's cross-checks.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build a validated state, rejecting a key or label the workflow cannot route on.
     *
     * @param   string  $key      Lowercase identifier content records store, at most 40 characters.
     * @param   string  $name     Human-readable label shown to editors, 1 to 255 characters.
     * @param   bool    $initial  Whether new content enters the workflow on this state.
     * @param   bool    $public   Whether content resting here is visible to anonymous visitors.
     *
     * @throws  InvalidArgumentException  When the key is not a lowercase identifier or the name is out of range.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $key, string $name, bool $initial = false, bool $public = false);
```

### toArray

/**
     * Exports the state in the shape the workflow definition serializes and the API returns.
     *
     * @return  array{key: string, name: string, initial: bool, public: bool}  Keys match the constructor
     *          arguments, so the array feeds straight back into a new state.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $key`
- `readonly string $name`
- `readonly bool $initial`
- `readonly bool $public`

## Kumwe\Content\Workflow\Domain\WorkflowTransitionDefinition

/**
 * One declared edge of a custom workflow: the state it leaves, the state it enters, and its price.
 *
 * Binding a `Capability` to the edge itself is what lets a site design its own editorial process
 * without designing an authorization model to go with it — the content service resolves the edge for
 * a requested status change and authorizes the actor against `requiredCapability`. The capability is
 * carried here rather than derived from the states, which is why `WorkflowDefinition` additionally
 * refuses an edge whose capability would let an actor cross the public boundary on the cheap.
 *
 * @since  2.0.0
 */

### __construct

/**
     * Build a validated edge between two distinct states.
     *
     * Only the edge's own shape is checked here. Whether both keys name states the workflow actually
     * declares, and whether the capability is adequate for the boundary being crossed, are decided by
     * `WorkflowDefinition` once the whole set is known.
     *
     * @param   string      $from                Key of the state this edge leaves.
     * @param   string      $to                  Key of the state this edge enters.
     * @param   Capability  $requiredCapability  Capability an actor must hold to travel this edge.
     *
     * @throws  InvalidArgumentException  When either key is not a lowercase identifier, or both are the same.
     *
     * @since   2.0.0
     */

```php
public function __construct(string $from, string $to, Kumwe\Access\Capability $requiredCapability);
```

### toArray

/**
     * Exports the edge in the shape the workflow definition serializes and the API returns.
     *
     * @return  array{from: string, to: string, required_capability: string}  Capability flattened to its string.
     *
     * @since   2.0.0
     */

```php
public function toArray(): array;
```

### Public properties

- `readonly string $from`
- `readonly string $to`
- `readonly Kumwe\Access\Capability $requiredCapability`

