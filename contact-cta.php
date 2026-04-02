<?php
/**
 * Template Name: Contact CTA
 * Association des Artisans
 */

get_header();
?>

<main class="cta-page">
    <div class="cta-box">
        <h2>Intéréssé.e par notre association ?</h2>
        <h3>Des questions ?</h3>
        <p>Vous souhaitez contacter un artisan ou rejoindre le collectif ? Utilisez le formulaire pour poser vos questions ou proposer votre candidature. L'équipe vous répondra rapidement afin d'échanger sur votre projet ou votre intégration.</p>

        <div class="cta-buttons">
            <a href="<?php echo esc_url(home_url('/nous-contacter/')); ?>" class="cta-btn">Contactez nous</a>
            <span class="cta-separator">ou</span>
            <a href="<?php echo esc_url(home_url('/formulaire')); ?>" class="cta-btn">Rejoignez nous</a>
        </div>

        <a href="<?php echo esc_url(home_url('/association')); ?>" class="cta-more">Plus d'informations ></a>
    </div>
</main>

<?php get_footer(); ?>


