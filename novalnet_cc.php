<?php
#########################################################
#                                                       #
#  CC / CREDIT CARD payment method class                #
#  This module is used for real time processing of      #
#  Credit card data of customers.                       #
#                                                       #
#  Released under the GNU General Public License.       #
#  This free contribution made by request.              #
#  If you have found this script useful a small         #
#  recommendation as well as a comment on merchant form #
#  would be greatly appreciated.                        #
#                                                       #
#  Script : novalnet_cc.php                             #
#                                                       #
#########################################################

/**
 * Check if WooCommerce is active
 */
add_action('plugins_loaded', $novalnet_payment_methods[1].'_Load', 0);

function novalnet_cc_Load() {
	global $novalnet_payment_methods;
	
	if ( ! class_exists( $novalnet_payment_methods[1] ) ) {
		
		/**
		 * Localisation
		 **/
		load_plugin_textdomain( $novalnet_payment_methods[1], false, dirname( plugin_basename( __FILE__ ) ) . '/' );

		class novalnet_cc extends novalnetpayments {
		}
		$obj = new $novalnet_payment_methods[1]();
	}
}

/**
 * Add the gateway to WooCommerce
 *
 * @access public
 * @param array $methods
 * @package		
 * @return array
 */

function add_novalnet_cc_gateway( $methods ) {
	global $novalnet_payment_methods;
	$methods[] = $novalnet_payment_methods[1];
	return $methods;
}

add_filter('woocommerce_payment_gateways', 'add_'.$novalnet_payment_methods[1].'_gateway' );
?>