<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "WebPage",
	"publisher" :{
		"@type" : "Organization",
		"telephone":"<?php echo seo_info('tel'); ?>",
		"name" : "<?php echo seo_info('title'); ?>",
		"url": "<?php echo get_site_url(); ?>/",
		"logo":{
			"@type":"ImageObject",
		    "name":"<?php echo seo_info('company'); ?>",
		    "image":"<?php echo seo_info('logo'); ?>",
		    "url":"<?php echo seo_info('logo'); ?>",
		    "width":"<?php echo seo_info('logo_w'); ?>",
		    "height":"<?php echo seo_info('logo_h'); ?>"
		},
		"address":{
			"@type":"PostalAddress",
			"name" : "Россия"
		}
	}

}
</script>