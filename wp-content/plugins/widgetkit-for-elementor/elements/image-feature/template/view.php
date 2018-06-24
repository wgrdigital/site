<?php
// Silence is golden.

    $settings = $this->get_settings();


?>



    <div class="tgx-image-feature">               
        <!-- feature Start -->
        <div class="block drop-shadow ">

            <?php if ($settings['title_position'] == 'top'):?>
                <?php if ($settings['feature_title']):?>
                    <h4 class="feature-title"><?php echo $settings['feature_title']; ?></h4>
                <?php endif; ?>
            <?php endif; ?>

            <?php if( $settings['hover_effect'] == 'round'):?>
                <div class="hover-round">

                    <?php if ($settings['choose_media'] == 'image'): ?>
                        <?php if( $settings['feature_image']['url']):?>
                            <img src="<?php echo $settings['feature_image']['url']; ?>" alt="<?php the_title(); ?>"> 
                        <?php endif; ?>

                    <?php else: ?>

                        <?php if( $settings['feature_icon']):?>
                            <i class="feature-icon fa <?php echo $settings['feature_icon'];?>"></i>
                        <?php endif; ?>

                    <?php endif ?>
                </div><!-- .custom-icon -->

            <?php else: ?>

                <div class="hover-angle">
                    <?php if ($settings['choose_media'] == 'image'): ?>
                        
                        <?php if( $settings['feature_image']['url']):?>
                            <img class= "tgx-media" src="<?php echo $settings['feature_image']['url']; ?>" alt="<?php the_title(); ?>"> 
                        <?php endif; ?>

                    <?php else: ?>

                        <?php if( $settings['feature_icon']):?>
                             <i class="feature-icon fa <?php echo $settings['feature_icon'];?>"></i>
                        <?php endif; ?>
                        
                    <?php endif ?>

                </div>
            <?php endif; ?>


            <?php if ($settings['title_position'] == 'bottom'):?>
                <?php if ($settings['feature_title']):?>
                    <h4 class="feature-title"><?php echo $settings['feature_title']; ?></h4>
                <?php endif; ?>
            <?php endif; ?>

            <?php if ($settings['feature_content']):?>
                <p class="feature-desc"><?php echo $settings['feature_content']; ?></p> 
            <?php endif; ?>           
        </div><!-- .block -->
    </div><!-- /.section -->