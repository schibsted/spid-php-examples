<!DOCTYPE html>
<html>
  <head>
    <title>Buy quality movies</title>
    <style>
      .amount {width: 40px; text-align: right;};
    </style>
  </head>
  <body>
    <h1>Buy quality movies</h1>
    <form action="/checkout.php" method="post">
      <div><input class="amount" type="number" name="sw4" value="1"> Star Wars IV</div>
      <div><input class="amount" type="number" name="sw5" value="1"> Star Wars V</div>
      <div><input class="amount" type="number" name="sw6" value="1"> Star Wars VI</div>
      <input type="submit" value="Buy these excellent movies">
    </form>
    <p>
      Sorry, we only sell good movies. If you're looking for Jar Jar, you're out
      of luck.
    </p>
  </body>
</html>
