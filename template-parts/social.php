<?php if ( have_rows( 'social', 'options' ) ) : ?>
    <div class="my-4 text-2xl">
        <?php while ( have_rows( 'social', 'options' ) ) : the_row(); ?>
            <?php
                $icon = get_sub_field( 'icon' );
                $link = get_sub_field( 'link' );
            ?>
            <?php if($link) : ?>
                <a href="<?php echo $link['url'] ?>" target="<?php echo $link['target'] ?>" class="hover:text-primary transition-all mr-1">
                    <?php echo $icon; ?>
                </a>
            <?php else : ?>
                <?php echo $icon; ?>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
<?php endif; ?>