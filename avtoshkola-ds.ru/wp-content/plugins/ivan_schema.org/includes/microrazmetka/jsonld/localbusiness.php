<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "LocalBusiness",
  "name": "<?php echo seo_info('company'); ?>",
  "description": "<?php echo seo_info('desc_default'); ?>",
  "image": "<?php echo seo_info('logo'); ?>",
  "@id": "<?php echo seo_info('logo'); ?>",
  "url": "<?php echo get_site_url(); ?>",
  "telephone": "<?php echo seo_info('tel'); ?>",
  "priceRange": "от <?php echo seo_info('price_min') ?> до <?php echo seo_info('price_max'); ?>",
  "address": {
    "@type": "PostalAddress",
    "streetAddress": "<?php echo seo_info('adress'); ?>",
    "addressLocality": "<?php echo seo_info('adress_sity'); ?>",
    "addressRegion" : "<?php echo seo_info('adress_region'); ?>",
    "postalCode": "<?php echo seo_info('index'); ?>",
    "addressCountry": "<?php echo seo_info('country'); ?>"
  },
  "openingHoursSpecification": {
    "@type": "OpeningHoursSpecification",
    "dayOfWeek": [
      "Monday",
      "Tuesday",
      "Wednesday",
      "Thursday",
      "Friday",
      "Saturday",
      "Sunday"
    ],
    "opens": "08:00",
    "closes": "21:00"
  }
}
</script>