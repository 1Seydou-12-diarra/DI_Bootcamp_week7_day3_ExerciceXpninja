<!--
    This code first checks if the color_scheme cookie exists. If it does, the color scheme is set from the cookie value. If the cookie does not exist, the default color scheme is set to light. When the form is submitted, the script sets the color_scheme cookie with the selected value and sets the expiration date to 7 days from the current time. The form displays two radio buttons for the light and dark color schemes, and the selected option is displayed based on the value of the color_scheme variable.
-->
<?php
// Check if the cookie exists
if(isset($_COOKIE['color_scheme'])) {
  $color_scheme = $_COOKIE['color_scheme'];
} else {
  // Set the default color scheme to light
  $color_scheme = 'light';
}

// Check if the form has been submitted
if(isset($_POST['color_scheme'])) {
  // Set the color scheme from the form data
  $color_scheme = $_POST['color_scheme'];

  // Set the cookie with the selected color scheme
  setcookie('color_scheme', $color_scheme, time() + 60 * 60 * 24 * 7);

  // Display a message indicating that the color scheme has been saved
  echo "Your color scheme has been saved.";
}
?>

<!-- Color Scheme Form -->
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
  <label>
    <input type="radio" name="color_scheme" value="light" <?php if($color_scheme == 'light') echo 'checked'; ?> />
    Light
  </label>
  <label>
    <input type="radio" name="color_scheme" value="dark" <?php if($color_scheme == 'dark') echo 'checked'; ?> />
    Dark
  </label>
  <button type="submit">Save</button>
</form>
