$ErrorActionPreference = 'Stop'
$base = 'c:\xampp\htdocs\isaac\cloudlink\resources\views'

function Fix-File($relPath, $oldBlock, $newBlock) {
    $full = Join-Path $base $relPath
    $content = [System.IO.File]::ReadAllText($full)
    if ($content.Contains($oldBlock)) {
        $content = $content.Replace($oldBlock, $newBlock)
        [System.IO.File]::WriteAllText($full, $content)
        Write-Host "FIXED: $relPath"
    } else {
        Write-Host "SKIP (not found): $relPath"
    }
}

# ── home.blade.php ──
Fix-File 'home.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "WebSite",
        "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
        "url": "{{ config('app.url') }}",
        "description": "{{ $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology' }}",
        "potentialAction": {
            "@type": "SearchAction",
            "target": "{{ config('app.url') }}/blog?q={search_term_string}",
            "query-input": "required name=search_term_string"
        }
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'WebSite', 'name' => $siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url'), 'description' => $siteSetting['tagline'] ?? 'Powering Business Through Smart Technology', 'potentialAction' => ['@type' => 'SearchAction', 'target' => config('app.url') . '/blog?q={search_term_string}', 'query-input' => 'required name=search_term_string']], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

# ── about.blade.php ──
Fix-File 'about.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "AboutPage",
        "name": "About Cloudlink IT Services",
        "url": "{{ route('about') }}",
        "description": "{{ $page->meta_description ?? 'Learn about Cloudlink IT Services' }}",
        "mainEntity": {
            "@type": "Organization",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "url": "{{ config('app.url') }}",
            "foundingDate": "2015",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $siteSetting['address'] ?? '' }}",
                "addressLocality": "Kampala",
                "addressCountry": "UG"
            }
        }
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'AboutPage', 'name' => 'About Cloudlink IT Services', 'url' => route('about'), 'description' => $page->meta_description ?? 'Learn about Cloudlink IT Services', 'mainEntity' => ['@type' => 'Organization', 'name' => $siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url'), 'foundingDate' => '2015', 'address' => ['@type' => 'PostalAddress', 'streetAddress' => $siteSetting['address'] ?? '', 'addressLocality' => 'Kampala', 'addressCountry' => 'UG']]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

# ── contact.blade.php ──
Fix-File 'contact.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "ContactPage",
        "name": "Contact Cloudlink IT Services",
        "url": "{{ route('contact.index') }}",
        "description": "Get in touch with Cloudlink IT Services for a free consultation.",
        "mainEntity": {
            "@type": "LocalBusiness",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "telephone": "{{ $siteSetting['phone'] ?? '' }}",
            "email": "{{ $siteSetting['email'] ?? '' }}",
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "{{ $siteSetting['address'] ?? '' }}",
                "addressLocality": "Kampala",
                "addressCountry": "UG"
            },
            "openingHoursSpecification": {
                "@type": "OpeningHoursSpecification",
                "dayOfWeek": ["Monday", "Tuesday", "Wednesday", "Thursday", "Friday"],
                "opens": "08:00",
                "closes": "18:00"
            }
        }
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'ContactPage', 'name' => 'Contact Cloudlink IT Services', 'url' => route('contact.index'), 'description' => 'Get in touch with Cloudlink IT Services for a free consultation.', 'mainEntity' => ['@type' => 'LocalBusiness', 'name' => $siteSetting['site_name'] ?? 'Cloudlink IT Services', 'telephone' => $siteSetting['phone'] ?? '', 'email' => $siteSetting['email'] ?? '', 'address' => ['@type' => 'PostalAddress', 'streetAddress' => $siteSetting['address'] ?? '', 'addressLocality' => 'Kampala', 'addressCountry' => 'UG'], 'openingHoursSpecification' => ['@type' => 'OpeningHoursSpecification', 'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'], 'opens' => '08:00', 'closes' => '18:00']]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

# ── portfolio.blade.php ──
Fix-File 'portfolio.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "CollectionPage",
        "name": "Portfolio — Cloudlink IT Services",
        "url": "{{ route('portfolio.index') }}",
        "description": "View our portfolio of successful IT projects across various industries."
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'CollectionPage', 'name' => 'Portfolio — Cloudlink IT Services', 'url' => route('portfolio.index'), 'description' => 'View our portfolio of successful IT projects across various industries.'], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

# ── page.blade.php ──
Fix-File 'page.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "WebPage",
        "name": "{{ $page->title }}",
        "url": "{{ route('page.show', $page->slug) }}",
        "description": "{{ $page->meta_description ?? Str::limit(strip_tags($page->content), 200) }}"
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'WebPage', 'name' => $page->title, 'url' => route('page.show', $page->slug), 'description' => $page->meta_description ?? Str::limit(strip_tags($page->content), 200)], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

# ── blog/index.blade.php ──
Fix-File 'blog\index.blade.php' @'
@push('schema')
<script type="application/ld+json">
    {
        "@@context": "https://schema.org",
        "@type": "Blog",
        "name": "Cloudlink IT Services Blog",
        "url": "{{ route('blog.index') }}",
        "description": "Latest insights on IT solutions, technology trends, and digital transformation.",
        "publisher": {
            "@type": "Organization",
            "name": "{{ $siteSetting['site_name'] ?? 'Cloudlink IT Services' }}",
            "url": "{{ config('app.url') }}"
        }
    }
</script>
@endpush
'@ @'
@push('schema')
<script type="application/ld+json">
{!! json_encode(['@context' => 'https://schema.org', '@type' => 'Blog', 'name' => 'Cloudlink IT Services Blog', 'url' => route('blog.index'), 'description' => 'Latest insights on IT solutions, technology trends, and digital transformation.', 'publisher' => ['@type' => 'Organization', 'name' => $siteSetting['site_name'] ?? 'Cloudlink IT Services', 'url' => config('app.url')]], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endpush
'@

Write-Host "`n=== ALL JSON-LD BLOCKS FIXED ==="
