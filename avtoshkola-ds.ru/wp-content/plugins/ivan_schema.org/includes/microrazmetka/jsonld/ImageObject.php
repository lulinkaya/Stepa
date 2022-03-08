<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ImageObject",
  "name": "<?php echo seo_info('title',$post_id); ?>",
  "contentUrl": "<?php echo $arr_thumbnail['src']; ?>",
  "width": "<?php echo $arr_thumbnail['width']; ?>",
  "height": "<?php echo $arr_thumbnail['height']; ?>",
  "description": "<?php echo seo_info('desc',$post_id); ?>"
}
</script>