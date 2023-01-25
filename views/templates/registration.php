<div class="login_card account">
  <h1>Criar conta</h1>
  <form method="post">
    <div>
      <input type="text" placeholder="Nome do usuário" name="nome" id="name" title="Nome do usuário" />
    </div>
    <div>
      <input type="password" placeholder="Senha" name="password" id="password" title="Senha para login" />
      <input type="password" placeholder="confirmação de senha" name="confirmpassword" id="confirmpassword" title="Confirmação de senha" />
    </div>
    <div class="group">
      <input type="tel" placeholder="+244946642126" name="phonenumber" id="phonenumber" title="Número de telefone" />
      <input type="email" placeholder="exemple@gmail.com" name="email" id="email" title="Email" />
    </div>
    <div class="group">
      <select name="gender" id="gender" title="Genero">
        <option selected>Masculino</option>
        <option>Feminino</option>
      </select>
      <input type="date" name="birth" title="Data de aniversário" id="birth" />
    </div>
    <div>
      <input type="text" placeholder="Morada" name="adress" id="adress" title="Morada" />
    </div>
    <button type="submit" name="action">Cadastrar</button>
  </form>
</div>