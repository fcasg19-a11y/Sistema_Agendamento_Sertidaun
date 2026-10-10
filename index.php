<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Solicitação de Certidão</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;box-sizing:border-box;font-family:"Poppins",sans-serif}
        body{background:#f8f9fc;color:#333}
        .top-bar{background:#8B0000;color:#FFD700;text-align:center;padding:6px;font-size:13px;letter-spacing:0.5px}
        nav{background:white;box-shadow:0 2px 15px rgba(0,0,0,0.05);padding:15px 5%;display:flex;justify-content:space-between;align-items:center;position:sticky;top:0;z-index:100}
        .logo{display:flex;align-items:center;gap:10px;font-weight:700;color:#8B0000;font-size:20px}
        .logo span{font-size:28px}
        .menu a{margin-left:25px;text-decoration:none;color:#444;font-weight:500;transition:0.3s}
        .menu a:hover,.menu a.active{color:#8B0000}
        .btn-wa{background:#25D366;color:white;padding:8px 18px;border-radius:20px;text-decoration:none;font-size:14px;font-weight:600}
        .btn-wa:hover{background:#128C7E}
        .container{max-width:1100px;margin:30px auto;padding:0 5%}
        @media(max-width:700px){.menu{display:none}}
    </style>
</head>
<body>
<div class="top-bar">✠ Horário Atendimento: Segunda-Sexta 08:00-16:00 | Sábado 08:00-12:00</div>
<nav>
    <div class="logo"><span>✠</span> Paróquia Dili</div>
    <div class="menu">
        <a href="index.php?page=home">Início</a>
        <a href="Public/pedido.php?page=solicitar" class="active">Solicitar Certidão</a>
        <a href="index.php?page=status">Verificar Status</a>
        <a href="https://wa.me/67075970642" class="btn-wa">💬 WhatsApp</a>
    </div>
</nav>
<div class="container">
<link rel="stylesheet" href="css/index.css">

<!-- HERO SECTION -->
<section class="hero">
    <div class="hero-content">
        <span class="badge">Diocese de Baucau</span>
        <h1>Sistema de <br><span>Solicitação de Certidão</span></h1>
        <p>Solicite sua certidão de Batismo, Casamento ou Crisma de forma rápida e fácil. Sem precisar ir duas vezes à Paróquia.</p>
        <div class="hero-buttons">
            <a href="pedido.php" class="btn btn-primary">Solicitar Agora</a>
            <a href="#info" class="btn btn-outline">Como Funciona</a>
        </div>
    </div>
    <div class="hero-image">
        <div class="card-float">
            <h4>📄 Certidão de Batismo</h4>
            <p>Pedido #123 - Aprovado</p>
        </div>
        <div class="card-float delay">
            <h4>💒 Certidão de Casamento</h4>
            <p>Pedido #124 - Pendente</p>
        
        </div>
    </div>
</section>

<!-- INFO SECTION -->
<section id="info" class="info-section">
    <h2 class="section-title">Como Funciona?</h2>
    <div class="steps">
        <div class="step-card">
            <div class="icon">1</div>
            <h3>Preencha o Pedido</h3>
            <p>Escolha a sua Paróquia, o tipo de certidão e informe seus dados.</p>
        </div>
        <div class="step-card">
            <div class="icon">2</div>
            <h3>Aguarde a Verificação</h3>
            <p>A secretaria da Paróquia vai verificar nos livros originais.</p>
        </div>
        <div class="step-card">
            <div class="icon">3</div>
            <h3>Levante na Data</h3>
            <p>Venha levantar sua certidão na data que você escolheu (Data Levantamento).</p>
        </div>
    </div>
</section>

<section class="cta">
    <h2>Pronto para solicitar?</h2>
    <p>Leva menos de 2 minutos para preencher.</p>
    <a href="pedido.php" class="btn btn-white">Fazer Pedido</a>
</section>
</div>
<footer style="background:#1a1a2e;color:#ddd;margin-top:60px">
    <div style="max-width:1100px;margin:auto;padding:40px 5%;display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:30px">
        <div>
            <h3 style="color:white;margin-bottom:15px">✠ Paróquia Dili</h3>
            <p style="font-size:14px;line-height:1.7;color:#aaa">Sistema online para solicitação de Certidões de Batismo, Crisma e Casamento. Facilitando o atendimento aos fiéis.</p>
        </div>
        <div>
            <h4 style="color:white;margin-bottom:15px">Links Rápidos</h4>
            <p style="font-size:14px"><a href="index.php?page=solicitar" style="color:#aaa;text-decoration:none">→ Solicitar Certidão</a><br>
            <a href="index.php?page=status" style="color:#aaa;text-decoration:none">→ Verificar Pedido</a><br>
            <a href="index.php?page=admin" style="color:#aaa;text-decoration:none">→ Acesso Secretaria</a></p>
        </div>
        <div>
            <h4 style="color:white;margin-bottom:15px">Contacto</h4>
            <p style="font-size:14px;color:#aaa">📍 Balide, Dili, Timor-Leste<br>📞 +670 7700 0000<br>✉️ secretaria@paroquiadili.tl<br>🕒 Seg-Sex: 08:00-16:00</p>
        </div>
    </div>
    <div style="border-top:1px solid #2a2a4a;text-align:center;padding:18px;font-size:13px;color:#777">
        © 2026 Paróquia Dili. Desenvolvido para servir os fiéis com amor e tecnologia. <span style="color:#FFD700">✠</span>
    </div>
</footer>
</body>
</html>