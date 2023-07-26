<?php
namespace Elementor;

class Widget_MS_Social_Icons extends Widget_Base {
    
    private static $share_socials = [
        'twitter' => 'Twitter',
        'facebook' => 'Facebook',
        'linkedin' => 'LinkedIn',
        'email' => 'Email',
        'whatsapp' => 'WhatsApp',
        'telegram' => 'Telegram',
        'viber' => 'Viber',
        'pinterest' => 'Pinterest',
        'tumblr' => 'Tumblr',
        'hackernews' => 'Hackernews',
        'reddit' => 'Reddit',
        'vk' => 'VK',
        'buffer' => 'Buffer',
        'xing' => 'Xing',
        'line' => 'Line',
        'digg' => 'Digg',
        'stumbleupon' => 'Stumbleupon',
        'flipboard' => 'Flipboard',
        'weibo' => 'Weibo',
        'renren' => 'Renren',
        'myspace' => 'MySpace',
        'blogger' => 'Blogger',
        'okru' => 'Ok',
        'skype' => 'Skype',
        'trello' => 'Trello',
    ];

    private static $default_socials = [
        'gitlab' => 'Gitlab',
        'instructables' => 'Instructables',
        'portfolio' => 'Portfolio',
        'codered' => 'Codered',
        'origin' => 'Origin',
        'nextdoor' => 'Nextdoor',
        'udemy' => 'Udemy',
        'livemaster' => 'Livemaster',
        'crunchbase' => 'Crunchbase',
        'homefy' => 'Homefy',
        'calendly' => 'Calendly',
        'realtor' => 'Realtor',
        'tidal' => 'Tidal',
        'qobuz' => 'Qobuz',
        'natgeo' => 'Natgeo',
        'mastodon' => 'Mastodon',
        'unsplash' => 'Unsplash',
        'homeadvisor' => 'Homeadvisor',
        'angieslist' => 'Angieslist',
        'codepen' => 'Codepen',
        'slack' => 'Slack',
        'openaigym' => 'Openaigym',
        'logmein' => 'Logmein',
        'fiverr' => 'Fiverr',
        'gotomeeting' => 'Gotomeeting',
        'aliexpress' => 'Aliexpress',
        'guru' => 'Guru',
        'appstore' => 'Appstore',
        'homes' => 'Homes',
        'zoom' => 'Zoom',
        'alibaba' => 'Alibaba',
        'craigslist' => 'Craigslist',
        'wix' => 'Wix',
        'redfin' => 'Redfin',
        'googlecalendar' => 'Googlecalendar',
        'shopify' => 'Shopify',
        'freelancer' => 'Freelancer',
        'seedrs' => 'Seedrs',
        'bing' => 'Bing',
        'doodle' => 'Doodle',
        'bonanza' => 'Bonanza',
        'squarespace' => 'Squarespace',
        'toptal' => 'Toptal',
        'gust' => 'Gust',
        'ask' => 'Ask',
        'trulia' => 'Trulia',
        'loomly' => 'Loomly',
        'ghost' => 'Ghost',
        'upwork' => 'Upwork',
        'fundable' => 'Fundable',
        'booking' => 'Booking',
        'googlemaps' => 'Googlemaps',
        'zillow' => 'Zillow',
        'niconico' => 'Niconico',
        'toneden' => 'Toneden',
        'augment' => 'Augment',
        'bitbucket' => 'Bitbucket',
        'fyuse' => 'Fyuse',
        'yt-gaming' => 'Yt-gaming',
        'sketchfab' => 'Sketchfab',
        'mobcrush' => 'Mobcrush',
        'microsoft' => 'Microsoft',
        'pandora' => 'Pandora',
        'messenger' => 'Messenger',
        'gamewisp' => 'Gamewisp',
        'bloglovin' => 'Bloglovin',
        'tunein' => 'Tunein',
        'gamejolt' => 'Gamejolt',
        'trello' => 'Trello',
        'spreadshirt' => 'Spreadshirt',
        '500px' => '500px',
        '8tracks' => '8tracks',
        'airbnb' => 'Airbnb',
        'alliance' => 'Alliance',
        'amazon' => 'Amazon',
        'amplement' => 'Amplement',
        'android' => 'Android',
        'angellist' => 'Angellist',
        'apple' => 'Apple',
        'appnet' => 'Appnet',
        'baidu' => 'Baidu',
        'bandcamp' => 'Bandcamp',
        'battlenet' => 'Battlenet',
        'mixer' => 'Mixer',
        'bebee' => 'Bebee',
        'bebo' => 'Bebo',
        'behance' => 'Bēhance',
        'blizzard' => 'Blizzard',
        'blogger' => 'Blogger',
        'buffer' => 'Buffer',
        'chrome' => 'Chrome',
        'coderwall' => 'Coderwall',
        'curse' => 'Curse',
        'dailymotion' => 'Dailymotion',
        'deezer' => 'Deezer',
        'delicious' => 'Delicious',
        'deviantart' => 'Deviantart',
        'diablo' => 'Diablo',
        'digg' => 'Digg',
        'discord' => 'Discord',
        'disqus' => 'Disqus',
        'douban' => 'Douban',
        'draugiem' => 'Draugiem',
        'dribbble' => 'Dribbble',
        'drupal' => 'Drupal',
        'ebay' => 'Ebay',
        'ello' => 'Ello',
        'endomodo' => 'Endomodo',
        'envato' => 'Envato',
        'etsy' => 'Etsy',
        'facebook' => 'Facebook',
        'feedburner' => 'Feedburner',
        'filmweb' => 'Filmweb',
        'firefox' => 'Firefox',
        'flattr' => 'Flattr',
        'flickr' => 'Flickr',
        'formulr' => 'Formulr',
        'forrst' => 'Forrst',
        'foursquare' => 'Foursquare',
        'friendfeed' => 'Friendfeed',
        'github' => 'Github',
        'goodreads' => 'Goodreads',
        'google' => 'Google',
        'googlescholar' => 'Googlescholar',
        'googlegroups' => 'Googlegroups',
        'googlephotos' => 'Googlephotos',
        'googleplus' => 'Googleplus',
        'grooveshark' => 'Grooveshark',
        'hackerrank' => 'Hackerrank',
        'hearthstone' => 'Hearthstone',
        'hellocoton' => 'Hellocoton',
        'heroes' => 'Heroes',
        'smashcast' => 'Smashcast',
        'horde' => 'Horde',
        'houzz' => 'Houzz',
        'icq' => 'Icq',
        'identica' => 'Identica',
        'imdb' => 'Imdb',
        'instagram' => 'Instagram',
        'issuu' => 'Issuu',
        'istock' => 'Istock',
        'itunes' => 'Itunes',
        'keybase' => 'Keybase',
        'lanyrd' => 'Lanyrd',
        'lastfm' => 'Lastfm',
        'line' => 'Line',
        'linkedin' => 'LinkedIn',
        'livejournal' => 'Livejournal',
        'lyft' => 'Lyft',
        'macos' => 'Macos',
        'mail' => 'Mail',
        'medium' => 'Medium',
        'meetup' => 'Meetup',
        'mixcloud' => 'Mixcloud',
        'modelmayhem' => 'Modelmayhem',
        'mumble' => 'Mumble',
        'myspace' => 'Myspace',
        'newsvine' => 'Newsvine',
        'nintendo' => 'Nintendo',
        'npm' => 'Npm',
        'odnoklassniki' => 'Odnoklassniki',
        'openid' => 'Openid',
        'opera' => 'Opera',
        'outlook' => 'Outlook',
        'overwatch' => 'Overwatch',
        'patreon' => 'Patreon',
        'paypal' => 'Paypal',
        'periscope' => 'Periscope',
        'persona' => 'Persona',
        'pinterest' => 'Pinterest',
        'play' => 'Play',
        'player' => 'Player',
        'playstation' => 'Playstation',
        'pocket' => 'Pocket',
        'qq' => 'Qq',
        'quora' => 'Quora',
        'raidcall' => 'Raidcall',
        'ravelry' => 'Ravelry',
        'reddit' => 'Reddit',
        'renren' => 'Renren',
        'researchgate' => 'Researchgate',
        'residentadvisor' => 'Residentadvisor',
        'reverbnation' => 'Reverbnation',
        'rss' => 'Rss',
        'sharethis' => 'Sharethis',
        'skype' => 'Skype',
        'slideshare' => 'Slideshare',
        'smugmug' => 'Smugmug',
        'snapchat' => 'Snapchat',
        'songkick' => 'Songkick',
        'soundcloud' => 'Soundcloud',
        'spotify' => 'Spotify',
        'stackexchange' => 'Stackexchange',
        'stackoverflow' => 'Stackoverflow',
        'starcraft' => 'Starcraft',
        'stayfriends' => 'Stayfriends',
        'steam' => 'Steam',
        'storehouse' => 'Storehouse',
        'strava' => 'Strava',
        'streamjar' => 'Streamjar',
        'stumbleupon' => 'Stumbleupon',
        'swarm' => 'Swarm',
        'teamspeak' => 'Teamspeak',
        'teamviewer' => 'Teamviewer',
        'technorati' => 'Technorati',
        'telegram' => 'Telegram',
        'tripadvisor' => 'Tripadvisor',
        'tripit' => 'Tripit',
        'triplej' => 'Triplej',
        'tumblr' => 'Tumblr',
        'twitch' => 'Twitch',
        'twitter' => 'Twitter',
        'uber' => 'Uber',
        'ventrilo' => 'Ventrilo',
        'viadeo' => 'Viadeo',
        'viber' => 'Viber',
        'viewbug' => 'Viewbug',
        'vimeo' => 'Vimeo',
        'vine' => 'Vine',
        'vkontakte' => 'Vkontakte',
        'warcraft' => 'Warcraft',
        'wechat' => 'Wechat',
        'weibo' => 'Weibo',
        'whatsapp' => 'Whatsapp',
        'wikipedia' => 'Wikipedia',
        'windows' => 'Windows',
        'wordpress' => 'Wordpress',
        'wykop' => 'Wykop',
        'xbox' => 'Xbox',
        'xing' => 'Xing',
        'yahoo' => 'Yahoo',
        'yammer' => 'Yammer',
        'yandex' => 'Yandex',
        'yelp' => 'Yelp',
        'younow' => 'Younow',
        'youtube' => 'Youtube',
        'zapier' => 'Zapier',
        'zerply' => 'Zerply',
        'zomato' => 'Zomato',
        'zynga' => 'Zynga'
    ];

    public function get_name() {
        return 'ms-social-icons';
    }
    
    public function get_title() {
        return esc_html__( 'Social Icons', 'madsparrow' );
    }
    
    public function get_icon() {
        return 'eicon-social-icons ms-badge';
    }
    
    public function get_categories() {
        return [ 'ms-elements' ];
    }
    
    public function get_keywords() {
        return [ 'social', 'icon', 'link' ];
    }

    protected function register_controls() {

        $first_level = 0;

        $this->start_controls_section(
            'content_section', [
                'label' => __( 'Social Icons', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        if ( get_template() !== 'nicex' ) {

            $this->add_control(
                'notification_' . $first_level++, [
                    'type' => Controls_Manager::RAW_HTML,
                    'raw' => '<strong>' . esc_html__( 'NiceX Theme not activated!', 'madsparrow' ) . '</strong><br>' . sprintf( __( 'Go to the <a href="%s" target="_blank">Themes</a> to activate.', 'madsparrow' ), admin_url( 'themes.php' ) ),
                    'content_classes' => 'elementor-panel-alert elementor-panel-alert-danger',
                    'separator' => 'after',
                ]
            );

        }

        asort( self::$share_socials );
        asort( self::$default_socials );

        $repeater = new Repeater();

        $repeater->add_control(
            'icons_socials', [
                'label' => esc_html__( 'Social Network', 'madsparrow' ),
                'type' => Controls_Manager::SELECT2,
                'options' => self::$default_socials,
            ]
        );

        $repeater->add_control(
            'link', [
                'label' => esc_html__( 'Link', 'madsparrow' ),
                'type' => Controls_Manager::URL,
                'placeholder' => 'https://your-link.com',
            ]
        );

        $this->add_control(
            'socials', [
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'icons_socials' => 'facebook',
                        'link' => [ 'url' => '#' ],
                    ],
                    [
                        'icons_socials' => 'instagram',
                        'link' => [ 'url' => '#' ],
                    ],
                    [
                        'icons_socials' => 'pinterest',
                        'link' => [ 'url' => '#' ],
                    ],
                ],
                'title_field' => '{{icons_socials}}',
            ]
        );

        $this->end_controls_section();

        // TAB CONTENT
        $this->start_controls_section(
            'section_' . $first_level++, [
                'label' => esc_html__( 'Social Icons', 'madsparrow' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'soc_align', [
                'label' => __( 'Alignment', 'madsparrow' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => __( 'Left', 'madsparrow' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => __( 'Center', 'madsparrow' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => __( 'Right', 'madsparrow' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
                'selectors' => [
                    '{{WRAPPER}} .ms-s-w' => 'text-align: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'socials_style', [
                'label' => __( 'Style', 'plugin-name' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    's-icon' => __( 'Icon', 'madsparrow' ),
                    's-text' => __( 'Text', 'madsparrow' ),
                    's-it' => __( 'Icon with text', 'madsparrow' ),
                ],
                'default' => 's-icon',
            ]
        );

        $this->add_responsive_control(
            'socials_size', [
                'label' => __( 'Size', 'madsparrow' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => [ 'px', 'vh', 'em', 'rem' ],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ],
                    'vh' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'em' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    'rem' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 22,
                ],
                'selectors' => [
                    '{{WRAPPER}} .ms-s-i i' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'color_options', [
                'label' => __( 'Color', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'icon_color', [
                'label' => __( 'Type', 'madpsarrow' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'default',
                'options' => [
                    'default' => __( 'Official Color', 'madpsarrow' ),
                    'custom' => __( 'Custom', 'madpsarrow' ),
                    'mono' => __( 'Default', 'madpsarrow' ),
                ],
            ]
        );

        $this->add_control(
            'icon_secondary_color', [
                'label' => __( 'Color', 'madpsarrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-s-i i' => 'color: {{VALUE}} !important;',
                ],
                'condition' => [
                    'icon_color' => 'custom',
                ],
            ]
        );

        $this->add_control(
            'bg_color', [
                'label' => __( 'Background', 'madsparrow' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .ms-s-w .ms-s-i i' => 'background-color: {{VALUE}}'
                ],
            ]
        );

        $this->add_control(
            'space_options', [
                'label' => __( 'Indentation', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'padding', [
                'label' => esc_html__( 'Padding', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', 'em', 'rem', '%' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-s-w .ms-s-i i' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'bordert_options', [
                'label' => __( 'Border', 'madsparrow' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(), [
                'name' => 'border',
                'label' => __( 'Border', 'madsparrow' ),
                'selector' => '{{WRAPPER}} .ms-s-w .ms-s-i i',
            ]
        );

        $this->add_control(
            'border_radius', [
                'label' => __( 'Radius', 'madsparrow' ),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors' => [
                    '{{WRAPPER}} .ms-s-w .ms-s-i i' => 'border-top-left-radius: {{TOP}}{{UNIT}} {{TOP}}{{UNIT}}; border-top-right-radius: {{RIGHT}}{{UNIT}} {{RIGHT}}{{UNIT}}; border-bottom-right-radius: {{BOTTOM}}{{UNIT}} {{BOTTOM}}{{UNIT}}; border-bottom-left-radius: {{LEFT}}{{UNIT}} {{LEFT}}{{UNIT}};', 
                ],
            ]
        );

        $this->end_controls_section();
    }
            
    protected function render() {

        $settings = $this->get_settings_for_display();

        $i_class = 'ms-s-i';
        $i_class .= $settings['icon_color'] == 'mono' ? ' mono' : '';
        $i_class .= ' ' . $settings['socials_style'];
        ?>
        <div class="ms-s-w">
        <?php foreach ( $settings[ 'socials' ] as $index => $item ) :

        $link_key = 'link_' . $index;
        $i_text = $item['icons_socials'];
        $this->add_render_attribute( $link_key, 'href', $item['link']['url'] );

        if ( $item['link']['is_external'] ) {
            $this->add_render_attribute( $link_key, 'target', '_blank' );
        }

        if ( $item['link']['nofollow'] ) {
            $this->add_render_attribute( $link_key, 'rel', 'nofollow' );
        }

        if ( $settings['socials_style'] == 's-icon') : ?>
            <a class="<?php echo $i_class; ?>" <?php echo $this->get_render_attribute_string( $link_key ); ?>><i class="socicon-<?php echo $item['icons_socials']; ?>"></i></a>
        <?php else: ?>
            <a class="<?php echo $i_class; ?>" <?php echo $this->get_render_attribute_string( $link_key ); ?>><i class="socicon-<?php echo $item['icons_socials']; ?>"><span><?php echo $i_text; ?></span></i></a>
        <?php endif;

        endforeach; ?>
        </div>
    <?php }

}