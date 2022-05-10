<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__contact">
		<section aria-labelledby="contact" class="contact">
			<h2 id="contact" class="contact__title"><?= get_the_title(); ?></h2>
		</section>
			<section aria-labelledby="coordinates" class="contact__section">
				<h2 id="coordinates" class="contact__title"><?= __('Coordonnées personnelles', 'portfolio') ?></h2>
				<p class="contact__paragraph"><?php the_content(); ?></p>
			</section>
			<section aria-labelledby="contactForm" class="contact__section form">
				<h2 id="contactForm" class="form__title"><?= __('Formulaire de contact', 'portfolio') ?></h2>
				<?php if (!isset($_SESSION['contact_form_feedback']) || !$_SESSION['contact_form_feedback']['success']) : ?>
					<form action="<?= get_home_url(); ?>/wp-admin/admin-post.php" method="POST" class="form__form "
						  id="contact">
						<?php if (isset($_SESSION['contact_form_feedback'])) : ?>
							<p><?= __('Oups ! Il y a des erreurs dans le formulaire', 'portfolio') ?></p>
						<?php endif; ?>
						<div class="form__field">
							<label for="lastname" class="form__label"><?= __('Nom *', 'portfolio') ?></label>
							<input type="text" name="lastname" id="lastname" class="form__input"
								   value="<?= portfolio_get_contact_field_value('lastname'); ?>">
							<?= portfolio_get_contact_field_error('lastname'); ?>
						</div>
						<div class="form__field">
							<label for="firstname" class="form__label"><?= __('Prénom *', 'portfolio') ?></label>
							<input type="text" name="firstname" id="firstname" class="form__input"
								   value="<?= portfolio_get_contact_field_value('firstname'); ?>">
							<?= portfolio_get_contact_field_error('firstname'); ?>
						</div>
						<div class="form__field">
							<label for="email" class="form__label"><?= __('Adresse e-mail *', 'portfolio') ?></label>
							<input type="email" name="email" id="email" class="form__input"
								   value="<?= portfolio_get_contact_field_value('email'); ?>">
							<?= portfolio_get_contact_field_error('email'); ?>
						</div>
						<div class="form__field">
							<label for="phone" class="form__label"><?= __('Objet', 'portfolio') ?></label>
							<input type="tel" name="phone" id="phone" class="form__input"
								   value="<?= portfolio_get_contact_field_value('phone'); ?>">
							<?= portfolio_get_contact_field_error('phone'); ?>
						</div>
						<div class="form__field">
							<label for="message" class="form__label"><?= __('Message', 'portfolio') ?></label>
							<textarea name="message" id="message" cols="30" rows="10"
									  class="form__input"><?= portfolio_get_contact_field_value('message'); ?></textarea>
							<?= portfolio_get_contact_field_error('message'); ?>
						</div>
						<div class="form__field">
							<label for="rules" class="form__checkbox">
								<input type="checkbox" name="rules" id="rules" value="1"/>
								<span class="form__checklabel"><?= str_replace(':condition', '<a href="#">' . __('conditions générales d\'utilisation', 'portfolio') . '</a>', __('J\'accepte les :condition ', 'portfolio')) ?></span>
							</label>
							<?= portfolio_get_contact_field_error('rules'); ?>
						</div>
						<div class="form__actions">
							<?php wp_nonce_field('nonce_submit_contact'); ?>
							<input type="hidden" name="action" value="submit_contact_form"/>
							<button class="form__button" type="submit"><?= __('Envoyer', 'portfolio') ?></button>
						</div>
					</form>
				<?php else : ?>
					<p id="contact"><?= __('Merci ! Votre message a bien été envoyé.', 'portfolio') ?></p>
					<?php unset($_SESSION['contact_form_feedback']); endif; ?>
			</section>
	</main>
<?php endwhile; endif; ?>
<?php get_footer(); ?>