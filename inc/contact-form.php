<!-- Form currently has no validation or processing -->
<div class="column">
  <form class="form column" method="post">
    <h1>Get in Touch</h1>

    <div class="row">
      <input class="form-field" type="text" name="contact-fname" placeholder="First Name" required>

      <input class="form-field" type="text" name="contact-lname" placeholder="Last Name" required>
    </div>

    <div class="row">

      <input class="form-field" type="email" name="contact-email" placeholder="Email" required>

      <input class="form-field" type="tel" name="contact" placeholder="Phone Number" required>
    </div>

    <div class="row">
      <textarea class="form-field textarea" name="contact-message" placeholder="Message..." required></textarea>
    </div>

    <input class="submit" type="submit" name="contact-submit">
  </form>
</div>
