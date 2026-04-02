<?php get_header(); ?>

<main id="primary" class="site-main single-post-main">

  <?php while ( have_posts() ) : the_post(); ?>

  <article id="post-<?php the_ID(); ?>" <?php post_class('article-single'); ?>>

    <!-- En-tête éditorial -->
    <header class="article-header">

      <?php
        $categories = get_the_category();
        if ( $categories ) :
      ?>
      <div class="article-rubrique"><?php echo esc_html($categories[0]->name); ?></div>
      <?php endif; ?>

      <h1 class="article-title"><?php the_title(); ?></h1>

      <div class="article-meta">
        <span class="article-by">par <em><?php the_author(); ?></em></span>
        <span class="article-sep">—</span>
        <span class="article-date">le <?php echo get_the_date('d F Y'); ?></span>
      </div>

      <div class="article-divider"></div>

    </header>

    <!-- Image à la une -->
    <?php if ( has_post_thumbnail() ) : ?>
    <div class="article-thumbnail">
      <?php the_post_thumbnail('large', ['class' => 'article-img', 'alt' => get_the_title()]); ?>
    </div>
    <?php endif; ?>

    <!-- Contenu -->
    <div class="article-content">
      <?php the_content(); ?>
    </div>

    <!-- Tags -->
    <?php $tags = get_the_tags(); if ( $tags ) : ?>
    <div class="article-tags">
      <?php foreach ( $tags as $tag ) : ?>
        <a href="<?php echo get_tag_link($tag->term_id); ?>" class="article-tag"><?php echo esc_html($tag->name); ?></a>
      <?php endforeach; ?>
    </div>
    <?php endif; ?>

    <!-- Navigation -->
    <nav class="article-nav">
      <?php $prev = get_previous_post(); $next = get_next_post(); ?>
      <?php if ( $prev ) : ?>
      <a href="<?php echo get_permalink($prev); ?>" class="article-nav-link article-nav-prev">
        <span class="nav-direction">← Précédent</span>
        <span class="nav-title"><?php echo get_the_title($prev); ?></span>
      </a>
      <?php else : ?><div></div><?php endif; ?>

      <?php if ( $next ) : ?>
      <a href="<?php echo get_permalink($next); ?>" class="article-nav-link article-nav-next">
        <span class="nav-direction">Suivant →</span>
        <span class="nav-title"><?php echo get_the_title($next); ?></span>
      </a>
      <?php endif; ?>
    </nav>

    <!-- Retour -->
    <div class="article-back">
      <a href="<?php echo home_url('/actualites/'); ?>" class="article-back-link">← Retour aux actualités</a>
    </div>

  </article>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>