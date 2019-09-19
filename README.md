# Developer Test

### Objective
In this scenario there is a contact page on a WordPress site. Your job is to update the provided files to enable storage of new contact form submissions. The form data is to be sent via AJAX to the custom WordPress REST API endpoint: http://everytown.org/wp-json/et/v1/contact-us. Save the new submission as a post of a custom post type named `contact`. Add the name and email to the new post as post meta values.

### Instructions
- Clone this repo
- Edit contact.html by writing JavaScript to handle the form submission logic.
- Edit rest-route.php by writing the PHP code to create a new contact form submission.
- Commit your changes to a new branch named `{{ YOUR_NAME }}-updates`.