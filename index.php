<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Lembretes de Saúde</title>

<style>
:root {
  --bg: #eef2f5;
  --card: #ffffff;
  --text: #222;
  --primary: #4a90e2;
  --danger: #e63946;
  --warning: #ffb703;
  --radius: 12px;
  --shadow: 0 4px 18px rgba(0,0,0,0.08);
}
.dark {
  --bg: #0d1117;
  --card: #161b22;
  --text: #e6edf3;
}
body {
  margin: 0;
  background: var(--bg);
  font-family: "Segoe UI", Arial;
  color: var(--text);
  transition: 0.3s;
}
h2 { text-align: center; margin-top: 15px; font-weight: 600; }
.screen {
  display: none;
  background: var(--card);
  max-width: 430px;
  margin: 25px auto;
  padding: 28px;
  border-radius: var(--radius);
  box-shadow: var(--shadow);
}
input {
  width: 100%;
  padding: 12px;
  margin-top: 12px;
  border-radius: var(--radius);
  border: 1px solid #d0d0d0;
  background: var(--bg);
  color: var(--text);
}
button {
  width: 100%;
  padding: 13px;
  margin-top: 14px;
  border-radius: var(--radius);
  border: none;
  font-size: 16px;
  cursor: pointer;
  font-weight: 600;
}
.btn-primary { background: var(--primary); color: white; }
.btn-danger { background: var(--danger); color: white; }
.toggle-theme {
  position: fixed;
  top: 15px; right: 15px;
  background: var(--card);
  border-radius: 50%;
  width: 42px; height: 42px;
  display: flex; align-items:center; justify-content:center;
  box-shadow: var(--shadow);
  cursor: pointer;
  font-size: 18px;
}
.password-wrapper { position: relative; }
.show-pass {
  position: absolute;
  right: 12px;
  top: 19px;
  cursor: pointer;
  font-size: 17px;
}
</style>
</head>
<body>

<div class="toggle-theme" onclick="toggleTheme()">🌙</div>

<!-- LOGIN -->
<div id="loginScreen" class="screen" style="<?php echo isset($_SESSION['user']) ? 'display:none;' : 'display:block;'; ?>">
<h2>Login</h2>
<form method="POST" action="login.php">
<input type="text" name="usuario" placeholder="Usuário" required>
<div class="password-wrapper">
  <input type="password" name="senha" placeholder="Senha" required>
  <span class="show-pass" onclick="togglePassword(this)">👁️‍🗨️</span>
</div>
<button class="btn-primary">Entrar</button>
</form>
<button class="btn-primary" onclick="showScreen('registerScreen')">Criar Conta</button>
</div>

<!-- CADASTRO -->
<div id="registerScreen" class="screen" style="<?php echo isset($_SESSION['user']) ? 'display:none;' : 'display:none;'; ?>">
<h2>Cadastro</h2>
<form method="POST" action="cadastrar.php">
<input type="text" name="usuario" placeholder="Usuário" required>
<div class="password-wrapper">
  <input type="password" name="senha" placeholder="Senha" required>
  <span class="show-pass" onclick="togglePassword(this)">👁️‍🗨️</span>
</div>
<button class="btn-primary">Cadastrar</button>
</form>
<button onclick="showScreen('loginScreen')">Voltar</button>
</div>

<!-- SISTEMA PRINCIPAL -->
<div id="mainScreen" class="screen" style="<?php echo isset($_SESSION['user']) ? 'display:block;' : 'display:none;'; ?>">
<h2>Lembretes</h2>

<form method="POST" action="addlembrete.php">
<input type="text" name="titulo" placeholder="Título do lembrete" required>
<input type="datetime-local" name="datahora" required>
<button class="btn-primary">Adicionar</button>
</form>

<div id="listaLembretes">
  <?php
  if (isset($_SESSION['user'])) {
      include "listar.php";
  }
  ?>
</div>

<form method="POST" action="logout.php">
<button class="btn-danger">Sair</button>
</form>
</div>

<script>
// ----------- TEMA -----------  
function toggleTheme() {
  document.body.classList.toggle("dark");
  localStorage.setItem("theme", document.body.classList.contains("dark") ? "dark" : "light");
}
if(localStorage.getItem("theme") === "dark") document.body.classList.add("dark");

// ----------- TROCAR TELAS ----------
function showScreen(id) {
  document.querySelectorAll(".screen").forEach(s => s.style.display = "none");
  document.getElementById(id).style.display = "block";
}

// ----------- MOSTRAR/OCULTAR SENHA ----------
function togglePassword(icon) {
  let input = icon.previousElementSibling;
  
  if (input.type === "password") {
      input.type = "text";
      icon.textContent = "👁️";  // olho aberto
  } else {
      input.type = "password";
      icon.textContent = "👁️‍🗨️"; // olho fechado
  }
}

// ----------- VERIFICAÇÃO AUTOMÁTICA DE ALERTAS ----------
if (<?php echo isset($_SESSION['user']) ? 'true' : 'false'; ?>) {

    setInterval(() => {
        fetch("verificar_alertas.php")
            .then(r => r.text())
            .then(resposta => {

                if (resposta === "none" || resposta === "nologin") return;

                try {
                    let alertas = JSON.parse(resposta);
                    alertas.forEach(titulo => {
                        alert("⚠ Lembrete atrasado: " + titulo);
                    });
                } catch (e) {
                    console.log("Erro ao processar alertas:", e);
                }

            });
    }, 20000); // verifica a cada 20 segundos

}
</script>

</body>
</html>
