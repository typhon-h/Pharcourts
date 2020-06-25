<div class="search" id="search">
  <h1>Home is where the heart is</h1> <!-- Slogan -->
  <form class="search-form" method="post"> <!-- Search Form -->
    <div class="search-items">
      <input name = "search-bar" type="text" placeholder="Search..." autocomplete="off"> <!-- Always visible -->
      <input name = "search-button" type="submit" value="Search">
    </div>
    <!-- Toggle for additional dropdown options -->
    <label class="option-toggle"for="option-toggle">More Options &#9650; &#9660;</label> <!-- Show arrow based on checkbox state -->

    <input type="checkbox" id="option-toggle" name="option-toggle" value="" hidden>
    <div class="additional-options"> <!-- Additional dropdown options -->
      <div class="additional-option">
        <label for="">Bedrooms</label>
        <div class="additional-selects">
          <label for="min-bedrooms">Min:</label> <!-- This repetition could be simplified into INCLUDES -->
          <select name="min-bedrooms" id="min-bedrooms">
            Options
          </select>
          <label for="max-bedrooms">Max:</label>
          <select name="max-bedrooms" id="max-bedrooms">
            Options
          </select>
        </div>
      </div>

      <div class="additional-option">
        <label for="">Bathrooms</label>
        <div class="additional-selects">
          <label for="min-bathrooms">Min:</label>
          <select name="min-bathrooms" id="min-bathrooms">
            Options
          </select>
          <label for="max-bathrooms">Max:</label>
          <select name="max-bathrooms" id="max-bathrooms">
            Options
          </select>
      </div>
    </div>

    <div class="additional-option">
      <label for="">Garage Spaces</label>
      <div class="additional-selects">
        <label for="min-garage-spaces">Min:</label>
        <select name="min-garage-spaces" id="min-garage-spaces">
          Options
        </select>
        <label for="max-garage-spaces">Max:</label>
        <select name="max-garage-spaces" id="max-garage-spaces">
          Options
        </select>
      </div>
    </div>
    </div>
  </form>
</div>
