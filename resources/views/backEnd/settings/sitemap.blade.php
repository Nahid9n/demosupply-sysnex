<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Static Pages -->
    @foreach($staticPages as $page)
        <url>
            <loc>{{ url($page->page_slug == 'home' ? '/' : $page->page_slug) }}</loc>
            <lastmod>{{ $page->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>weekly</changefreq>
            <priority>{{ $page->page_slug == 'home' ? '1.0' : '0.8' }}</priority>
        </url>
    @endforeach

<!-- Dynamic Services / Products / Blogs -->
    @foreach($services as $service)
        <url>
            <loc>{{ url('service/' . $service->slug) }}</loc>
            <lastmod>{{ $service->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>daily</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
