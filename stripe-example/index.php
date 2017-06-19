<form  method="POST" action="process.php">

  <label> Select Plan </label>
  <select id="plan" name="plan" required>
  <option value="daily">Daily  $1/Day</option>
    <option value="silver">Silver  $9.99/month</option>
    <option value="gold">Gold  $25.00/month</option>
    <option value="platinum">Platinum  $49.99/month</option>

  </select><br><br>
  <script
    src="https://checkout.stripe.com/checkout.js"
    class="stripe-button"
    data-key="pk_test_fMocxGr4zoad9MwM8wGYksg3"
    data-image="http://csrreport.apollo.edu/wp-content/uploads/2014/02/icon-carpool.png"
    data-name="Carpool"
    data-description="Carpool subscription payment"
    data-allow-remember-me="false">
  </script>
  <!-- data-amount="2000" -->
</form>
