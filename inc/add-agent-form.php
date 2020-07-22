
<form class="form column" method="post" enctype="multipart/form-data">
  <!-- Agent Fields -->
  <div class="row">
    <input class="form-field" type="text" name="agent-fname" placeholder="First Name..." required autofocus>

    <input class="form-field" type="text" name="agent-sname" placeholder="Last Name..." required>
  </div>


  <div class="row">
    <input class="form-field" type="text" name="agent-qualification" placeholder="Qualification" required>
  </div>


  <div class="row">
    <!-- Regex for mobile phone number +64 12 345 6789-->
    <input class="form-field" type="tel" name="agent-mobileph" placeholder="Mobile Phone Num..." title="Mobile Number eg. +64 12 345 6789" pattern = "^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$" required>

    <!-- Regex for office phone number 03 1234567-->
    <input class="form-field" type="tel" name="agent-workph" placeholder="Office Phone Num..." title="Office Phone Number eg. 03 123 4567" pattern="^\d{2}[\s|-]\d{3}[\s|-]\d{4}$" required>

    <input class="form-field" type="email" name="agent-email" placeholder="Email..." required>
  </div>


  <div class="row">
    <textarea class="form-field textarea" name="agent-bio" placeholder="Bio..." required></textarea>
  </div>


  <div class="row">
    <!-- Image Requirements -->
    <label for="agent-image">Select a Profile Picture: <br> Required File Type: .jpg | Required Aspect Ratio: 1:1</label>
    <input type="file" name="agent-image" required>
  </div>


  <input class="submit" type="submit" name="agent-submit">
</form>
