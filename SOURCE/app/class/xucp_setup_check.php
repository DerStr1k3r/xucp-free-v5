<?php
// ************************************************************************************//
// * xUCP Free
// ************************************************************************************//
// * Author: DerStr1k3r
// ************************************************************************************//
// * Version: 5.1
// *
// * Copyright (c) 2024 DerStr1k3r. All rights reserved.
// ************************************************************************************//
// * License Typ: GNU GPLv3
// ************************************************************************************//
class xUCP_SetupCheck {

    public function xucp_free_setup_check(): void {
        if (version_compare(PHP_VERSION, '8.2.24') < 0) {
            $user = new xUCP_Themes($db);
            $user->xucp_header_install("xUCP Free V5 Setup Check");
            $user->xucp_content_install();
            echo '
            <div class="col-lg-12">
                <div class="card xucp-card">
                    <div class="card-header d-flex justify-content-between flex-wrap">
                        <div class="header-title">
                            <h4 class="card-title">
                                <svg width="32" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.3955 9.59497L9.60352 14.387" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.3971 14.3898L9.60107 9.59277" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M16.3345 2.75024H7.66549C4.64449 2.75024 2.75049 4.88924 2.75049 7.91624V16.0842C2.75049 19.1112 4.63549 21.2502 7.66549 21.2502H16.3335C19.3645 21.2502 21.2505 19.1112 21.2505 16.0842V7.91624C21.2505 4.88924 19.3645 2.75024 16.3345 2.75024Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                xUCP Free V5 Setup Check
                            </h4>
                            <hr class="hr-horizontal">
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap align-items-center justify-content-between">
                            <p>
                                <b>This is a guide for Debian 11 or Debian 12!</b>
                                <br /><br />
                                Log in to Putty and connect to your server!
                                <br /><br />
                                Now enter the following commands:
                                <br /><br />
                                1. <code class="btn-dark">apt-get install nano curl unzip ca-certificates apt-transport-https lsb-release gnupg apache2 -y && wget -q https://packages.sury.org/php/apt.gpg -O- | apt-key add - && echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" | tee /etc/apt/sources.list.d/php.list</code>
                                <br /><br />
                                2. <code class="btn-dark">apt-get update && apt-get install php8.2 php8.2-cli php8.2-common php8.2-curl php8.2-gd php8.2-intl php8.2-mbstring php8.2-mysql php8.2-opcache php8.2-readline php8.2-xml php8.2-xsl php8.2-zip php8.2-bz2 libapache2-mod-php8.2 -y</code>
                                <br /><br />
                                3. <code class="btn-dark">apt install mariadb-server mariadb-client -y && mysql_secure_installation</code>
                                <br /><br />
                                4. <code class="btn-dark">cd /usr/share && wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.zip -O phpmyadmin.zip && unzip phpmyadmin.zip && rm phpmyadmin.zip && mv phpMyAdmin-*-all-languages phpmyadmin && chmod -R 0755 phpmyadmin</code>
                                <br /><br />
                                5. <code class="btn-dark">a2enconf phpmyadmin && systemctl reload apache2 && mkdir /usr/share/phpmyadmin/tmp/ && chown -R www-data:www-data /usr/share/phpmyadmin/tmp/</code>
                                <br /><br />
                                6. <code class="btn-dark">a2ensite ucp.your_domain.conf</code>
                                <br /><br />
                                7. <code class="btn-dark">a2enmod rewrite && a2enmod actions && a2enmod headers</code>
                                <br /><br />
                                8. <code class="btn-dark">systemctl reload apache2 && systemctl restart apache2</code>
                                <br /><br />
                                9. <code class="btn-dark">apt install certbot python3-certbot-apache && certbot --apache -d ucp.your_domain.de</code>
                            </p>
                        </div>
                    </div>
                </div>
            </div>';
            $user->xucp_footer_install();
        } else {
            header('Location: /vendor/frontend/home/index');
            exit;
        }
    }
}