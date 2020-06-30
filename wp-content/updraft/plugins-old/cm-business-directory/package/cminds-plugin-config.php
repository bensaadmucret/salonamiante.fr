<?php

$cminds_plugin_config = array(
	'plugin-is-pro'				 => FALSE,
	'plugin-has-addons'			 => TRUE,
	'plugin-is-addon'			 => FALSE,
	'plugin-version'			 => '1.2.5',
	'plugin-abbrev'				 => 'cmbd',
	'plugin-short-slug'			 => 'business-directory',
	'plugin-parent-short-slug'	 => '',
    'plugin-affiliate'               => '',
    'plugin-redirect-after-install'  => admin_url( 'admin.php?page=cm-business-directory-settings' ),
    'plugin-show-guide'              => TRUE,
    'plugin-guide-text'              => '    <div style="display:block">
        <ol>
            <li>Go to <strong>"Add Business"</strong> under the CM Business Directory menu</li>
            <li>Fill the <strong>"Title"</strong> of the new business item and <strong>"Content"</strong></li>
            <li>Add additional information such as the <strong>"Business Pitch and Logo"</strong>, <strong>Business Address</strong> and <strong>"Category"</strong></li>
            <li>Click <strong>"Publish" </strong> in the right column.</li>
            <li><strong>View</strong> this business</li>
            <li>From the plugin settings click on the link to the <strong>Business Index Page</strong></li>
            <li><strong>Troubleshooting:</strong> If you get a 404 error once viewing the business, make sure your WordPress permalinks are set and save them again to refresh</li>
         </ol>
    </div>',
    'plugin-guide-video-height'      => 240,
    'plugin-guide-videos'            => array(
        array( 'title' => 'Installation tutorial', 'video_id' => '158283606' ),
    ),
	'plugin-file'				 => CMBD_PLUGIN_FILE,
	'plugin-dir-path'			 => plugin_dir_path( CMBD_PLUGIN_FILE ),
	'plugin-dir-url'			 => plugin_dir_url( CMBD_PLUGIN_FILE ),
	'plugin-basename'			 => plugin_basename( CMBD_PLUGIN_FILE ),
	'plugin-icon'				 => '',
	'plugin-name'				 => CMBD_NAME,
	'plugin-license-name'		 => CMBD_NAME,
	'plugin-slug'				 => '',
	'plugin-menu-item'			 => 'edit.php?post_type=' . CMBusinessDirectoryShared::POST_TYPE,
	'plugin-textdomain'			 => CMBD_SLUG_NAME,
	'plugin-userguide-key'		 => '370-cm-business-directory-cmbd',
	'plugin-store-url'			 => 'https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/',
	'plugin-review-url'			 => 'https://wordpress.org/support/view/plugin-reviews/cm-business-directory',
	'plugin-changelog-url'		 => CMBD_RELEASE_NOTES,
	'plugin-compare-table'		 => '<div class="pricing-table" id="pricing-table">
                <ul>
                    <li class="heading">Current Edition</li>
                    <li class="price">$0.00</li>
                    <li class="noaction"><span>Free Download</span></li>
                     <li>Create any number of listings</li>
                    <li>Choose the default business image</li>
                    <li>Choose the business category</li>
                    <li>Choose the basic styling options</li>
                    <li>Choose the way to display address</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li class="price">$0.00</li>
                    <li class="noaction"><span>Free Download</span></li>
                </ul>

                <ul>
                    <li class="heading">Pro</li>
                    <li class="price">$39.00</li>
                    <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=33301&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
                     <li>Create any number of listings</li>
                    <li>Choose the default business image</li>
                    <li>Choose the business category</li>
                    <li>Advanced styling options</li>
                    <li>Choose the way to display address</li>
                    <li>Import / Export Businesses</li>
                    <li>Custom CSS Support</li>
                    <li>Several business index Views</li>
                    <li>Additional custom fields</li>
                    <li>Permalink settings</li>
                    <li>More styling options</li>
                    <li>Google maps support</li>
                    <li>Related business widget</li>
                    <li>Advertisements support</li>
                    <li>Search support</li>
                    <li>Configure plugin labels</li>
                    <li>Tags support</li>
                    <li>Ordering options</li>
                    <li>Shortcode support</li>
                    <li>Integration with Map Location</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                    <li>X</li>
                   <li class="price">$39.00</li>
                   <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=33301&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
                 </ul>
   <ul>
                    <li class="heading">Pro Community</li>
                    <li class="price">$49.00</li>
                   <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=49047&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
                      <li>Create any number of listings</li>
                    <li>Choose the default business image</li>
                    <li>Choose the business category</li>
                    <li>Advanced styling options</li>
                    <li>Choose the way to display address</li>
                    <li>Import / Export Businesses</li>
                    <li>Custom CSS Support</li>
                    <li>Several business index Views</li>
                    <li>Additional custom fields</li>
                    <li>Permalink settings</li>
                    <li>More styling options</li>
                    <li>Google maps support</li>
                    <li>Related business widget</li>
                    <li>Advertisements support</li>
                    <li>Search support</li>
                    <li>Configure plugin labels</li>
                    <li>Tags support</li>
                    <li>Ordering options</li>
                    <li>Shortcode support</li>
                    <li>Integration with Map Location</li>
                    <li>Allow user to post a new business</li>
                   <li>Allow user to manage their business</li>
                   <li>Allow user to claim existing business</li>
                   <li>X</li>
                  <li class="price">$49.00</li>
                    <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=49047&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
               </ul>
  <ul>
                    <li class="heading">Pro Community Payments</li>
                    <li class="price">$69.00</li>
                   <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=85916&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
                     <li>Create any number of listings</li>
                    <li>Choose the default business image</li>
                    <li>Choose the business category</li>
                    <li>Advanced styling options</li>
                    <li>Choose the way to display address</li>
                    <li>Import / Export Businesses</li>
                    <li>Custom CSS Support</li>
                    <li>Several business index Views</li>
                    <li>Additional custom fields</li>
                    <li>Permalink settings</li>
                    <li>More styling options</li>
                    <li>Google maps support</li>
                    <li>Related business widget</li>
                    <li>Advertisements support</li>
                    <li>Search support</li>
                    <li>Configure plugin labels</li>
                    <li>Tags support</li>
                    <li>Ordering options</li>
                    <li>Shortcode support</li>
                    <li>Integration with Map Location</li>
                    <li>Allow user to post a new business</li>
                   <li>Allow user to manage their business</li>
                   <li>Allow user to claim existing business</li>
                        <li>Payments Support</li>
                  <li class="price">$69.00</li>
                  <li class="action"><a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="background-color:darkblue;" target="_blank">More Info</a> &nbsp;&nbsp;<a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=85916&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" target="_blank">Buy Now</a></li>
                 </ul>



            </div>',
);
