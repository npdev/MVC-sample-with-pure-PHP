<div class="contact-form">
    <?php require_once $this->DIR.'/app/contact/form.php'; ?>
    <?= (!empty($message)) ? '<div class="errors">' . $message . '</div>' : '' ?>
    <form action="" method="post" class="form">
        <div <?= (!empty($errors['user_name'])) ? 'class="error_field"' : ''; ?>>
            <label>Name*:</label>
            <input type="text" class = "text" name="user_name" value="<?= $validator->postdata('user_name'); ?>" />
        </div> 

        <div <?= (!empty($errors['user_email'])) ? 'class="error_field"' : ''; ?>>
            <label>E-mail*:</label>
            <input type="text" class = "text" name="user_email" value="<?= $validator->postdata('user_email'); ?>" />
        </div>

        <div <?= (!empty($errors['subject'])) ? 'class="error_field"' : ''; ?>>
            <label>Subject*:</label>
            <input type="text" class = "text" name="subject" value="<?= $validator->postdata('subject'); ?>"/>
        </div> 

        <div class="area<?= (!empty($errors['text'])) ? ' error_field' : ''; ?>">
            <label>Message*:</label>
            <textarea cols="40" class = "textarea" rows="5" name="text"><?= $validator->postdata('text'); ?></textarea>
        </div> 

        <div <?= (!empty($errors['keystring'])) ? 'class="error_field"' : ''; ?>>
            <label class="captcha">Type the characters you see on this picture:</label>
            <div class="capth_images"><?php require $this->DIR.'/app/contact/captcha.php'; ?></div>
            <input type="text" class = "text" name="keystring" value=""/>
        </div> 

        <div>
            <label>&nbsp;</label>
            <input type="submit" class="btn" value="Send message" />
        </div>
        <p class="captcha">All fields marked with an asterisk ( * ) are required</p>
    </form>
</div>