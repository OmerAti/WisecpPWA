<?php 
/**
 * WiseCPPWA - Wisecp PWA Yükleme Modülü
 *
 * Yazar: Ömer ATABER - OmerAti JRodix.Com Internet Hizmetleri
 * Versiyon: 1.0.0
 * Tarih: 20.09.2024
 * Web: https://www.jrodix.com
 *
 */
class WisecpPWA extends AddonModule {
    public $version = "1.0";
    
    function __construct(){
        $this->_name = __CLASS__;
            parent::__construct();
    }
    
    public function fields(){
        $settings = isset($this->config['settings']) ? $this->config['settings'] : [];
        return [
            'wisecppw_uygulama'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_uygulama_name"],
                'description'       => $this->lang["wisecppw_uygulama_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_uygulama"]) ? $settings["wisecppw_uygulama"] : "",
                'placeholder'       => $this->lang["wisecppw_uygulama_placeholder"],
            ],
            'wisecppw_short'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_short_name"],
                'description'       => $this->lang["wisecppw_short_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_short"]) ? $settings["wisecppw_short"] : "",
                'placeholder'       => $this->lang["wisecppw_short_placeholder"],
            ],
            'wisecppw_aciklama'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_aciklama_name"],
                'description'       => $this->lang["wisecppw_aciklama_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_aciklama"]) ? $settings["wisecppw_aciklama"] : "",
               'placeholder'       => $this->lang["wisecppw_aciklama_placeholder"],
            ],
		'wisecppw_background'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_background_name"],
                'description'       => $this->lang["wisecppw_background_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_background"]) ? $settings["wisecppw_background"] : "",
               'placeholder'       => $this->lang["wisecppw_background_placeholder"],
            ],
			'wisecppw_theme_color'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_theme_color_name"],
                'description'       => $this->lang["wisecppw_theme_color_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_theme_color"]) ? $settings["wisecppw_theme_color"] : "",
               'placeholder'       => $this->lang["wisecppw_theme_color_placeholder"],
            ],
            'wisecppw_konum'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_konum_name"],
                'description'       => "",
                'type'              => "dropdown",
                'options'           => [
                    'left'     => $this->lang["wisecppw_konum_sol"],
                    'right'     => $this->lang["wisecppw_konum_sag"],
                ],
                'value'             => isset($settings["wisecppw_konum"]) ? $settings["wisecppw_konum"] : "left",
            ],            
            'wisecppw_buton_renk'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_buton_renk_name"],
                'description'       => $this->lang["wisecppw_buton_renk_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_buton_renk"]) ? $settings["wisecppw_buton_renk"] : "",
                'placeholder'       => $this->lang["wisecppw_buton_renk_placeholder"],
            ],  
			'wisecppw_buton_renk_hover'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_buton_renk_hover_name"],
                'description'       => $this->lang["wisecppw_buton_renk_hover_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_buton_renk_hover"]) ? $settings["wisecppw_buton_renk_hover"] : "",
                'placeholder'       => $this->lang["wisecppw_buton_renk_hover_placeholder"],
            ],  
            'wisecppw_buton_text'          => [
                'wrap_width'        => 100,
                'name'              => $this->lang["wisecppw_buton_text_name"],
                'description'       => $this->lang["wisecppw_buton_text_description"],
                'type'              => "text",
                'value'             => isset($settings["wisecppw_buton_text"]) ? $settings["wisecppw_buton_text"] : "",
                'placeholder'       => $this->lang["wisecppw_buton_text_placeholder"],
            ],
        ];
    }
public function save_fields($fields = []) {
    $requiredFields = [
        'wisecppw_uygulama',
        'wisecppw_short',
        'wisecppw_aciklama',
		'wisecppw_background',
		'wisecppw_theme_color',
        'wisecppw_konum',
        'wisecppw_buton_renk',
        'wisecppw_buton_renk_hover',
        'wisecppw_buton_text',
    ];
    foreach ($requiredFields as $field) {
        if (!isset($fields[$field]) || !$fields[$field]) {
            $this->error = $this->lang["error1"];
            return false;
        }
    }
    return $fields;
}

     public function file_addHead(){
        $settings = isset($this->config['settings']) ? $this->config['settings'] : [];
        $control = $this->config["status"];
        if ($control) { ?>
        <?php }
    }

    public function displayModal() {
		
		$serverName = $_SERVER["SERVER_NAME"];
        $settings = isset($this->config['settings']) ? $this->config['settings'] : [];
        $UygulamaIsmi = isset($settings["wisecppw_uygulama"]) ? $settings["wisecppw_uygulama"] : "NULL";
		$UygulamaKisaIsmi = isset($settings["wisecppw_short"]) ? $settings["wisecppw_short"] : "NULL";
		$UygulamaAciklama = isset($settings["wisecppw_aciklama"]) ? $settings["wisecppw_aciklama"] : "NULL";
		$UygulamaArkaPlan = isset($settings["wisecppw_background"]) ? $settings["wisecppw_background"] : "#ffffff";
		$UygulamaTema = isset($settings["wisecppw_theme_color"]) ? $settings["wisecppw_theme_color"] : "#007bff";
		$UygulamaKonum = isset($settings["wisecppw_konum"]) ? $settings["wisecppw_konum"] : "left";
		$UygulamaButonRenk = isset($settings["wisecppw_buton_renk"]) ? $settings["wisecppw_buton_renk"] : "";
		$UygulamaButonHover = isset($settings["wisecppw_buton_renk_hover"]) ? $settings["wisecppw_buton_renk_hover"] : "";
		$UygulamaButonIsmi = isset($settings["wisecppw_buton_text"]) ? $settings["wisecppw_buton_text"] : "NULL";
        ?>
		    <style>
        .install-banner {
            position: fixed;
            <?php echo htmlspecialchars($UygulamaKonum); ?>: 20px;
            bottom: 20px;
            background-color: <?php echo htmlspecialchars($UygulamaButonRenk); ?>;
            color: white;
            padding: 10px 20px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
            display: none;
            align-items: center;
            font-size: 18px;
			border-radius: 50px;
        }
        .install-banner:hover {
            background-color: <?php echo htmlspecialchars($UygulamaButonHover); ?>;
        }
        .install-banner i {
            margin-right: 10px;
            font-size: 20px;
        }
    </style>
    <div class="install-banner" id="installBanner">
        <i class="fas fa-download"></i>
        <?php echo htmlspecialchars($UygulamaButonIsmi); ?>
    </div>
    <script>
   const manifest = {
            "name": "<?php echo htmlspecialchars($UygulamaIsmi); ?>",
            "short_name": "<?php echo htmlspecialchars($UygulamaKisaIsmi); ?>",
            "description": "<?php echo htmlspecialchars($UygulamaAciklama); ?>",
           "start_url": "https://<?php echo htmlspecialchars($serverName); ?>",
            "display": "standalone",
            "background_color": "<?php echo htmlspecialchars($UygulamaArkaPlan); ?>",
            "theme_color": "<?php echo htmlspecialchars($UygulamaTema); ?>",
           "icons": [
                {
                    "src": "https://<?=$_SERVER["SERVER_NAME"]?>/coremio/modules/Addons/WisecpPWA/img/icon-192.png",
                    "sizes": "192x192",
                    "type": "image/png"
                },
                {
                    "src": "https://<?=$_SERVER["SERVER_NAME"]?>/coremio/modules/Addons/WisecpPWA/img/icon-512.png",
                    "sizes": "512x512",
                    "type": "image/png"
                }
            ]
        };
        const blob = new Blob([JSON.stringify(manifest)], { type: 'application/json' });
        const url = URL.createObjectURL(blob);
        const link = document.createElement('link');
        link.rel = 'manifest';
        link.href = url;
        document.head.appendChild(link);

        let deferredPrompt;
        const installBanner = document.getElementById('installBanner');
        function checkIfAppInstalled() {
            const isStandalone = window.matchMedia('(display-mode: standalone)').matches || window.navigator.standalone;
            if (!isStandalone) {
                installBanner.style.display = 'flex';
            }
        }
        window.addEventListener('beforeinstallprompt', (e) => {
            e.preventDefault();
            deferredPrompt = e;
            installBanner.style.display = 'flex';
        });

        installBanner.addEventListener('click', () => {
            if (deferredPrompt) {
                installBanner.style.display = 'none';
                deferredPrompt.prompt();
                deferredPrompt.userChoice.then((choiceResult) => {
                    if (choiceResult.outcome === 'accepted') {
                        console.log('tamam yüklendi');
                    } else {
                        console.log('yüklenmedi');
                    }
                    deferredPrompt = null;
                });
            }
        });
        window.onload = checkIfAppInstalled;
    </script>
        <?php
    }
}
Hook::add("ClientAreaHeadCSS", 1, [
    'class'     => "WisecpPWA",
    'method'    => "file_addHead",
]);

Hook::add("ClientAreaEndBody", 1, [
    'class'     => "WisecpPWA",
    'method'    => "displayModal",
]);
?>
