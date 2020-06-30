<?php

$cminds_plugin_config = array(
	'plugin-is-pro'				 => FALSE,
	'plugin-has-addons'			 => TRUE,
	'plugin-is-addon'			 => FALSE,
	'plugin-version'			 => '1.2.14',
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
        'plugin-upgrade-text'           => 'Good Reasons to Upgrade to Pro',
    'plugin-upgrade-text-list'      => array(
        array( 'title' => 'Search the directory using filters', 'video_time' => '0:07' ),
        array( 'title' => 'Search bi Zip ', 'video_time' => '0:30' ),
        array( 'title' => 'Customize directory listing', 'video_time' => '0:45' ),
        array( 'title' => 'Embed ads in directory', 'video_time' => '1:30' ),
        array( 'title' => 'Import and export listings', 'video_time' => '2:07' ),
        array( 'title' => 'Shortcode support', 'video_time' => '2:32' ),
        array( 'title' => 'Directory index tempaltes', 'video_time' => '3:07' ),
        array( 'title' => 'Directory page settings', 'video_time' => '3:35' ),
        array( 'title' => 'Google maps integration', 'video_time' => '4:10' ),
        array( 'title' => 'Product directory integration', 'video_time' => '4:52' ),
        array( 'title' => 'Related buisnesses widget', 'video_time' => '5:34' ),
        array( 'title' => 'Business star rating', 'video_time' => '5:51' ),
        array( 'title' => 'Community editing - submit new listing', 'video_time' => '6:18' ),
        array( 'title' => 'Community editing - claim existing business ', 'video_time' => '6:48' ),
        array( 'title' => 'Community editing - manage existing business ', 'video_time' => '7:30' ),
        array( 'title' => 'Directory permalink', 'video_time' => '7:30' ),
   ),
    'plugin-upgrade-video-height'   => 240,
    'plugin-upgrade-videos'         => array(
        array( 'title' => 'Business Directory Premium Plugin Overview', 'video_id' => '275481345' ),
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
	'plugin-compare-table'		 => '
              <div class="suite-package" style="padding-left:10px;"><h2>The premium version of this plugin is included in CreativeMinds All plugins suite:</h2><a href="https://www.cminds.com/wordpress-plugins-library/cm-wordpress-plugins-yearly-membership/" target="_blank"><img src="'.plugin_dir_url( __FILE__ ).'CMWPPluginssuite.png"></a></div>
            <hr style="width:1000px; height:3px;">
            <div class="pricing-table" id="pricing-table"><h2 style="padding-left:10px;">Upgrade The Business Directory Plugin:</h2>
                <ul>
                    <li class="heading" style="background-color:red;">Current Edition</li>
                    <li class="price">FREE<br /></li>
                  <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Create any number of listings</li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Choose the default business image</li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Choose the business category</li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Choose the basic styling options</li>
                 </ul>

                <ul>
                   <li class="heading">Pro<a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$39.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=33301&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>All Free Version Features <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free features are supported in the pro"></span></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Extended business information <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Each business has the following details – Business description which can include images, videos and text, Business pitch, Logo, Business address, Google map display, Website URL, Facebook, Twitter, LinkedIn, Phone number, year founded, Google+ and more"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Advertisements support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can insert ads in the business page taken from Google or any other external business in search results"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Import / Export Businesses <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Export and import businesses across sites"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Additional custom fields <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Add custom fields with your own added metadata"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Search and Filters  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Filter businesses by categories and tags or free text search"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Directory Index Templates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Several designs to the business directory index. You can also choose between two available templates"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Business Page Styling <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Easily customize business page look and feel. You can also choose between two available templates"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Search by zip and location <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Search businesses by location (zip, state, country)"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Additional taxonomies <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Supports additional custom taxonomy and filtering"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Shortcode support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Supports shortcodes to show a list of all categories, a single business widget and more""></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Promote businesses <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Promote business in search results and related businesses widget"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Permalink Settings <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Set the permalink for all businesses listed on your site"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Google Map Support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Show each business address on a Google Map"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Related Businesses widget <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Show related businesses in each business page"></span></li>
                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Editable Labels <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All plugin labels can be easily edited and localized from plugin settings"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Tags support  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Option to add tags to each business and to search by tags or filters businesses be tags"></span></li>
                                <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 40% off the product cost."></span></li>
     </ul>
   <ul>
                   <li class="heading">Pro Community<a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$59.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=49047&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>All Free and Pro Version Features <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free and pro features are supported"></span></li>

                    <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User can list a business <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="User can post his own business. Posting can be done while the user is not logged-in"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User can a business  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="If a business is already posted. User can claim it and wait for admin decision"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>User can manage his business  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="User can manage their own listing without being logged-in or from inside the site"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Admin can moderate new posted businesses  <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin is notified when a new business is posted and held for moderation"></span></li>
                      <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 40% off the product cost."></span></li>
             </ul>
                 <ul>
                   <li class="heading">Pro Community Payments<a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" style="float:right;font-size:11px;color:white;" target="_blank">More</a></li>
                    <li class="price">$79.00<br /> <span style="font-size:14px;">(For one Year / Site)<br />Additional pricing options available <a href="https://www.cminds.com/wordpress-plugins-library/purchase-cm-business-directory-plugin-for-wordpress/" target="_blank"> >>> </a></span> <br /></li>
                    <li class="action"><a href="https://www.cminds.com/downloads/cm-business-directory-pro/?edd_action=add_to_cart&download_id=85916&wp_referrer=https://www.cminds.com/checkout/&edd_options[price_id]=1" style="font-size:18px;" target="_blank">Upgrade Now</a></li>
                     <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>All Free, Pro Community Version Features <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="All free and pro features are supported"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Payments for submitting a new business <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can set a price for posting a business. User would need to pay before the business would go live"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Payments for renewing a business listing <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can set a price and listing duration for a business listing. After period ended user would need to pay again for showing business in the directory"></span></li>
                   <li style="text-align:left;"><span class="dashicons dashicons-yes"></span>Payments for claiming a business <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:green" title="Admin can set a price for claiming a business"></span></li>
                   <li class="support" style="background-color:lightgreen; text-align:left; font-size:14px;"><span class="dashicons dashicons-yes"></span> One year of expert support <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="You receive 365 days of WordPress expert support. We will answer questions you have and also support any issue related to the plugin. We will also provide on-site support."></span><br />
                         <span class="dashicons dashicons-yes"></span> Unlimited product updates <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="During the license period, you can update the plugin as many times as needed and receive any version release and security update"></span><br />
                        <span class="dashicons dashicons-yes"></span> Plugin can be used forever <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose not to renew the plugin license, you can still continue to use it as long as you want."></span><br />
                        <span class="dashicons dashicons-yes"></span> Save 40% once renewing license <span class="dashicons dashicons-admin-comments cminds-package-show-tooltip" style="color:grey" title="Once license expires, If you choose to renew the plugin license you can do this anytime you choose. The renewal cost will be 40% off the product cost."></span></li>
                 </ul>



            </div>',
);
