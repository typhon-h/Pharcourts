<!-- Sort Sidebar -->
<div class="sidebar column">
  <!-- Form Title -->
  <div class="listings-sort-form-head">
    <h2>All Listings</h2>
    <hr class="solid">
  </div>
  <form method="get" name="listings-sort-form" class="listings-sort-form column">
    <!-- Fields to Sort By -->
    <div class="field column">
      <label for="sort_field">Sort By:</label>
      <select name="sort_field">
        <option value="1" selected>-</option>
        <option value="tbl_listings.AuctionDate">Auction Date</option>
        <option value="tbl_properties.Bathrooms">Bathrooms</option>
        <option value="tbl_properties.Bedrooms">Bedrooms</option>
        <option value="tbl_properties.GarageSpaces">Garage Spaces</option>
        <option value="tbl_listings.Price">Price</option>
        <option value="tbl_properties.Suburb">Suburb</option>
        <option value="tbl_listings.Title">Title</option>
        <option value="tbl_properties.Toilets">Toilets</option>
      </select>
    </div>
  <!-- Sort Direction -->
  <div class="field column">
    <label for="sort_direction">Order By:</label>
    <select name="sort_direction">
      <option value="ASC" selected>-</option>
      <option value="ASC">Ascending</option>
      <option value="DESC">Descending</option>
    </select>
  </div>

  <input type="submit" name="sort-submit" value="Show">
  </form>
</div>
