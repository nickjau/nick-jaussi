<?php global $STORY_TYPES; ?>

<?php get_header(); ?>

<main class="main">
  <div class="stories-grid">
    <?php
      $stories = get_all_stories();

      while ( $stories->have_posts() ) : $stories->the_post();
    ?>

      <div class="story-tile">
        <a href="<?php the_permalink(); ?>">
          <?php
            echo the_post_thumbnail('story-preview');
          ?>

          <?php
            $type = $STORY_TYPES[rwmb_meta('story_type')];
          ?>

          <h2 class="story-tile__title">
            <?php if ($type) : ?>
              <small class="story-tile__type">
                <?php echo $type ?>
                <span class="visually-hidden">:</span>
              </small>
            <?php endif; ?>

            <?php echo get_the_title(); ?>
          </h2>
        </a>
      </div>

    <?php
      endwhile;
      wp_reset_query();
    ?>
  </div>
</div>

<?php get_footer(); ?>
