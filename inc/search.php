<div class="search" id="search">
  <h1>Home is where the heart is</h1> <!-- Slogan -->
  <form class="search-form" method="post"> <!-- Search Form -->
    <input name = "search-bar" type="text" placeholder="Search..."> <!-- Always visible -->
    <input name = "search-button" type="submit" value="Search">
    <br>
    <!-- Toggle for additional dropdown options -->
    <label for="options-toggle">More Options &#9650; &#9660;</label> <!-- Show arrow based on checkbox state -->
    <input type="checkbox" id="options-toggle" name="options-toggle" value="">

    <div class="additonal-options"> <!-- Additional dropdown options -->
      <label for="">Bedrooms</label>
      <label for="min-bedrooms">Min:</label> <!-- This repetition could be simplified into INCLUDES -->
      <select name="min-bedrooms" id="min-bedrooms">
        Options
      </select>
      <label for="max-bedrooms">Max:</label>
      <select name="max-bedrooms" id="max-bedrooms">
        Options
      </select>

      <label for="">Bathrooms</label>
      <label for="min-bathrooms">Min:</label>
      <select name="min-bathrooms" id="min-bathrooms">
        Options
      </select>
      <label for="max-bathrooms">Max:</label>
      <select name="max-bathrooms" id="max-bathrooms">
        Options
      </select>

      <label for="">Garage Spaces</label>
      <label for="min-garage-spaces">Min:</label>
      <select name="min-garage-spaces" id="min-garage-spaces">
        Options
      </select>
      <label for="max-garage-spaces">Max:</label>
      <select name="max-garage-spaces" id="max-garage-spaces">
        Options
      </select>
    </div>
  </form>
</div>
