<!-- wpfooter -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WPFooter",
  "name": "<?php echo seo_info('title',$post_id); ?>",
  "description" : "<?php echo seo_info('desc',$post_id); ?>",
  "keywords" : "<?php echo seo_info('key',$post_id); ?>",
  "copyrightYear" : "<?php echo seo_info('year',$post_id); ?>",
  "copyrightHolder" : "<?php echo get_site_url(); ?>"
}
</script>