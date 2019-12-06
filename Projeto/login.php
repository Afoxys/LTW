<!DOCTYPE html>
<html lang="pt-PT">

  <?php include_once('templates/head.php'); ?>

  <body>

    <div class="background">
      
      <?php include_once('templates/navbar.php'); ?>

      <div class="form">
        <form>
          <ul class="form2">

            <li>
              <label for="email">Email</label>
              <input type="email" id="email" placeholder="Enter your email here">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" id="password" minlength="8" maxlength="32" placeholder="Minimum 8 caracters">
            </li>
            <li>
              <button type="submit">Submit</button>
            </li>
          </ul>
        </form>
      </div>

    </div>
  </body>
</html>

