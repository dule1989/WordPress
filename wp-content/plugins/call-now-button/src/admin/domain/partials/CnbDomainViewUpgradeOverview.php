<?php

namespace cnb\admin\domain;

// don't load directly
defined( 'ABSPATH' ) || die( '-1' );

use cnb\admin\api\CnbAppRemotePayment;
use cnb\admin\api\CnbAppRemotePromotionCodes;
use cnb\admin\models\CnbPlan;
use cnb\admin\models\CnbUser;

class CnbDomainViewUpgradeOverview {

    /**
     * @param $user CnbUser
     *
     * @return string|null
     */
    private function getActiveCurrency( $user ) {
        $active_currency = null;
        if ( $user && ! is_wp_error( $user ) && isset( $user->stripeDetails ) && ! empty( $user->stripeDetails->currency ) ) {
            $active_currency = $user->stripeDetails->currency;
        }

        return $active_currency;
    }

    /**
     * Render upgrade form
     *
     * @param $domain CnbDomain
     *
     * @return void
     */
    function render( $domain ) {
        if ( $domain->type !== 'FREE' ) { ?><p>Your domain is currently on the
            <code><?php echo esc_html( $domain->type ) ?></code> plan.</p>
        <?php } ?>

        <?php

          $coupon = (new CnbAppRemotePromotionCodes())->get_coupon();
          if ($coupon != null && !is_wp_error($coupon)) { ?>
          <div class="cnb-promo-bar cnb-flexbox">
            <div class="cnb_align_right cnb-coupon-timer" style="width:100%; padding-right:10px;" id="cnb-coupon-expiration-countdown" data-coupon-expiration-time="<?php echo esc_attr($coupon->redeemBy);?>">
                Coupon expires in <?php echo esc_html($coupon->get_redeem_by()) ?>
            </div>
            <div class="cnb-coupon-details">
              <h5>USE COUPON <code class="cnb-coupon-code"><?php echo esc_html($coupon->code); ?></code> FOR EXTRA <?php echo esc_html($coupon->get_discount()); ?> DISCOUNT</h5>
              <p>Add coupon code <code class="cnb-coupon-code"><?php echo esc_html($coupon->code); ?></code> during checkout for an extra <strong><?php echo esc_html($coupon->get_discount()); ?></strong> off <?php echo esc_html($coupon->get_period()); ?> on <?php echo esc_html($coupon->get_plan()); ?>.</div>
          </div>
        <?php } ?>

        <h1 class="cnb-upgrade-title">Upgrade <?php echo esc_html( $domain->name ) ?> to PRO</h1>
        <div class="cnb-pricebox">
          <div class="cnb-benefit">🧰 All features from Cloud</div>
          <div class="cnb-benefit">✨ "Powered by" notice removed</div>
          <div class="cnb-benefit">📷 Use custom images on buttons</div>
          <div class="cnb-benefit">🌍 Include and exclude countries</div>
          <div class="cnb-benefit">↕️ Set scroll height for buttons to appear</div>
        </div>
        <?php
        $this->renderUpgradeForm( $domain );
        echo '<h3 class="cnb-center cnb-plan-features">All plans contain the following features:</h3>';
        $this->renderBenefits();
    }

    private function renderJsToHideCurrency( $user ) {
        $active_currency = $this->getActiveCurrency( $user );
        if ( $active_currency ) {
            // We already know the currency, so a "select currency" tab menu makes no sense
            echo '<script>';
            echo "jQuery(() => { jQuery('.nav-tab-wrapper').hide(); })";
            echo '</script>';
        }
    }

    /**
     * @param $domain CnbDomain
     *
     * @return void
     */
    public function renderUpgradeForm( $domain ) {
        global $cnb_user;
        $this->renderJsToHideCurrency( $cnb_user );
        $plans             = CnbAppRemotePayment::cnb_remote_get_plans();
        $active_currency   = $this->getActiveCurrency( $cnb_user );
        $domain_controller = new CnbDomainController();
        ?>
        <form id="wp_domain_upgrade" method="post">
            <input type="hidden" name="cnb_domain_id" id="cnb_domain_id" value="<?php echo esc_attr( $domain->id ) ?>">

            <div class="cnb-price-plans">
                <div class="cnb-message notice"><p class="cnb-error-message"></p></div>

                <div class="currency-box
                            currency-box-eur
                            cnb-flexbox
                            ">
                    <?php
                    $plan_year   = $this->get_plan( $plans, 'powered-by-eur-yearly' );
                    $plan_month   = $this->get_plan( $plans, 'powered-by-eur-monthly' );
                    $annual_discount = $domain_controller->get_discount_percentage($plan_year, $plan_month);
                    $plan_x = floor( $plan_month->price );
                    $plan_y = round( ( $plan_month->price ) - floor( $plan_month->price ), 2 ) * 100;
                    ?>

                    <div class="cnb-pricebox cnb-currency-box
                                <?php if ( $active_currency !== 'usd' ) { ?>currency-box-active<?php } ?>">
                        <h3 class="cnb-price-eur"><span class="cnb-premium-label">PRO </span>&euro;</h3>

                        <div class="plan-amount"><span class="currency">€</span><span
                                    class="euros"><?php echo esc_html( $plan_x ) ?></span><span
                                    class="cents">.<?php echo esc_html( $plan_y ) ?></span><span class="timeframe">/monthly</span>
                        </div>
                        <div class="billingprice">
                            <span class="">Pay yearly and save <?php echo esc_html( $annual_discount ); ?>%!</span>
                        </div>
                        <a class="button button-secondary button-upgrade powered-by-eur-monthly" href="#"
                           onclick="cnb_get_checkout('<?php echo esc_js( $plan_month->id ) ?>')">Pay monthly</a>
                        <a class="button button-primary button-upgrade powered-by-eur-yearly" href="#"
                           onclick="cnb_get_checkout('<?php echo esc_js( $plan_year->id ) ?>')">Pay yearly</a>
                    </div>

                    <?php
                    $plan_year   = $this->get_plan( $plans, 'powered-by-usd-yearly' );
                    $plan_month   = $this->get_plan( $plans, 'powered-by-usd-monthly' );
                    $plan_x = floor( $plan_month->price );
                    $plan_y = round( ( $plan_month->price ) - floor( $plan_month->price ), 2 ) * 100;
                    $annual_discount = $domain_controller->get_discount_percentage($plan_year, $plan_month);
                    ?>
                    <div class="cnb-pricebox cnb-currency-box
                                <?php if ( $active_currency !== 'eur' ) { ?>currency-box-active<?php } ?>">
                        <h3 class="cnb-price-usd"><span class="cnb-premium-label">PRO </span>$</h3>

                        <div class="plan-amount"><span class="currency">$</span><span
                                    class="euros"><?php echo esc_html( $plan_x ) ?></span><span
                                    class="cents">.<?php echo esc_html( $plan_y ) ?></span><span class="timeframe">/month</span>
                        </div>
                        <div class="billingprice">
                            <span class="">Pay yearly and save <?php echo esc_html( $annual_discount ); ?>%!</span>
                        </div>
                        <a class="button button-secondary button-upgrade powered-by-eur-monthly" href="#"
                           onclick="cnb_get_checkout('<?php echo esc_js( $plan_month->id ) ?>')">Pay monthly</a>
                        <a class="button button-primary button-upgrade powered-by-eur-yearly" href="#"
                           onclick="cnb_get_checkout('<?php echo esc_js( $plan_year->id ) ?>')">Pay yearly</a>
                    </div>

                </div>
            </div>
        </form>
        <?php
    }

    public function renderBenefits() {
        echo '
        <div class="cnb-flexbox cnb-plan-features">
            <ul class="cnb-checklist">
                <li><strong>Phone</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Email</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>SMS/text</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>WhatsApp</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Messenger</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Signal</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Telegram</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Location</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Links</strong> <span class="only-big-screens">buttons</span></li>
                <li><strong>Smooth scroll</strong> <span class="only-big-screens">buttons</span></li>
            </ul>
            <ul class="cnb-checklist">
                <li><strong>Multiple buttons</strong><br>Add up to 8 buttons to a single page!</li>
                <li><strong>Circular action button</strong><br>The famous single action button</li>
                <li><strong>Multi action buttons</strong><br>Multibutton&trade; (expandable single button)<br>Buttonbar&trade;
                    (Add up to 5 actions to a full width button)
                </li>
                <li><strong>WhatsApp modal</strong><br>A chat-like modal to kickstart the conversation</li>
                <li><strong>Iframe pop-up</strong><br>Slide in a window with any url to keep people on the page.</li>
                <li><strong>Intercom integration</strong><br>Fire Intercom from a matching style button.</li>
            </ul>
            <ul class="cnb-checklist">
                <li><strong>Button animations</strong><br>Draw more attention to your buttons with subtle
                    animations
                </li>
                <li><strong>Buttons slide-in</strong><br>Buttons don\'t just appear but smoothly slide into the page.
                </li>
                <li><strong>Advanced page targeting options</strong><br>Ability to select full URLs, entire
                    folders or even url parameters
                </li>
                <li><strong>Clicks & conversions</strong><br>Clicks & conversion tracking with Google
                </li>
                <li><strong>Scheduling</strong><br>Select days and times your buttons should be visible</li>
                <li><strong>And so much more!</strong></li>
            </ul>
        </div>';
    }

    /**
     * @param $plans CnbPlan[]
     * @param $name string
     *
     * @return CnbPlan|null
     */
    private function get_plan( $plans, $name ) {
        foreach ( $plans as $plan ) {
            if ( $plan->nickname === $name ) {
                return $plan;
            }
        }

        return null;
    }
}
