<?php /* Template Name: Contact page template */ ?>
<?php get_header(); ?>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
	<main class="layout__contact">
		<section aria-labelledby="contact" class="contact">
			<h2 id="contact" class="contact__title" aria-level="2"><?= get_the_title(); ?></h2>
			<div class="contact__position">
				<section aria-labelledby="coordinates" class="contact__section">
					<h2 id="coordinates" class="coordinate__title"
						aria-level="2"><?= __('Coordonnées', 'portfolio') ?></h2>
					<section aria-labelledby="coordinate" class="coordinates" itemscope itemtype="https://schema.org/Person">
						<h3 id="coordinate" class="coordinates__title hidden"
							aria-level="3"><?= __('Mes coordonnées') ?></h3>
						<section aria-labelledby="mail" class="coordinates__mail">
							<h4 id="mail" class="coordinates__title" aria-level="4"><?= __('Mail', 'portfolio') ?></h4>
							<p class="coordinates__mail mail" >
								<a href="mailto:gwenaellebatta@gmail.com" itemprop="email">gwenaellebatta@gmail.com</a>
							</p>
						</section>
						<section aria-labelledby="telephone" class="coordinates__phone">
							<h4 id="telephone" class="coordinates__title"
								aria-level="4"><?= __('Téléphone', 'portfolio') ?></h4>
							<p class="coordinates__mail phone" itemprop="telephone">
								+32 (0)491 30 53 40
							</p>
						</section>
						<section aria-labelledby="address" class="coordinates__address" itemscope
								 itemtype="https://schema.org/PostalAddress">
							<h4 id="address" class="coordinates__title"
								aria-level="4"><?= __('Adresse', 'portfolio') ?></h4>
							<p itemprop="streetAddress" class="coordinates__adress">
								Rue Charles Rittwéger, 186
							</p>
							<p itemprop="postalCode" class="coordinates__postal">
								4910 THEUX
							</p>
						</section>
					</section>
				</section>
				<section aria-labelledby="contactForm" class="contact__section form">
					<h2 id="contactForm" class="form__title"
						aria-level="2"><?= __('Formulaire de contact', 'portfolio') ?></h2>
					<?php if (!isset($_SESSION['contact_form_feedback']) || !$_SESSION['contact_form_feedback']['success']) : ?>
						<form action="<?=get_home_url();?>/wp-admin/admin-post.php" method="POST" class="form__form "
							  id="contact-form">
							<?php if (isset($_SESSION['contact_form_feedback'])) : ?>
								<p class="form__error" ><?= __('Oups ! Il y a des erreurs dans le formulaire', 'portfolio') ?></p>
							<?php endif; ?>
							<div class="form__position">
								<div class="form__field">
									<label for="lastname" class="form__label"><?= __('Nom *', 'portfolio') ?></label>
									<input type="text" name="lastname" id="lastname" class="form__input"
										   value="<?= portfolio_get_contact_field_value('lastname'); ?>">
									<?= portfolio_get_contact_field_error('lastname'); ?>
								</div>
								<div class="form__field">
									<label for="firstname"
										   class="form__label"><?= __('Prénom *', 'portfolio') ?></label>
									<input type="text" name="firstname" id="firstname" class="form__input"
										   value="<?= portfolio_get_contact_field_value('firstname'); ?>">
									<?= portfolio_get_contact_field_error('firstname'); ?>
								</div>
							</div>
							<div class="form__field">
								<label for="email"
									   class="form__label"><?= __('Adresse e-mail *', 'portfolio') ?></label>
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
								<textarea name="message" id="message" cols="30" rows="10" class="form__input">
								<?= portfolio_get_contact_field_value('message'); ?>
							</textarea>
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
						<p><?= __('Merci ! Votre message a bien été envoyé.', 'portfolio') ?></p>
						<?php unset($_SESSION['contact_form_feedback']); endif; ?>
				</section>
			</div>
		</section>
	</main>
	<?php unset($_SESSION['contact_form_feedback']) ?>
<?php endwhile; endif; ?>
<?php get_footer(); ?>