<?php
require 'php/numbertomonth.php';
?>

<aside>
    <div class="side-information aside-item">
        <p><b>Informasi Sekolah</b></p>
        <hr>
        <div class="side-information__item">
            <div class="side-information__title">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7" />
                </svg>
                <span>Alamat</span>
            </div>
            <div class="side-information__content">
                <p><?php echo get_theme_mod('wp_schoolinformation-address') ?></p>
            </div>
        </div>
        <div class="side-information__item">
            <div class="side-information__title">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span>Hubungi Kami</span>
            </div>
            <div class="side-information__content">
                <?php
                $contacts = get_theme_mod('wp_schoolinformation-contact');
                foreach(explode(",", $contacts) as $contact):
                    echo $contact . "<br>";
                endforeach; ?>
            </div>
        </div>
    </div>
    <div class="side-news aside-item">
        <p><b>Agenda Sekolah</b></p>
        <hr>
        <?php
        $posts = new WP_Query(
            array(
                'post_type' => 'acara',
                'posts_per_page' => 3,
            )
        );
        if($posts->have_posts()):
            while($posts->have_posts()):
                $posts->the_post(); 
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <div class="sidenews-item">
                    <div class="sidenews-date">
                        <?php echo substr(get_field_object('acara_date')['value'], 0, 2) ?>
                    </div>
                    <div class="sidenews-title">
                        <p><?php echo get_the_title() ?></p>
                        <span class="sidenews-title__date">
                            <?php
                            if( strlen(get_field_object('acara_date')['value']) >= 9 ):
                                echo substr(get_field_object('acara_date')['value'], 8, 2) . ':' . substr(get_field_object('acara_date')['value'], 10, 2) . ':' . substr(get_field_object('acara_date')['value'], 12, 2) . ' ' . substr(get_field_object('acara_date')['value'], 0, 2) . ' ' . numbertomonth(substr(get_field_object('acara_date')['value'], 2, 2)) . ' ' . substr(get_field_object('acara_date')['value'], 4, 4);
                            else:
                                echo substr(get_field_object('acara_date')['value'], 0, 2) . ' ' . numbertomonth(substr(get_field_object('acara_date')['value'], 2, 2)) . ' ' . substr(get_field_object('acara_date')['value'], 4, 4);
                            endif;
                            ?>
                    </div>
                </div>
            <?php endwhile;
        endif;?>
    </div>
    <div class="side-news aside-item">
        <p><b>Berita Informasi</b></p>
        <hr>
        <?php
        $posts = new WP_Query(
            array(
                'post_type' => 'post',
                'posts_per_page' => 3,
            )
        );
        if($posts->have_posts()):
            while($posts->have_posts()):
                $posts->the_post(); 
                $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' ); ?>
                <a href="<?php echo get_post_permalink() ?>">
                    <div class="sidenews-item">
                        <img src="<?= $url ?>">
                        <div class="sidenews-title">
                            <p><?= get_the_title() ?></p>
                            <span class="sidenews-title__date"><?= get_the_date() ?></span>
                        </div>
                    </div>
                </a>
            <?php endwhile;
        endif;?>
    </div>
</aside>