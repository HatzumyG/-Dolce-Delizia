<?php

$email_label            = esc_html__('Email address', 'mailchimp-for-wp');
$email_placeholder_attr = esc_attr__('Your email address', 'mailchimp-for-wp');
$signup_button_value    = esc_attr__('Sign up', 'mailchimp-for-wp');

$content  = "<p>\n\t<label for=\"email\">{$email_label}: \n";
<<<<<<< HEAD
$content .= "\t\t<input type=\"email\" id=\"email\" name=\"EMAIL\" placeholder=\"{$email_placeholder_attr}\" required>\n\t</label>\n</p>\n\n";
=======
$content .= "\t\t<input type=\"email\" id=\"email\" name=\"EMAIL\" placeholder=\"{$email_placeholder_attr}\" required>\n</label>\n</p>\n\n";
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
$content .= "<p>\n\t<input type=\"submit\" value=\"{$signup_button_value}\">\n</p>";

return $content;
