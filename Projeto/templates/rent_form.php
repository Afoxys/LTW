<section id="registerform">
  <h1>Register your house</h1>
  <form method="post">
  <label><br>Título</label>
      <input type="text" name="titulo" placeholder="House near city center - 2 Bedrooms">
  <label><br>Preço Diário</label>
      <input type="text" name="preco" maxlength="5">
  <label><br>Distrito</label>
      <input type="text" name="distrito">
  <label><br>Concelho</label>
      <input type="text" name="concelho">
  <label><br>Freguesia</label> 
      <input type="text" name="freguesia">
  <label><br>Rua</label>
      <input type="text" name="rua">
  <label><br>Porta</label>
      <input type="text" name="porta">
  <label><br>Andar</label>
      <input type="text" name="andar">
  <label><br>Codigo Postal</label>
      <input type="text" pattern = "\d{4}-\d{3}" name="codigopostal">
  <label class="switch">Pet Friendly
      <input type="checkbox" name="Pet">
      <span class="slider round"></span>
  </label>
  <br><input type="submit" value="Register">
  </form>
</section>