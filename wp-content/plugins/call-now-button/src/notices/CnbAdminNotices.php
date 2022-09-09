<?php

namespace cnb\notices;

// don't load directly
defined( 'ABSPATH' ) || die( '-1' );

class CnbAdminNotices {

    /**
     * Singleton instance
     *
     * @var CnbAdminNotices
     */
    private static $_instance;

    /**
     * @var CnbNotices
     */
    private $admin_notices;

    private function __construct() {
        $this->admin_notices = new CnbNotices();

        add_action( 'cnb_admin_notices', array( $this, 'action_admin_notices' ) );
    }

    public static function get_instance() {
        if ( ! ( self::$_instance instanceof self ) ) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }

    /**
     * Ensure a previous notice does not return.
     *
     * Called via admin_ajax
     *
     * @return void
     */
    public function hide_notice() {
        do_action( 'cnb_init', __METHOD__ );
        $nonce = filter_input( INPUT_POST, '_wpnonce', FILTER_SANITIZE_STRING );
        $action         = 'cnb_hide_notice';
        $nonce_verified = wp_verify_nonce( $nonce, $action );
        if ( $nonce_verified ) {
            $dismiss_option = filter_input( INPUT_POST, 'dismiss_option', FILTER_SANITIZE_STRING );
            if ( is_string( $dismiss_option ) && ! empty( $dismiss_option ) ) {
                update_option( CNB_SLUG . '_dismissed_' . $dismiss_option, true );
                // For example, do_action(cnb_update_' . CNB_VERSION), which calls the Settings Controller (update_version)
                do_action( $dismiss_option );
                do_action( 'cnb_finish' );
                wp_die(
                    esc_html( 'Dismissed notice: ' . $dismiss_option ), esc_html__( 'Dismissed notice' ),
                    array(
                        'response' => 200,
                    )
                );
            }
        } else {
            do_action( 'cnb_finish' );
            wp_die( esc_html__( 'Invalid nonce specified' ), esc_html__( 'Error' ), array(
                'response'  => 403,
                'back_link' => true,
            ) );
        }
    }

    /**
     * @param $notices CnbNotice[]
     *
     * @return void
     */
    public function renderNotices( $notices ) {
        foreach ( $notices as $notice ) {
            $this->renderNotice( $notice );
        }
    }

    /**
     * @param $notice CnbNotice
     */
    public function renderNotice( $notice ) {
        if ( $notice == null ) {
            return;
        }

        $dismiss_classes = '';
        if ( $notice->dismiss_option ) {
            $notice->dismissable = true;
        }

        if ( $notice->dismissable ) {
            $dismiss_classes .= ' is-dismissible';
        }

        // Check if this particular Notice has already been dismissed
        $option = CNB_SLUG . '_dismissed_' . $notice->dismiss_option;
        if ( ! $notice->dismiss_option || ! get_option( $option ) ) {
            echo '<div class="notice notice-' . esc_attr( CNB_SLUG ) . ' notice-' . esc_attr( $notice->type ) .
                 esc_attr( $dismiss_classes ) .
                 '"' .
                 // phpcs:ignore WordPress.Security
                 ( $notice->dismissable === true && $notice->dismiss_option
                     ? ' data-dismiss-option="' . esc_attr( $notice->dismiss_option ) . '"' .
                       ' data-dismiss-nonce="' . esc_attr(wp_create_nonce('cnb_hide_notice')) . '"'
                     : ''
                 ) . '>';
            // phpcs:ignore WordPress.Security
            echo $notice->message;
            echo '</div>';
        }
    }

    public function get_dismiss_option_name( $name ) {
        return CNB_SLUG . '_dismissed_' . $name;
    }

    public function is_dismissed( $name ) {
        return get_option( $name );
    }

    public function action_admin_notices() {
        foreach ( explode( ',', CnbNotices::TYPES ) as $type ) {
            foreach ( $this->admin_notices->{$type} as $admin_notice ) {
                $option = $this->get_dismiss_option_name( $admin_notice->dismiss_option );
                if ( ! $admin_notice->dismiss_option || ! $this->is_dismissed( $option ) ) {
                    $this->renderNotice( $admin_notice );
                }
            }
        }
    }

    /**
     * Add Notices to be rendered inside the header.
     *
     * @param $notices CnbNotice[]|string[]
     */
    public function notices( $notices ) {
        foreach ( $notices as $notice ) {
            if ( is_string( $notice ) ) {
                $this->info( $notice );

            } else {
                $this->notice( $notice );
            }
        }
    }

    /**
     * @param $notice CnbNotice
     */
    public function notice( $notice ) {
        $notice = $this->createNotice( $notice->type, $notice->message, $notice->dismissable, $notice->dismiss_option );
        $this->addNotice( $notice );
    }

    public function error( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'error', $message, false, $dismiss_option );
        $this->addNotice( $notice );
    }

    public function renderError( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'error', $message, false, $dismiss_option );
        $this->renderNotice( $notice );
    }

    public function warning( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'warning', $message, false, $dismiss_option );
        $this->addNotice( $notice );
    }

    public function renderWarning( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'warning', $message, false, $dismiss_option );
        $this->renderNotice( $notice );
    }

    public function success( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'success', $message, false, $dismiss_option );
        $this->addNotice( $notice );
    }

    public function renderSuccess( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'success', $message, false, $dismiss_option );
        $this->renderNotice( $notice );
    }

    public function info( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'info', $message, false, $dismiss_option );
        $this->addNotice( $notice );
    }

    public function renderInfo( $message, $dismiss_option = false ) {
        $notice = $this->createNotice( 'info', $message, false, $dismiss_option );
        $this->renderNotice( $notice );
    }

    /**
     * @param $type string one of info, success, warning, error
     * @param $message string
     * @param $dismissable boolean
     * @param $dismiss_option boolean
     *
     * @return CnbNotice
     */
    private function createNotice( $type, $message, $dismissable = false, $dismiss_option = false ) {
        $notice                 = new CnbNotice();
        $notice->message        = $message;
        $notice->dismissable    = $dismissable;
        $notice->dismiss_option = $dismiss_option;
        $notice->type           = $type;

        return $notice;
    }

    /**
     * @param $notice CnbNotice
     */
    private function addNotice( $notice ) {
        $this->admin_notices->{$notice->type}[] = $notice;
    }
}
