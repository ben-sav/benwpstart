<?php

class Options
{
    //private $options;

    public function __construct()
    {
        add_action( 'admin_menu', array( $this, 'add' ) );
        //add_action( 'admin_init', array( $this, 'save' ) );

        // Set class property
        //$this->options = get_option( 'options_name' );
    }

    public static function getOptions()
    {
        return get_option( 'options_name' );
    }

    /**
     * Add options page
     */
    public function add()
    {
        add_menu_page(
            'Options du thème',             // titre pour le navigateur
            'Options',                      // nom du menu dans l'admin
            'edit_theme_options',           // paramètre de capability nécessaire
            'options-custom',               // slug de la page
            array( $this, 'render' ),       // fonction qui va générer la page
            'dashicons-star-empty',
            4
        );
    }

    /**
     * Register and add settings
     */
    public function save()
    {
        register_setting(
            'options_group',                // Option group
            'options_name',                 // html attr name[]
            array( $this, 'sanitize' )      // Sanitize
        );
    }

    /**
     * Options page callback for rendering
     */
    public function render()
    {
        ?>
            <div class="wrap">

                <h2>Réglages</h2>

            </div>
        <?php
    }

    /**
     * Options page callback for rendering
     */
    public function renderTwitter()
    {
        ?>
            <div class="wrap">

                <h2>Réglages :</h2>

                <form method="post" action="options.php">

                    <?php settings_fields('options_group') ?>

                    <h3>Twitter keys</h3>
                    <label for="consumer_key">Consumer Key</label><br>
                    <input class="large-text" type="text" id="consumer_key" name="options_name[twitter][consumer_key]" value="<?= $this->options['twitter']['consumer_key']; ?>"><br>
                    <br>
                    <label for="consumer_secret">Consumer Secret</label><br>
                    <input class="large-text" type="text" id="consumer_secret" name="options_name[twitter][consumer_secret]" value="<?= $this->options['twitter']['consumer_secret']; ?>"><br>
                    <br>
                    <label for="oauth_token">Oauth Token</label><br>
                    <input class="large-text" type="text" id="oauth_token" name="options_name[twitter][oauth_token]" value="<?= $this->options['twitter']['oauth_token']; ?>"><br>
                    <br>
                    <label for="oauth_token_secret">Oauth Token Secret</label><br>
                    <input class="large-text" type="text" id="oauth_token_secret" name="options_name[twitter][oauth_token_secret]" value="<?= $this->options['twitter']['oauth_token_secret']; ?>"><br>
                    <br>

                    <input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer">

                </form>

            </div>
        <?php
    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     * @return array
     */
    public function sanitize( $input )
    {
        $new_input = array();
        foreach ($input['twitter'] as $key => $value) {
            $new_input['twitter'][$key] = sanitize_text_field( $value );
        }
        return $new_input;
    }
}

$myOptions = new Options();

?>