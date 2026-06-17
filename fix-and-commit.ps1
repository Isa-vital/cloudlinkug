# fix-and-commit.ps1 - Write corrected JSON-LD and immediately commit
$ErrorActionPreference = 'Stop'
Set-Location 'c:\xampp\htdocs\isaac\cloudlink'

function Replace-SchemaBlock($file, $pattern, $replacement) {
    $full = Join-Path $PWD $file
    $content = [System.IO.File]::ReadAllText($full)
    $newContent = [regex]::Replace($content, $pattern, $replacement, [System.Text.RegularExpressions.RegexOptions]::Singleline)
    if ($newContent -eq $content) {
        Write-Host "UNCHANGED: $file"
    } else {
        [System.IO.File]::WriteAllText($full, $newContent)
        Write-Host "FIXED: $file"
    }
}

# Pattern: match @push('schema')...@endpush blocks
$schemaPattern = "(?<=\n)@push\('schema'\)\s*\n<script type=""application/ld\+json"">\s*\n[\s\S]*?</script>\s*\n@endpush"

# Also pattern for layout's inline script (not in @push)
$layoutPattern = '(?<=\n)    <script type="application/ld\+json">\s*\n[\s\S]*?</script>\s*\n    @stack\(''schema''\)'

# ── home.blade.php ──
Replace-SchemaBlock 'resources\views\home.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'WebSite', 'name' => `$siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url'), 'description' => `$siteSetting['tagline'] ?? 'Powering Business Through Smart Technology', 'potentialAction' => ['@type' => 'SearchAction', 'target' => config('app.url') . '/blog?q={search_term_string}', 'query-input' => 'required name=search_term_string']], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

# ── about.blade.php ──
Replace-SchemaBlock 'resources\views\about.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'AboutPage', 'name' => 'About Cloudlink IT Services', 'url' => route('about'), 'description' => `$page->meta_description ?? 'Learn about Cloudlink IT Services', 'mainEntity' => ['@type' => 'Organization', 'name' => `$siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url'), 'foundingDate' => '2015', 'address' => ['@type' => 'PostalAddress', 'streetAddress' => `$siteSetting['address'] ?? '', 'addressLocality' => 'Kampala', 'addressCountry' => 'UG']]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

# ── contact.blade.php ──
Replace-SchemaBlock 'resources\views\contact.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'ContactPage', 'name' => 'Contact Cloudlink IT Services', 'url' => route('contact.index'), 'description' => 'Get in touch with Cloudlink IT Services for a free consultation.', 'mainEntity' => ['@type' => 'LocalBusiness', 'name' => `$siteSetting['site_name'] ?? 'Cloudlink IT Services', 'telephone' => `$siteSetting['phone'] ?? '', 'email' => `$siteSetting['email'] ?? '', 'address' => ['@type' => 'PostalAddress', 'streetAddress' => `$siteSetting['address'] ?? '', 'addressLocality' => 'Kampala', 'addressCountry' => 'UG'], 'openingHoursSpecification' => ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '08:00', 'closes' => '18:00']]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

# ── portfolio.blade.php ──
Replace-SchemaBlock 'resources\views\portfolio.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'CollectionPage', 'name' => 'Portfolio - Cloudlink IT Services', 'url' => route('portfolio.index'), 'description' => 'View our portfolio of successful IT projects across various industries.'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

# ── page.blade.php ──
Replace-SchemaBlock 'resources\views\page.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'WebPage', 'name' => `$page->title, 'url' => route('page.show', `$page->slug), 'description' => `$page->meta_description ?? Str::limit(strip_tags(`$page->content), 200)], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

# ── blog/index.blade.php ──
Replace-SchemaBlock 'resources\views\blog\index.blade.php' $schemaPattern @"
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'Blog', 'name' => 'Cloudlink IT Services Blog', 'url' => route('blog.index'), 'description' => 'Latest insights on IT solutions, technology trends, and digital transformation.', 'publisher' => ['@type' => 'Organization', 'name' => `$siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url')]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
"@

Write-Host "`n=== SIMPLE FILES DONE ==="
