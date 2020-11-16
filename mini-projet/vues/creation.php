<form method='POST' action='index.php?action=reception' enctype="multipart/form-data">
  <label for="login">name :</label>
  <input type='text' name='login'/>
  <label for="mdp">password :</label>
  <input type='password' name='mdp'/>
  <label for="email">email :</label>
  <input type='email' name='email'/>
  <label for="avatar">avatar :</label>
  <input type='file' name="avatar" id="avatar" accept="image/png, image/jpeg"/>
  <input type='submit' value='Ajouter'/>
</form>
