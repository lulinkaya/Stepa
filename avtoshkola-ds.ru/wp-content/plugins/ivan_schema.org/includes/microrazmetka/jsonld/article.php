<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Article",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "<?php echo get_permalink($post_id); ?>"
  },
  "headline": "<?php echo addslashes(get_the_title($post_id)); ?>",
  "description": "<?php echo clean_content($this_post_content, 180 ); ?>...",
  "image": "<?php echo $arr_thumbnail['src']; ?>",  
  "author": {
    "@type": "Person",
    "name": "Администратор"
  },  
  "publisher": {
    "@type": "Organization",
    "name": "<?php echo get_bloginfo('name'); ?>",
    "logo": {
      "@type": "ImageObject",
      "url": "<?php echo seo_info('logo'); ?>"
    }
  },
  "datePublished": "<?php echo get_the_date('Y-m-d'); ?>",
  "dateModified": "<?php the_modified_date('Y-m-d'); ?>"
}
</script>