<script type="application/ld+json">
    {
        "@context":"https://schema.org",
        "@type":"Archive",
        "headline":"{{ $menu->title }}",
        "description":"{{ $menu->content }}",
        "datePublished":"{{ $menu->created_at }}",
        "dateModified":"{{ $menu->created_at }}",
        "publisher":{
            "@type": "Organization",
            "url": "{{ url("/") }}",
            "name": "{{ $menu->title }}",
            "logo": {
                "@type": "ImageObject",
                "url": "{{ url('/assets/logo.jpg') }}"
                },
            "contactPoint": {
                "@type": "ContactPoint",
                "telephone": "+982144446012",
                "email": "sale@ittelecom.ir",
                "contactType": "Customer service"
            }
        },
        "mainEntityOfPage":{
            "@type":"WebPage",
            "@id":"{{ url('/shop/'.$menu->slug) }}"
        },
        "author":{
            "@type":"Person",
            "name": "فروشگاه اینترنتی آی‌تی‌تلکام",
            "url": "{{ url("/") }}"
        },
        "image":{
            "@type":"ImageObject",
            "logo": "{{ url('/assets/logo.jpg') }}",
            "width":1200,
            "height":630
        }
    }
</script>
