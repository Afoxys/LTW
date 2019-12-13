<style>
    .house_simple {
        text-decoration: none;
        font-size: 1.5em;
        font-family: 'Roboto', sans-serif;
    }

    .house_simple:visited {
        color: black;
    }

    .house_simple:hover article{
        border-color: orange;
    }

    .house_simple:active {
        color: orange;
    }

    .house_simple article{
        border-style: solid;
        border-width: normal;
        border-color: black;
        border-radius: 5px;
        margin: 1%;
        padding: 1%;
        display: grid;
        grid-template-columns: 400px auto auto;
        grid-template-rows: 10% 80% 10%;
    }

    .house_simple img {
        grid-column-start: 1;
        grid-column-end: 2;
        grid-row-start: 1;
        grid-row-end: 4;
    }

    .house_simple header {
        grid-column-start: 2;
        grid-column-end: 3;
        grid-row-start: 1;
        grid-row-end: 2;
        margin: 0%;
        padding-left: 2%;
        font-weight: bold;
    }

    .house_simple #rating {
        grid-column-start: 3;
        grid-column-end: 4;
        grid-row-start: 1;
        grid-row-end: 2;
        margin: 0%;
        padding: 0%;
        text-align: right;
    }

    .house_simple #price {
        grid-column-start: 3;
        grid-column-end: 4;
        grid-row-start: 3;
        grid-row-end: 4;
        margin: 0%;
        padding: 0%;
        text-align: right;
    }
</style>

<!DOCTYPE html>
<html lang="pt-PT">

  <head>
    <title>LTW</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/style.css" rel="stylesheet">  <!-- Presentation: Absolute path to prevent path relative stylesheet import exploit -->   
    <link href="css/popup.css" rel="stylesheet">  <!-- Presentation: Absolute path to prevent path relative stylesheet import exploit -->

    <link rel="icon" href="/LTW/favicon.ico">
    <link rel="shortcut icon" href="/LTW/favicon.ico">
    <script src="script.js" defer></script>
  </head>
<body>

<section>
  <a class="house_simple" href="">
    <article>
      <header>House Title</header>
      <img src="images/houses/h1.jpg" width="200" height="200">
      <p id="rating">Rating: 4</p>
      <p id="price">40€/day</p>
    </article>
  </a>
</section>
<section>
  <a class="house_simple" href="">
    <article>
      <header>House Title 2</header>
      <img src="images/houses/h2.jpg" width="200" height="200">
      <p id="rating">Rating: 4.4</p>
      <p id="price">100€/day</p>
    </article>
  </a>
</section>



</body>
</html> 